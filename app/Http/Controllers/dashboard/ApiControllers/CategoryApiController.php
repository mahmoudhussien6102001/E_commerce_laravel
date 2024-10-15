<?php

namespace App\Http\Controllers\dashboard\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryApiController extends Controller
{
    //
        public function index()
    
        {
            $categories = Category::get();
            if($categories->count() <1){
                return response()->json(['message'=>'No Categories found'], 404);
            }
            else{
                return response()->json([
                    'success' =>  true,
                    'Total_Category' =>$categories->count(),
                    'data' => $categories,
                    'message' => 'All Categories has been retrived'
                ] ,200);
            }
           
        }
    
       
    
       
        public function store(Request $request) 
        {
            // validate category
          try{
            $validateData= $request->validate([
                'title'          => 'required|unique:categories,title|max:255',
                'description'    => 'nullable'
                
              ]);
      
              // create category
              $category = Category::create($validateData) ;
              return response()->json([
                  'success' => true,
                  'data' => $category,
                 'message' => 'Category created successfully'
              ] ,201);
          }catch(\Illuminate\Validation\ValidationException $e)
          {
            return response()->json([
                'success' => false,
                'data' => 'validation failed .',
               'errors' => $e->errors()
            ] ,422);
          }
    
          
        }
    
        
        public function show( $id)
        {
            // get id to show
            try{
            $category = Category::findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => $category,
               'message' => 'Category has been retrived'
            ] ,200);
            }
            catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e){
                return response()->json([
                    'success' => false,
                   'message' => 'Category not found'
                ] ,404);
            }
            catch(\Exception $e){
                return response()->json([
                    'success' => false,
                   'message' => 'Error Occured',
                   'error' => $e->getMessage()
                ],500);
            }
    
           
        }

        
                
    
        
        public function update(Request $request, int $id)
        {
            // validate category
          try{
                $request->validate([
                'title' => 'required|unique:categories,title,' . $id . '|max:255',
                'description'    => 'nullable'
                
              ]);
      
              // create category
              $category = Category::findOrFail($id) ;
              $category->update([
                'title' => $request->title ,
                'description' => $request->description
              ]);
              return response()->json([
                  'success' => true,
                  'data' => $category,
                 'message' => 'Category updated successfully'
              ] ,200);
          }
          catch(\Illuminate\Validation\ValidationException $e)
          {
            return response()->json([
                'success' => false,
                'data' => 'validation failed .',
               'errors' => $e->errors()
            ] ,422);
          }
          catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e)
          {
            return response()->json([
                'success' => false,
               'message' => 'Category not found'
            ] ,404);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'success' => false,
               'message' => 'Error Occured',
               'error' => $e->getMessage()
            ],500);
        }
    
          
        }
    
    
        
        public function destroy(int $id)
        {
            try
            {
                $category = Category::findOrFail($id);
                $category->delete();
                return response()->json([
                    'success' => true,
                    'message' => 'Category deleted successfully',
                    'deleted_data' => $category
                ] ,200);
           }
           catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e)
          {
                return response()->json([
                    'success' => false,
                'message' => 'Category not found'
                ] ,404);
        }
        catch(\Exception $e)
        {
                return response()->json([
                    'success' => false,
                'message' => 'Error Occured',
                'error' => $e->getMessage()
                ],500);
        }
    
    
    }
}     