<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/all-product', [ProductController::class, 'allProduct'])->name('all.product');
Route::get('/category-product/{cat_id}', [ProductController::class, 'categoryProduct'])->name('category.product');