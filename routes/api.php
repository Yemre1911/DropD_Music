<?php

use App\Http\Controllers\Api_BrandController;
use App\Http\Controllers\Api_ProductsController;
use App\Http\Controllers\Api_UserController;
use App\Http\Controllers\Api_TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public routes

    Route::get('/generate-token', [Api_TestController::class, 'tokenFunc']);  // Token oluşturma endpoint'i

// Authenticated routes


    // PRODUCTS API ENDPOINTS
    Route::get('/products', [Api_ProductsController::class, 'index']);  // List all products
    Route::get('/products/{id}', [Api_ProductsController::class, 'findOne']); // Find product by ID
    Route::put('/products/{id}', [Api_ProductsController::class, 'update']); // Update product by ID
    Route::delete('/products/{id}', [Api_ProductsController::class, 'destroy']); // Delete product by ID

    // USERS API ENDPOINTS
    Route::get('/users', [Api_UserController::class, 'index'])->middleware('auth:sanctum');  // List all users
    Route::get('/users/{id}', [Api_UserController::class, 'findOne'])->middleware('auth:sanctum');  // Find user by ID
    Route::delete('/users/{id}', [Api_UserController::class, 'destroy'])->middleware('auth:sanctum');  // Delete user by ID
    Route::put('/users/{id}', [Api_UserController::class, 'update'])->middleware('auth:sanctum');  // update user by ID

    Route::get('/tokens', [Api_TestController::class, 'showTokens'])->middleware('auth:sanctum');  // Find user by ID



    // BRANDS API ENDPOINTS
    Route::get('/brands', [Api_BrandController::class, 'index']);   // List all brands
    Route::get('/brands/{id}', [Api_BrandController::class, 'findOne']); // Find brand by ID
    Route::put('/brands/{id}', [Api_BrandController::class, 'update']); // Update brand by ID
    Route::delete('/brands/{id}', [Api_BrandController::class, 'destroy']); // Delete brand by ID
    Route::get('/list', [Api_TestController::class, 'index']);  // Publicly accessible endpoint
    Route::get('/update', [Api_TestController::class, 'update']);  // Publicly accessible endpoint




// Manual API endpoint
