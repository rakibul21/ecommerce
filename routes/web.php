<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Dashboardcontroller;
use App\Http\Controllers\CommentController;


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

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/product/details/{id}', [ProductController::class, 'details'])->name('product.details');
Route::get('/category/details{id}',[CategoryController::class,'details'])->name('category.details');
Route::get('/brand/details/{id}', [BrandController::class, 'details'])->name('brand.details');
Route::post('/new-product-comment/{id}', [HomeController::class, 'newComment'])->name('new-product-comment');





Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {

    Route::get('/dashboard', [Dashboardcontroller::class,'index'])->name('dashboard');
    Route::get('/category/add',[CategoryController::class,'index'])->name('category.index');
    Route::post('/category/create', [CategoryController::class,'create'])->name('category.create');
    Route::get('/category/manage', [CategoryController::class,'manage'])->name('category.manage');
    Route::get('/category/edit/{id}', [CategoryController::class,'edit'])->name('category.edit');
    Route::post('/category/update{id}',[CategoryController::class,'update'])->name('category.update');
    Route::get('/category/delete{id}',[CategoryController::class,'delete'])->name('category.delete');


    Route::resource('/comment',CommentController::class);


    Route::resource('/brand',BrandController::class);



    Route::resource('/product',ProductController::class);

});
