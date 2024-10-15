<?php

namespace App\Http\Controllers\dashboard\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryApiController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::with('category')->get();
        if ($subcategories->isEmpty()) {
            return response()->json(['message' => 'No subcategories found'], 404);
        }

        return response()->json([
            'success' => true,
            'total_subCategory' => $subcategories->count(),
            'data' => $subcategories,
            'message' => 'All subcategories have been retrieved'
        ], 200);
    }

    public function store(Request $request)
    {
        try {
            $validateData = $request->validate([
                'title' => 'required|unique:sub_categories,title|max:255',
                'description' => 'nullable',
                'category_id' => 'required|exists:categories,id'
            ]);

            $subCategory = SubCategory::create($validateData);
            return response()->json([
                'success' => true,
                'data' => $subCategory,
                'message' => 'Subcategory created successfully'
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }
    }

    public function show($id)
    {
        try {
            $subCategory = SubCategory::with('category')->findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => $subCategory,
                'message' => 'Subcategory has been retrieved'
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Subcategory not found'
            ], 404);
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $validateData = $request->validate([
                'title' => 'required|unique:sub_categories,title,' . $id . '|max:255',
                'description' => 'nullable',
                'category_id' => 'required|exists:categories,id'
            ]);

            $subCategory = SubCategory::findOrFail($id);
            $subCategory->update($validateData);
            return response()->json([
                'success' => true,
                'data' => $subCategory,
                'message' => 'Subcategory updated successfully'
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Subcategory not found'
            ], 404);
        }
    }

    public function destroy(int $id)
    {
        try {
            $subCategory = SubCategory::findOrFail($id);
            $subCategory->delete();
            return response()->json([
                'success' => true,
                'message' => 'Subcategory deleted successfully',
                'deleted_data' => $subCategory
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Subcategory not found'
            ], 404);
        }
    }
}
