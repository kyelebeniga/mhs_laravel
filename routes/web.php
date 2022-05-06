<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RegisterController;
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
//home route


// Login
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('userLogin', [LoginController::class, 'userLogin']);

// Registration
Route::get('register', [RegisterController::class, 'register']);
Route::post('saveUser', [RegisterController::class, 'saveUser']);

// Auth check
Route::group(['middleware' => 'auth.user'], function(){
    // Home page
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/', [MovieController::class, 'show']); //Shows the data from the movie table
    // Logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});