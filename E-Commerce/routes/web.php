<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FontendController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\FontEndController as UserFontEndController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UserFontEndController::class, 'index']);
Route::get('user-category', [UserFontEndController::class, 'category']);
Route::get('view-category/{slug}', [UserFontEndController::class, 'viewCategory']);
Route::get('category/{category_slug}/{prod_slug}', [UserFontEndController::class, 'viewProduct']);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
    Route::post('add-to-cart', [CartController::class, 'addProductToCart']);
});

Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard', [FontendController::class, 'index']);

    //Category API's
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('add-category', [CategoryController::class, 'add']);
    Route::post('insert-category', [CategoryController::class, 'insert']);
    Route::get('edit-category/{id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);

    //Product API's
    Route::get('products', [ProductController::class, 'index']);
    Route::get('add-product', [ProductController::class, 'add']);
    Route::post('insert-products', [ProductController::class, 'insert']);
    Route::get('edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('update-products/{id}', [ProductController::class, 'update']);
    Route::get('delete-product/{id}', [ProductController::class, 'destroy']);
});
