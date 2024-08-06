<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Brand_controller;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Web_Controller;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CountryMiddleware;

Route::get('/', [Web_Controller::class, 'index'])->name('anasayfa');
Route::get('/404', [Web_Controller::class, 'page404'])->name('404');
Route::get('/search', [Web_Controller::class, 'search'])->name('search');


// --------------------------------------------------------



// ============ ADMIN ROUTES ====================================================================
Route::get('/admin', function () {
    return view('admin/login_admin');
})->name('admin_login');

Route::post('/admin/login', [Admin::class, 'login'])->name('login_admin');

Route::middleware(AdminMiddleware::class)->group(function () {

    Route::get('/admin/index_admin', [Admin::class, 'index'])->name('admin_index');

    Route::get('/admin/products', [Admin::class, 'products'])->name('admin_products');

    Route::get('/admin/accounts', [Admin::class, 'accounts'])->name('admin_accounts');

    Route::get('/admin/edit_product{id}', [Admin::class, 'edit_product'])->name('edit_product');

    Route::get('/admin/add_product', [Admin::class, 'add_product'])->name('add_product');

    Route::post('/add-product/{id?}', [ProductController::class, 'store'])->name('product.store');

    Route::get('/admin/search-product', [ProductController::class, 'search'])->name('product.search');

    Route::get('/admin/add-brand', [Admin::class, 'add_brand'])->name('show_brand');

    Route::get('/admin/logout', [Admin::class, 'logout'])->name('admin_logout');


    Route::post('/add_brand', [Brand_Controller::class, 'add_brand'])->name('add_brand');
});


//========= WEB ROUTES ====================================================================================

Route::get('/brands', [Web_Controller::class, 'brands'])->name('brands_page');

Route::get('/guitars', [Web_Controller::class, 'guitars'])->name('guitars_page');

Route::get('/filter_guitar', [Web_Controller::class, 'filter_guitar'])->name('filter_guitar');

Route::get('/amps', [Web_Controller::class, 'amps'])->name('amps_page');

Route::get('/cart', [CartController::class, 'index'])->name('cart_page');

Route::post('/cart', [CartController::class, 'add'])->name('cart_add');

Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/sale', [Web_Controller::class, 'sale'])->name('sale_page'); //->middleware(CountryMiddleware::class);;

Route::get('/product/{model}', [Web_Controller::class, 'product_show'])->name('product.show');

Route::get('/register', [Web_Controller::class, 'register'])->name('register_page');

Route::get('/login', [Web_Controller::class, 'login'])->name('login_page');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/login', [AuthController::class, 'authenticate'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('products/{product}/comments', [CommentController::class, 'store'])->middleware('auth');

Route::get('/payment', [PaymentController::class, 'index'])->name('payment_page');

Route::post('/payment', [PaymentController::class, 'payment'])->name('payment_function');






// ==================================================================================================
