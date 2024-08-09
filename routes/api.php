<?php

use App\Http\Controllers\Api_BrandController;
use App\Http\Controllers\Api_ProductsController;
use App\Http\Controllers\Api_UserController;
use App\Http\Controllers\Api_TestController;
use App\Http\Middleware\ApiTokenMiddleware;
use App\Http\Middleware\BasicAuthMiddleware;
use App\Http\Middleware\CheckAbilitiesMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public routes

Route::get('/generate-token', [Api_TestController::class, 'tokenFunc']);  // Token oluşturma endpoint'i


// USERS API ENDPOINTS   (Only with Token Authantication)
Route::middleware(ApiTokenMiddleware::class)->group(function () {

    Route::get('/users', [Api_UserController::class, 'index'])->middleware('checkAbilities:view');  // List all users
    Route::get('/users/{id}', [Api_UserController::class, 'findOne'])->middleware('checkAbilities:view');  // Find user by ID
    Route::delete('/users/{id}', [Api_UserController::class, 'destroy'])->middleware('checkAbilities:delete');  // Delete user by ID
    Route::put('/users/{id}', [Api_UserController::class, 'update'])->middleware('checkAbilities:update');    // update user by ID
    Route::get('/tokens', [Api_TestController::class, 'showTokens'])->middleware('checkAbilities:update');  // Find user by ID
    Route::put('/usersTokenUpdate/{id}', [Api_UserController::class, 'tokenUpdate'])->middleware('checkAbilities:update');    // update user by ID

    // PRODUCTS API ENDPOINTS

    Route::get('/products', [Api_ProductsController::class, 'index'])->middleware('checkAbilities:view');  // List all products
    Route::get('/products/{id}', [Api_ProductsController::class, 'findOne'])->middleware('checkAbilities:view'); // Find product by ID
    Route::put('/products/{id}', [Api_ProductsController::class, 'update'])->middleware('checkAbilities:update'); // Update product by ID
    Route::delete('/products/{id}', [Api_ProductsController::class, 'destroy'])->middleware('checkAbilities:delete'); // Delete product by ID
});



// BRANDS API ENDPOINTS         (Only with Basic Auth Authantication)
Route::middleware(BasicAuthMiddleware::class)->group(function () {

    Route::get('/brands', [Api_BrandController::class, 'index']);   // List all brands
    Route::get('/brands/{id}', [Api_BrandController::class, 'findOne']); // Find brand by ID
    Route::put('/brands/{id}', [Api_BrandController::class, 'update']); // Update brand by ID
    Route::delete('/brands/{id}', [Api_BrandController::class, 'destroy']); // Delete brand by ID


    Route::get('/list', [Api_TestController::class, 'index']);  // Publicly accessible endpoint
    // tablo adı, id ve sütun adı girildikten sonra listeleme yapan route

    Route::get('/update', [Api_TestController::class, 'update']);  // Publicly accessible endpoint
    // id ve goal yazıldıktan sonra goal'ın içeriğine göre (comments, cart, address) kullanıcı bilgisi veren route
});
