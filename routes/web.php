<?php

use Illuminate\Support\Facades\Route;
// website controller
use App\Http\Controllers\website\{MainController, ProductController};
// Dashboard controller
use App\Http\Controllers\dashboard\{DashboardMainController,CategoryController};
// Auth controller
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|*/
Auth::routes();

// Define website routes
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
], function () {
    Route::get('/', [MainController::class, 'home'])->name('home');
    Route::get('/about', [MainController::class, 'about'])->name('about');
    Route::get('/contactUs', [MainController::class, 'contactUs'])->name('contactUs');
    Route::get('/shop', [ProductController::class, 'shop'])->name('shop');
    Route::get('/shop-single', [ProductController::class, 'shopsingle'])->name('shopsingle');
});

// Define dashboard routes
// Define dashboard routes with localization
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth', 'dashboard'],
], function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/dashboard', [DashboardMainController::class, 'index'])->name('dashboard');
        
        // Define localized routes within the dashboard
        Route::resource('/categories', CategoryController::class);
    });
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home_auth');
