<?php

use App\Http\Controllers\Api_BrandController;
use App\Http\Controllers\Api_ProductsController;
use App\Http\Controllers\Api_UserController;
use App\Http\Controllers\Api_TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



//Route::middleware('auth:sanctum')->group(function () {

        // PRODUCTS APİ İSTEMLERİ
        //====================================================================================================================

        Route::get('/products', [Api_ProductsController::class, 'index']);  // tüm ürünleri listeler
        Route::get('/products/{id}', [Api_ProductsController::class, 'findOne']); // belirli bir ürünü listeler (id'sine göre)
        Route::put('/products/{id}', [Api_ProductsController::class, 'update']); // belirli bir ürünü günceller (id'sine göre)
        Route::delete('/products/{id}', [Api_ProductsController::class, 'destroy']); // belirli bir ürünü siler (id'sine göre)


        // USERS APİ İSTEMLERİ
        //====================================================================================================================

        Route::get('/users', [Api_UserController::class, 'index']);  // tüm kullanıcıları listeler
        Route::get('/users/{id}', [Api_UserController::class, 'findOne']);  // id'ye göre bir kullanıcı listeler
        Route::delete('/users/{id}', [Api_UserController::class, 'destroy']);  // id'ye göre bir kullanıcı siler


        // BRANDS API İSTEMLERİ
        //=====================================================================================================================

        Route::get('/brands', [Api_BrandController::class, 'index']);  // tüm markaları listeler
        Route::get('/brands/{id}', [Api_BrandController::class, 'findOne']); // belirli bir markayı listeler (id'sine göre)
        Route::put('/brands/{id}', [Api_BrandController::class, 'update']); // belirli bir markayı günceller (id'sine göre)
        Route::delete('/brands/{id}', [Api_BrandController::class, 'destroy']); // belirli bir markayı siler (id'sine göre)

        // MANUEL API
        //================================================================
        Route::get('/list', [Api_TestController::class, 'index']);  //


//});



