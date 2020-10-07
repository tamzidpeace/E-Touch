<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ContactController;

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
        Route::post('make', [CategoryController::class, 'make'])->name('admin.category.make');
        Route::get('update', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::post('destroy', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
    });

    //product
    Route::group(['prefix' => 'product'], function () {
        Route::get('index', [ProductController::class, 'index'])->name('admin.product.index');
        Route::get('make', [ProductController::class, 'make'])->name('admin.product.make');
        Route::post('make-confirm', [ProductController::class, 'makeConfirm'])->name('admin.product.make-confirm');
        Route::post('destroy', [ProductController::class, 'destroy'])->name('admin.product.destroy');
        Route::get('view', [ProductController::class, 'view'])->name('admin.product.view');
        Route::get('make-ajax', [ProductController::class, 'makeAjax'])->name('admin.product.make-ajax');
    });

    //contact
    Route::group(['middleware' => [], 'prefix' => 'contact'], function () {
        Route::get('index', [ContactController::class, 'index'])->name('admin.contact.index');
        Route::post('destroy', [ContactController::class, 'destroy'])->name('admin.contact.destroy');
        Route::get('view-message-ajax', [ContactController::class, 'viewMessageAjax'])->name('admin.contact.view-message-ajax');
    });
});

//user
Route::group(['prefix' => 'user'], function () {
    Route::get('home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');
    Route::get('product_details', [App\Http\Controllers\User\HomeController::class, 'productDetails'])->name('user.product-details');
    Route::get('ajax_product_images', [App\Http\Controllers\User\HomeController::class, 'ajaxProductImages'])->name('user.product.ajax-product-images');
    Route::get('about', [App\Http\Controllers\User\HomeController::class, 'about'])->name('user.about');
    Route::get('contact', [App\Http\Controllers\User\HomeController::class, 'contact'])->name('user.contact');
    Route::post('contact', [App\Http\Controllers\User\HomeController::class, 'contactMessage'])->name('user.contact.message');
    Route::get('category', [App\Http\Controllers\User\HomeController::class, 'category'])->name('user.product.category');
});
