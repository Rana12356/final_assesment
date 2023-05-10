<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/category-product', [HomeController::class, 'index'])->name('category-product');
Route::get('/details/{id}', [HomeController::class, 'details'])->name('details');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/add-product', [ProductController::class, 'addProduct'])->name('product.add');
    Route::post('/new-product', [ProductController::class, 'newProduct'])->name('product.store');
    Route::get('/manage-product', [ProductController::class, 'manageProduct'])->name('product.manage');
    Route::get('/edit-product/{id}', [ProductController::class, 'editProduct'])->name('product.edit');
    Route::post('/update-product/{id}', [ProductController::class, 'updateProduct'])->name('product.update');
    Route::get('/delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('product.delete');
});
