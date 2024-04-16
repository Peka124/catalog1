<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;

// Routes for products
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::resource('products', ProductController::class);

// Routes for comments
Route::post('comments', [CommentController::class, 'store'])->name('comments.store');
// Add other routes as needed for comments

// Routes for admin panel
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('comments', [AdminController::class, 'index'])->name('admin.comments.index');
    Route::put('comments/{comment}/approve', [AdminController::class, 'approveComment'])->name('admin.comments.approve');
});


// Route::get('/', function () {
//     return view('welcome');
// });
