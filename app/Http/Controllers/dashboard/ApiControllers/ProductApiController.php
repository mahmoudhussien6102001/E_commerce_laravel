<?php

namespace App\Http\Controllers\dashboard\ApiControllers;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product ;

class ProductApiController extends Controller
{
    //
    public function index () {
        $products = Product::with(['category', 'subcategory'])->get();
        if ($products->isEmpty()) {
            return response()->json(['message' => 'No subcategories found'], 404);
        }
        return response()->json([
            'success' => true,
            'data' => $products
        ], 200);
    }

    public function show ($id)
     {
        try
        {
            $product = Product::findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => $product,
                'message' => 'Subcategory has been retrieved'
            ], 200);


        }
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Subcategory not found'
            ], 404);
        }
    }
     
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'available_quantity' => 'required|integer|max:1020',
            'category_id' => 'nullable|exists:categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id'
        ]);
    
        $imagePath = null;
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }
    
        $product = Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'available_quantity' => $request->available_quantity,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
        ]);
    
        return response()->json([
            'success' => true,
            'message' => 'Product created successfully!',
            'data' => $product
        ], 201);
    }
    public function update(Request $request, int $id)
            {
                // Validate data
                $request->validate([
                    'title' => 'required|string|max:255',
                    'description' => 'nullable|string',
                    'price' => 'required|numeric',
                    'available_quantity' => 'required|integer|max:1020',
                    'category_id' => 'nullable|exists:categories,id',
                    'sub_category_id' => 'nullable|exists:sub_categories,id',
                    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

                // Find by ID
                $product = Product::findOrFail($id);
                $product->title = $request->title;
                $product->description = $request->description;
                $product->price = $request->price;
                $product->available_quantity = $request->available_quantity;
                $product->category_id = $request->category_id;
                $product->sub_category_id = $request->sub_category_id;

                // Handle the image upload
                if ($request->hasFile('image')) {
                    // Delete the old image if it exists
                    if ($product->image) {
                        Storage::disk('public')->delete($product->image);
                    }
                    // the new image
                    $product->image = $request->file('image')->store('products', 'public');
                }

                // Save the updated product
                $product->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Product updated successfully!',
                    'data' => $product
                ], 200);
            }
            // Inside your ProductController
            public function destroy($id)
            {
                // Find the product by ID
                $product = Product::findOrFail($id);

                // Delete the image from storage if it exists
                if ($product->image) {
                    Storage::disk('public')->delete($product->image);
                }

                // Delete the product from the database
                $product->delete();

                return response()->json([
                    'success' => true,
                    'message' => 'Product deleted successfully!'
                ], 200);
            }


    
    
}
