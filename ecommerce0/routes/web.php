<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;

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

// admin



Route::group(['prefix' => 'admin'], function () {
    Route::get('dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    
    // category
    Route::group(['prefix' => 'category'], function () {
        Route::get('index', [CategoryController::class, 'index'])->name('admin.category.index');
    });
});