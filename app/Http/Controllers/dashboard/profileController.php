<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Profile , User};
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $userProfiles = Profile::with('user')->get();
       return view('dashboard.pages.profiles.index', compact('userProfiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
   
    if (Auth::user()->profile) {
        return redirect()->back()->with('error', "You already have a profile.");
    }
    $admins = User::where('user_type', 'admin')->get();

    return view('dashboard.pages.profiles.create' , compact('admins'));
}
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'bio'          => 'required|string|max:255',
            'address'      => 'required|string|max:255',
            'gender'       => 'nullable|in:male,female',
        ]);
    
        
        if (Auth::user()->profile) {
            return redirect()->back()->with('error', "You already have a profile.");
        }
    
        $imageName = $request->hasFile('image') ? $request->file('image')->store('profiles', 'public') : null;
    
        Profile::create([
            'user_id' => Auth::id(),
            'bio' => $request->bio,
            'address' => $request->address,
            'gender' => $request->gender,
            'image' => $imageName,
        ]);
    
        return redirect()->route('profiles.index')->with('Created_Profile_Sucessfully', "Profile created successfully.");
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $userProfile = Profile::with('user')->findOrFail($id);
       return view('dashboard.pages.profiles.show', compact('userProfile'));
    }

    
    public function edit(string $id)
    {
        $userProfile = Profile::findOrFail($id);
    

        if (Auth::id() !== $userProfile->user_id) {
            return redirect()->back()->with('error', "You can only edit your own profile.");
        }
    
        return view('dashboard.pages.profiles.edit', compact('userProfile'));
    }

    
    public function update(Request $request, string $id)
    {
        $userProfile = Profile::findOrFail($id);
    
        if (Auth::id() !== $userProfile->user_id) {
            return redirect()->back()->with('error', "You can only update your own profile.");
        }
    
        $request->validate([
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'bio'          => 'required|string|max:255',
            'address'      => 'required|string|max:255',
            'gender'       => 'nullable|in:male,female',
        ]);
    
        if ($request->hasFile('image')) {
            if ($userProfile->image) {
                unlink(public_path('storage/' . $userProfile->image));
            }
            $userProfile->image = $request->file('image')->store('profiles', 'public');
        }
    
        $userProfile->update([
            'bio' => $request->bio,
            'address' => $request->address,
            'gender' => $request->gender,
        ]);
    
        return redirect()->route('profiles.index')->with('Updated_Profile_Sucessfully', "Profile updated successfully.");
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $userProfile = Profile::findOrFail($id);

    if (Auth::id() !== $userProfile->user_id) {
        return redirect()->back()->with('error', "You can only delete your own profile.");
    }

    if ($userProfile->image) {
        unlink(public_path('storage/' . $userProfile->image));
    }

    $userProfile->delete();

    return redirect()->route('profiles.index')->with('Deleted_profile_Sucessfully', "Profile deleted successfully.");
}

}
