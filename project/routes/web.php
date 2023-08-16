<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    // Routes accessible by users with 'admin' role
    Route::get('/admin', [AdminController::class, 'dashboard']);
    // Add more admin-only routes here
});


Route::group(['middleware' => ['auth', 'role:user']], function () {
    // Routes accessible by users with 'user' role
    Route::get('/user', [UserController::class, 'profile']);
    // Add more user-only routes here
});
