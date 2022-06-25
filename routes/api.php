<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Public routes
// Route::apiResource('products', ProductController::class);
//Auth Routes
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);

// app routes
Route::get('products', [ProductController::class, 'index']);
Route::get('products/{product}', [ProductController::class, 'show']);
Route::get('products/search/{name}', [ProductController::class, 'search']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    //auth routes
    Route::post('logout', [LoginController::class, 'logout']);
    // app routes
    Route::post('products', [ProductController::class, 'store']);
    Route::put('products/{product}', [ProductController::class, 'update']);
    Route::delete('products/{product}', [ProductController::class, 'destroy']);
});
