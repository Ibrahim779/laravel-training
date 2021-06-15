<?php

use App\Http\Controllers\Site\AboutController;
use App\Http\Controllers\Site\AuthController;
use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\NewsController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\WishlistController;
use App\Http\Middleware\SetLang;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::resource('products', ProductController::class)->only('index', 'show');
Route::get('products/categories/{category}', [ProductController::class, 'getCategoryProducts'])
    ->name('products.getCategoryProducts');
Route::resource('news', NewsController::class)->only('index', 'show');
Route::resource('about', AboutController::class)->only('index');
Route::resource('contact', ContactController::class)->only('index');

Route::middleware('auth')->group(function (){
    Route::resource('cart', CartController::class)->only('index', 'store');
    Route::resource('wishList', WishlistController::class)->only('index', 'store');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::view('login', 'site.auth.login')->name('loginForm');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::view('register', 'site.auth.register')->name('registerForm');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});


//set Lang
Route::get('lang/{lang}', function ($lang){
    session([SetLang::LANG_KEY => $lang]);
    return back();
})->name('lang');
