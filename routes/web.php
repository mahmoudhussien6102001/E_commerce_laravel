<?php

use Illuminate\Support\Facades\Route;
// website controller
use App\Http\Controllers\website\{MainController, ProductController};
// Dashboard controller
use App\Http\Controllers\dashboard\{DashboardMainController,CategoryController,SubCategoryController,ProductsController};
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
});

// Define dashboard routes
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth', 'dashboard'],
], function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardMainController::class, 'index'])->name('dashboard');

        Route::resource('/categories', CategoryController::class);
        Route::get('/category/delete',[CategoryController::class, 'delete'])->name('categories.delete');
        Route::get('/category/restore/{id}',[CategoryController::class, 'restore'])->name('categories.restore');
        Route::delete('/category/forecDelete/{id}',[CategoryController::class, 'forceDelete'])->name('categories.forceDelete');











        
       
       Route::resource('subcategories', SubCategoryController::class);
       Route::get('/subcategory/delete',[SubCategoryController::class, 'delete'])->name('subcategories.delete');
       Route::get('/subcategory/restore/{id}', [SubCategoryController::class, 'restore'])->name('subcategories.restore');
       Route::delete('/subcategory/forceDelete/{id}', [SubCategoryController::class,'forceDelete'])->name('subcategories.forceDelete');
       //  routing Products
       Route::resource('/products', ProductsController::class);
       Route::get('/product/delete',[ProductsController::class, 'delete'])->name('products.delete');
       Route::get('/product/restore/{id}', [ProductsController::class, 'restore'])->name('products.restore');
       Route::delete('/product/forceDelete/{id}', [ProductsController::class,'forceDelete'])->name('products.forceDelete');
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
