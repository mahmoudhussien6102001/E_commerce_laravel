<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $categories = category::orderBy('id','asc')->simplePaginate(2);



        return view('dashboard.pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate category
        $request->validate([
          'title'          => 'required|string|unique:categories,title|max:255',
          'description'    => 'nullable|string|max:1020',
          'create_user_id' => 'nullable|exists:users,id',
          'update_user_id' => 'nullable|exists:users,id'
        ]);

        // create category

        $category    = new Category();
        $category->title        = $request->title;
        $category->description  = $request->description;
        $category->create_user_id = auth()->user()->id;
        $category->update_user_id = null;
        $category->save();// Eloquent ORM 
        return redirect()->route('categories.index')->with('created_category_sucessfully',"the category($category->title) has Been created Sucessfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // get id to show
        $category = Category::find($id) ;

        if($category == null) {
            return redirect()->route('categories.index')->with('error' , 'category not found') ;
        }
        return view('dashboard.pages.Category.show' ,compact('category')) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( int $id)
    {
        //edit py id
        $category = Category::find($id) ;
        if($category == null) {
            return view('dashboard.pages.Category.404.categories-404') ;
        }else {
            if(auth()->user()->user_type== 'admin'){
                return view('dashboard.pages.category.edit', compact('category'));
            }else{
                return view('dashboard.pages.Category.404.categories-404') ;
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
        $request->validate([
          'title'          => 'required|string|max:255',
          'description'    => 'nullable|string|max:1020',
          'create_user_id' => 'nullable|exists:users,id',
          'update_user_id' => 'nullable|exists:users,id'
        ]);

        // get id to update
        $category = Category::find($id) ;
        $category_old =Category::find($id) ;
        $category->title = $request->title;
        if($category->title = $request->title){
            $category->title =$category->title ;
        }else{
            $category->title = $request->title ;

        }
        $category->description = $request->description;
        $category->update_user_id = auth()->user()->id;
        $category->save();

        return redirect()->route('categories.index', $category->$id)->with('updated_category_sucessfully',"the category($category_old->title) has been updated Sucessfully");


    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
        if (auth()->user()->user_type !== 'admin') {
            return view('dashboard.pages.Category.404.categories-404') ;
        }
        else{
        $category = Category::find($id);
        $category->delete();
        $category->update_at == null ;
        $category->save() ;
        return redirect()->route('dashboard');

    }
    
   /*
    public function delete()

{
    $categories = Category::onlyTrashed()->orderBy('id', 'desc')->simplePaginate(5);  

    $categories = Category::onlyTrashed()->orderBy('id', 'desc')->simplePaginate(5);

    // Count the soft-deleted categories
    $categories_count = $categories->count();

    // Return the view with the categories and their count
    return view('dashboard.pages.Category.deleted', compact('categories', 'categories_count'));
}
 */   

}
}