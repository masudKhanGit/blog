<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('backend.dashboard.index');
    })->name('dashboard');

    Route::controller(CategoryController::class)->group(function() {
        Route::get('/category/create', 'create')->name('create');
        Route::post('/category/store', 'categoryStore')->name('category.store');
        Route::get('/category/manage', 'manageCategory')->name('manage.category');
        Route::get('/category/edit/{id}', 'editCategory')->name('edit-category');
        Route::post('/category/update/{id}', 'updateCategory')->name('update-category');
        Route::get('/category/delete/{id}', 'deleteCategory')->name('delete-category');
    });

    Route::controller(BrandController::class)->group(function() {
        Route::get('/brand/add-brand', 'addBrand')->name('index');
        Route::post('/admin/store-brand', 'storeBrand')->name('store-brand');
        Route::get('/brand/manage-brand', 'manageBrand')->name('manage-brand');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('product/create', 'create')->name('product.create');
        Route::post('product/store', 'store')->name('product.store');
    });
});
