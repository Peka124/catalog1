<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;

// Route for admin authentication
Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login']);

// Routes for admin panel with middleware to restrict access
Route::middleware('auth:admin')->group(function () {
    // Route for admin dashboard
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Route for approving comments
    Route::put('admin/comments/{comment}/approve', [AdminController::class, 'approveComment'])->name('admin.comments.approve');
});


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
