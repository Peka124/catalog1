<?php

use Illuminate\Support\Facades\Route;

Route::resource("products", ProductController::class);
Route::resource("comments", CommentController::class);
Route::prefix("admin")->middleware("auth")->group(function () {
    Route::get("comments", [AdminController::class, "index"])->name("admin.comments.index");
    Route::put("comments/{comment}/approve", [AdminController::class, "approveComment"])->name("admin.comments.approve");
});

// Route::get('/', function () {
//     return view('welcome');
// });
