<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductCategoriesController;
use App\Http\Controllers\ProductsController;

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


Route::prefix('/admin')->name('admin.')->middleware('admin')->group(function(){
    Route::get('', function(){
        return view('admin.dashboard');
    });
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    Route::resource('productcategories', ProductCategoriesController::class);
    Route::resource('products', ProductsController::class);
});
