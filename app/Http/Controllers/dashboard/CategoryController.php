<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = category::orderBy('id','desc')->simplePaginate(5);
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
        $category    = new category();
        $category->title        = $request->title;
        $category->description  = $request->description;
        $category->create_user_id = auth()->user()->id;
        $category->update_user_id = null;
        $category->save();
        return redirect('dashboard/categories')->with('created_category_sucessfully',"the category($category->title) has Been created Sucessfully");
        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
