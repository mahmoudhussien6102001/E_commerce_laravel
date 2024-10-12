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
            'title'          => 'required|string|max:255|min:3|unique:sub_categories',
            'description'    => 'nullable|string|max:1020',
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
    public function show(string $title)
    {
        $subCategory = SubCategory::where('title',$title)->firstOrFail();
        if($subCategory == null){
            return redirect()->route('subcategories.index')->with('error',"the sub category is not found");
        }
        return view('dashboard.pages.SubCategory.show', compact('subCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subCategory = SubCategory::find($id);
        if($subCategory == null) {
            return view('dashboard.pages.Category.404.categories-404');
        }
        else
        {
            if(auth()->user()->user_type == 'admin')
            {
                $categories = \App\Models\Category::all();
                return view('dashboard.pages.SubCategory.edit', compact('subCategory', 'categories'));
            }
            else
            {
                return view('dashboard.pages.Category.404.categories-404');
            }
        }
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'          => 'required|string|max:255|min:3|unique:sub_categories ,title,'. $id,
            'description'    => 'nullable|string|max:1020',
            'category_id' => 'required|exists:categories,id',
  
        ]);
       
        $subCategory = SubCategory::find($id);
        $subCategory_old = SubCategory::find($id);
        $subCategory->title = $request->title;

        $subCategory->description = $request->description;
        $subCategory->category_id = $request->category_id;
        $subCategory->update_user_id = auth()->user()->id;
        $subCategory->save();

        return redirect()->route('subcategories.index', $subCategory->$id)->with('Updated_Sub_Category_Sucessfully',"the SubCategory( $subCategory_old->title) has been updated sucessfully");
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->user_type !== 'admin')
        {
            return view('dashboard.pages.Category.404.categories-404') ;
        }
        else{
            $subCategory = SubCategory::find($id);
            $subCategory->delete();
        return redirect()->route('subcategories.delete')->with('status', sprintf('Are you sure you want to delete the subcategories "%s"?', $subCategory->title ));
        }
        
    }

    public function delete()
    {
        $subcategories = SubCategory::orderBy('deleted_at', 'desc')->onlyTrashed()->simplePaginate(5);
         
        $subcategories_count = $subcategories->count(); 
     
        return view('dashboard.pages.SubCategory.delete', compact('subcategories', 'subcategories_count'));
    }

    public function restore($id)
    {
        $subCategory = SubCategory::whithTrashed()->find($id);
    
        if ($subCategory && auth()->user()->user_type == "admin") //authorization 
        {
            $subCategory->restore();
            $subCategory->update_user_id = auth()->user()->id;
            $subCategory->save();
            return redirect()->route('subcategories.index')->with('Restored Sub_Category', 'Restored Sub_Category Successfully');
        }
    
        return redirect()->route('subcategories.index')->with('error', ' Sub_Category not found');
    }

     public function forceDelete($id)
     {
        $subCategory = SubCategory::where('id',$id);

        $subCategory->forceDelete();

        return redirect()->route('subcategories.index')->with('Deleted Sub_Category', 'Sub_Category deleted successfully',"the Sub_Category () has been Successfully");

     }


}
