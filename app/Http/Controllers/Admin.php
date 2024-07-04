<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Brand;
use App\Models\Product;


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
            'name' => $request->username, // 'name' sütununu 'username' alanından alıyoruz
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            // Başarılı giriş
            return redirect()->route('admin_index');
        }

        // Başarısız giriş
        return redirect()->back()->with('error', 'Invalid credentials')->withInput();
    }

    public function index()
    {
        return view('admin/index_admin');
    }

    public function products()
    {
        $brands = Brand::all();
        $products = Product::all();

        return view('admin/products_admin')->with('brands', $brands)->with('products', $products);

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

    public function add_product()
    {
        $brands = Brand::all();

        return view('admin/admin_add_product', compact('brands'));
    }

    public function add_brand()
    {
        return view('admin/admin_add_brand');
    }
}
