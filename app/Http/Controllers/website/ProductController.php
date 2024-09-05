<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
     //Shop page
     public function shop(){
        return view('website.pages.products/shop');
    }
    // shopsingle page
    public function shopsingle(){
        return view('website.pages.products/shop-single');
    }
}
