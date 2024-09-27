<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $subcategories = SubCategory::latest()->simplePaginate(5);
        return view('dashboard.pages.SubCategory.index', compact('subcategories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('dashboard.pages.SubCategory.create', compact('categories'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title'          => 'required|string|max:255',
            'description'    => 'nullable|string|max:1020',
            'create_user_id' => 'nullable|exists:users,id',
            'update_user_id' => 'nullable|exists:users,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        $subCategory =new  SubCategory() ;
        $subCategory->title = $request->title;
        $subCategory->description = $request->description;
        $subCategory->create_user_id = auth()->user()->id ;
        $subCategory->update_user_id = null;
        $subCategory->category_id = $request->category_id;
        $subCategory->save() ;
        return redirect()->route('subcategories.index')->with('Created_Sub_Category_Sucessfully',"the Category($subCategory->title) has been created sucessfully");




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
