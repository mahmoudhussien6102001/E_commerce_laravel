<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Profile;

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
    
    public function profileAdmin() {
        $currentUser = auth()->user();
        $profile = Profile::with('user')->where('user_id', $currentUser->id)->first();
        return view('website.pages.profiles.profile_admin', compact('profile'));
    }
    
    public function profileUser() {
        $currentUser = auth()->user();
        $profile = Profile::with('user')->where('user_id', $currentUser->id)->first();
        return view('website.pages.profiles.profile_user', compact('profile'));
    }
}
