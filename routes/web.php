<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

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
        Route::get('/category/editManageCategory/{id}', 'editManageCategory')->name('editManageCategory');
    });

});
