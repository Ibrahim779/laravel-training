<?php

use App\Http\Controllers\Site\AuthController;
use App\Http\Controllers\Site\HomeController;
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

Route::middleware('auth')->group(function (){
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function (){
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
