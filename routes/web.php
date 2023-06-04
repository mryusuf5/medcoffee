<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductCategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\CartsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('user.welcome');
})->name('home');

Route::resource('user', UserController::class);
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/products', [ProductsController::class, 'userProducts'])->name('userProducts');
Route::get('/products/{id}', [ProductCategoriesController::class, 'userShowCategory'])->name('showCategory');
Route::get('/products/{id}/show', [ProductsController::class, 'userShowProduct'])->name('showProduct');
Route::resource('reviews', ReviewsController::class);

Route::prefix('/cart')->group(function(){
    Route::post('/store', [CartsController::class, 'store'])->name('cartStore');
    Route::get('/empty', [CartsController::class, 'empty_cart']);
    Route::get('/', [CartsController::class, 'index'])->name('cart');
    Route::post('/delete/{index}', [CartsController::class, 'delete'])->name('cartDelete');
});


Route::prefix('/admin')->name('admin.')->middleware('admin')->group(function(){
    Route::get('', function(){
        return view('admin.dashboard');
    });
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    Route::resource('productcategories', ProductCategoriesController::class);
    Route::resource('products', ProductsController::class);
});
