<?php

use Illuminate\Support\Facades\Route;
// website controller
use App\Http\Controllers\website\{MainController, ProductController, UserProfileController};
// Dashboard controller
use App\Http\Controllers\dashboard\{DashboardMainController, CategoryController, SubCategoryController, ProductsController, profileController,UserController};

// Auth controller
use Illuminate\Support\Facades\Auth;

Auth::routes();

// Define website routes
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
],
 function () {
    Route::get('/', [MainController::class, 'home'])->name('home');
    Route::get('/about', [MainController::class, 'about'])->name('about');
    Route::get('/contactUs', [MainController::class, 'contactUs'])->name('contactUs');
    Route::get('/shop/{category?}', [ProductController::class, 'shop'])->name('shop');
    Route::get('/shop-single/{id}', [ProductController::class, 'shopsingle'])->name('shopsingle');
    Route::get('/categories', [MainController::class, 'categories'])->name('categories');
    Route::get('/profiles', [MainController::class, 'profileAdmin'])->name('profileAdmin');

    // User profile routes
    Route::get('/profile/{user}/', [UserProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit/{user}', [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{user}', [UserProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/{username}/change-password', [UserProfileController::class, 'changePassword'])->name('profile.changePassword');
    Route::patch('/profile/{id}/update-password', [UserProfileController::class, 'updatePassword'])->name('profile.updatePassword');
});

// Define dashboard routes
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth', 'dashboard'],
], function () {
    Route::prefix('dashboard')->group(function () {
        // categories
        Route::get('/', [DashboardMainController::class, 'index'])->name('dashboard');
        Route::resource('/categories', CategoryController::class);
        Route::get('/category/delete',[CategoryController::class, 'delete'])->name('categories.delete');
        Route::get('/category/restore/{id}',[CategoryController::class, 'restore'])->name('categories.restore');
        Route::delete('/category/forecDelete/{id}',[CategoryController::class, 'forceDelete'])->name('categories.forceDelete');

       //subcategories
       Route::resource('subcategories', SubCategoryController::class);
       Route::get('/subcategory/delete',[SubCategoryController::class, 'delete'])->name('subcategories.delete');
       Route::get('/subcategory/restore/{id}', [SubCategoryController::class, 'restore'])->name('subcategories.restore');
       Route::delete('/subcategory/forceDelete/{id}', [SubCategoryController::class,'forceDelete'])->name('subcategories.forceDelete');
       //  routing Products
       Route::resource('/products', ProductsController::class);
       Route::get('/product/delete',[ProductsController::class, 'delete'])->name('products.delete');
       Route::get('/product/restore/{id}', [ProductsController::class, 'restore'])->name('products.restore');
       Route::delete('/product/forceDelete/{id}', [ProductsController::class,'forceDelete'])->name('products.forceDelete');

       // Users 
       Route::resource('/users', UserController::class)->parameters(['users' => 'username']);
       Route::get('/user/customer',[UserController::class, 'customersIndex'])->name('users.customers');
       Route::get('/user/moderator',[UserController::class, 'moderatorIndex'])->name('users.moderators');
       Route::get('/user/admin',[UserController::class, 'adminIndex'])->name('users.admins');
       
       // profiles
        Route::resource('/profiles', profileController::class);
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home_auth');

// Route for switching languages
Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');
