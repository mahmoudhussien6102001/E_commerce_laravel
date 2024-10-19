<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $Users = User::orderBy('id', 'asc')->simplePaginate(5);
        return view('dashboard.pages.User.indexs.index', compact('Users'));
    }

    public function customersIndex()
    {
        
        $customers = User::where('user_type', 'customer')->simplePaginate(5);
        $customers_count= $customers->count();
        return view('dashboard.pages.User.indexs.customersIndex', compact('customers','customers_count'));
    }

    public function moderatorIndex()
    {
        
        $moderators = User::where('user_type', 'moderator')->simplePaginate(5);
        $moderators_count= $moderators->count();
        return view('dashboard.pages.User.indexs.moderatorIndex', compact('moderators','moderators'));
    }

    
    public function adminIndex()
    {
        
        $admins = User::where('user_type', 'admin')->simplePaginate(5);
        $admins_count= $admins->count();        
        return view('dashboard.pages.User.indexs.adminIndex', compact('admins','admins_count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // عرض نموذج إنشاء مستخدم جديد
        return view('dashboard.pages.User.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // تحديد القواعد للتحقق من البيانات
        $rules = [
            'username'  => 'required|unique:users',
            'email'     => 'required|email|unique:users', // لازم يكون بصيغة الإيميل ومش مكرر
            'user_type' => 'required',
        ];
    
        // التحقق من صلاحيات المستخدم الحالي
        if (auth()->user()->user_type === "admin") {
            // admins يمكنهم إنشاء أي نوع من المستخدمين
            $rules['user_type'] = 'required|in:customer,moderator,admin';
        } elseif (auth()->user()->user_type === "moderator") {
            // المشرفين يمكنهم إنشاء عملاء فقط
            $rules['user_type'] = 'required|in:customer';
        } elseif (auth()->user()->user_type === "customer") {
            // العملاء لا يمكنهم إنشاء مستخدمين
            return abort(403); // إرجاع خطأ 403 لو العميل يحاول إنشاء مستخدم
        } else {
            return abort(404); // إرجاع خطأ 404 لو الشخص مش ليه الصلاحية
        }
    
        // التحقق من صحة البيانات
        $request->validate($rules);
    
        // إضافة كلمة المرور بعد تشفيرها
        $request->merge([
            'password' => bcrypt($request->username . '123456789'), // تشفير الباسورد باستخدام bcrypt
        ]);
    
        // إنشاء المستخدم الجديد
        User::create($request->all());
        

    
        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('users.index')->with('Created_Category_Sucessfully', "The user '{$request->username}' has been created successfully.");
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $username)
    {
        // البحث عن المستخدم بناءً على الاسم
        $user = User::where('username', $username)->firstOrFail(); // Eloquent ORM

        if ($user == null) {
            return redirect()->route('users.index')->with('error', 'User not found');
        }

        return view('dashboard.pages.User.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // البحث عن المستخدم بناءً على الـ id
        $user = User::findOrFail($id); // Eloquent ORM

        // التحقق من الصلاحيات
        if (auth()->user()->id == $user->id || auth()->user()->user_type == "admin") {
            return view('dashboard.pages.User.edit', compact('user'));
        } 
        elseif (auth()->user()->user_type == "admin" && $user->user_type != "admin" && auth()->user()->id != $user->id) 
        {
            return redirect()->route('users.index')->with('unauthorized_action', 'You are not authorized to perform this action.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // البحث عن المستخدم بناءً على الـ id
    $user = User::findOrFail($id);

    $rules = [
        'username'  => 'required|unique:users,username,' . $id, 
        'email'     => 'required|email|unique:users,email,' . $id, // لازم يكون بصيغة الإيميل ومش مكرر
        'user_type' => 'required',
    ];

    // التحقق من صلاحيات المستخدم الحالي
    if (auth()->user()->user_type === "admin")
    {
        // إذا كان المستخدم الذي يحاول التحديث هو "admin"، يجب التأكد أنه لا يعدل على حساب آخر من نفس النوع
        if ($user->user_type === "admin" && auth()->user()->id !== $user->id)
         {
            return redirect()->route('users.index')->with('error', 'You are not authorized to update another admin user');
          
         }
        $rules['user_type'] = 'required|in:customer,moderator,admin';
    }
     elseif (auth()->user()->user_type === "moderator") {
        $rules['user_type'] = 'required|in:customer';
    } else {
        return abort(404); 
    }

    // التحقق من صحة البيانات
    $request->validate($rules);

    // إضافة كلمة المرور بعد تشفيرها
    if ($request->has('password')) {
        $request->merge([
            'password' => bcrypt($request->password), // تشفير الباسورد باستخدام bcrypt
        ]);
    }

    // تحديث بيانات المستخدم
    $user->update($request->all());

    // إعادة التوجيه مع رسالة نجاح
    return redirect()->route('users.index')->with('Updated_Category_Sucessfully', "The user '{$request->username}' has been updated successfully.");
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // البحث عن المستخدم
        $user = User::findOrFail($id);

        // التحقق من الصلاحيات
        if (auth()->user()->user_type == "admin" && $user->user_type != "admin" && auth()->user()->id != $user->id) {
            $user->delete();
            return redirect()->route('users.index')->with('status', sprintf('User %s deleted successfully', $user->username));
        } else {
            return view('dashboard.pages.User.404.categories-404');
        }
    }
}
