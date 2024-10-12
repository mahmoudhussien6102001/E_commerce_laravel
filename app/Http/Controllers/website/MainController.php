<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class MainController extends Controller
{
    
     // Home Page 
     public function home() {
        return view('website.pages.home');
    }
    // about Page
    public function about(){
        return view('website.pages.about');
    }
    // Contact us
    public function contactUs(){
        return view('website.pages.contuctUs');
    }

    public function categories(){
        $categories = Category::all();
        return view('website.pages.categories.categories',compact('categories'));
    }
}
