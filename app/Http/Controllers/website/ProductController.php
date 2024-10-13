<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Shop page
    public function shop()
    {

        $products = Product::paginate(6);
        $menCount = Product::where('category_id', 1)->count(); 
        $womenCount = Product::where('category_id', 2)->count(); 
        $childrenCount = Product::where('category_id', 3)->count();     
        return view('website.pages.products.shop', compact('products' , 'menCount', 'womenCount', 'childrenCount'));
    }

    // Shop single page
    public function shopsingle($id) 
    {
        $product = Product::findOrFail($id); 
        $products = Product::all(); 
        return view('website.pages.products.shop-single', compact('product' , 'products'));
    }
}

