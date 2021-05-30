<?php

use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
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

Route::namespace('Dashboard')->group(function (){
    Route::middleware('guest:admin')->group(function (){
        Route::view('login', 'dashboard.auth.login')->name('loginForm');
        Route::post('login', [AuthController::class, 'login'])->name('login');
    });
    Route::middleware('auth:admin')->group(function (){
        Route::get('/main', [DashboardController::class, 'index'])->name('main');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    });
});
