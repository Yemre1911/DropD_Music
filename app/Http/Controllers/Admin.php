<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\Stock;
use App\Models\User;
use App\Models\Tshirt;



class Admin extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Kimlik doğrulama girişimi
        $credentials = [
            'first_name' => $request->username, // 'name' sütununu 'username' alanından alıyoruz
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            // Başarılı giriş
            return redirect()->route('admin_index');
        }

        // Başarısız giriş
        return redirect()->back()->with('error', 'Invalid credentials')->withInput();
    }


    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();          // geçersiz kılmak, şu anki oturumu
        request()->session()->regenerateToken();    //csrf tokenini yeniler, günvelik için yapılır

        return redirect()->route('admin_login');
    }
    public function index()
    {
        $products = Product::all();
        $order = Order::all();
        $user = User::all();
        $brands = Brand::all();
        return view('admin/index_admin')->with('orders', $order)->with('products', $products)->with('users', $user)->with('brands', $brands);
    }

    public function products()
    {
        $brands = Brand::all();
        $products = Product::all();
        $tshirts = Tshirt::all();

        return view('admin/products_admin')->with('brands', $brands)->with('products', $products)->with('tshirts', $tshirts);
    }

    public function accounts()
    {
        return view('admin/admin_accounts');
    }

    public function edit_product($id)
    {
        $productID = Product::find($id);
        $brands = Brand::all();

        return view('admin/admin_edit_products')->with('productID', $productID)->with('brands', $brands);
    }

    public function edit_tshirt($id)
    {
        // Ürünü, ilişkili varyasyonları ve varyasyonların stoklarını çekiyoruz
        $tshirt = Tshirt::with(['variants.stock'])->find($id); // 'variations' ve 'stock' ilişkilerini yükle
        $brands = Brand::select('name')->get();

        return view('admin/admin_edit_tshirt', compact('tshirt', 'brands'));
    }

    public function add_product()
    {
        $brands = Brand::all();

        return view('admin/admin_add_product', compact('brands'));
    }

    public function add_brand()
    {
        return view('admin/admin_add_brand');
    }

    public function add_tshirt()
    {
        $brands = Brand::all();
        $products = Product::all();
        return view('admin/admin_add_tshirt')->with('brands', $brands)->with('products', $products);
    }
}
