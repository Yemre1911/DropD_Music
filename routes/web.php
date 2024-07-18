<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Brand_controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Web_Controller;

    Route::get('/', [Web_Controller::class, 'index']) ->name('anasayfa');

    // --------------------------------------------------------

Route::get('/show_temp', function () {
    return view('show');   }) ->name('show.index');

// ============ ADMIN ROUTES ====================================================================
Route::get('/admin', function () {
    return view('admin/login_admin');})->name('admin_login');

        Route::post('/admin/login', [Admin::class, 'login'])->name('login_admin');

        Route::get('/admin/index_admin', [Admin::class, 'index'])->name('admin_index');

        Route::get('/admin/products', [Admin::class, 'products'])->name('admin_products');

        Route::get('/admin/accounts', [Admin::class, 'accounts'])->name('admin_accounts');

        Route::get('/admin/edit_product{id}', [Admin::class, 'edit_product'])->name('edit_product');

        Route::get('/admin/add_product', [Admin::class, 'add_product'])->name('add_product');

        Route::post('/add-product/{id?}', [ProductController::class, 'store'])->name('product.store');

        Route::get('/admin/search-product', [ProductController::class, 'search'])->name('product.search');

        //Route::post('/update-product{id}', [ProductController::class, 'update'])->name('product_update');

        Route::get('/admin/add-brand', [Admin::class, 'add_brand'])->name('show_brand');

        Route::post('/add_brand', [Brand_controller::class, 'add_brand'])->name('add_brand');

        //========= WEB ROUTES ====================================================================================

        Route::get('/brands', [Web_Controller::class, 'brands'])->name('brands_page');

        Route::get('/guitars', [Web_Controller::class, 'guitars'])->name('guitars_page');

        Route::get('/filter_guitar', [Web_Controller::class, 'filter_guitar'])->name('filter_guitar');






// ==================================================================================================







