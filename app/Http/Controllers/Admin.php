<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;


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
        if($this->isAdmin()) {

            auth()->logout();
            request()->session()->invalidate();          // geçersiz kılmak, şu anki oturumu
            request()->session()->regenerateToken();    //csrf tokenini yeniler, günvelik için yapılır

            return redirect()->route('admin_login');
        }
        else {
            return redirect()->route('admin_login');
        }

    }
    public function index()
    {
        if($this->isAdmin()) {
            $products = Product::all();
            $order = Order::all();
            $user = User::all();
            $brands = Brand::all();
            return view('admin/index_admin')->with('orders',$order)->with('products',$products)->with('users',$user)->with('brands',$brands);
        } else {
            return redirect()->route('admin_login');
        }

    }

    public function products()
    {
        $brands = Brand::all();
        $products = Product::all();

        if($this->isAdmin()) {
            return view('admin/products_admin')->with('brands', $brands)->with('products', $products);
        } else {
            return redirect()->route('admin_login');
        }


    }

    public function accounts()
    {
        if($this->isAdmin()) {
            return view('admin/admin_accounts');
        } else {
            return redirect()->route('admin_login');
        }
    }

    public function edit_product($id)
    {
        $productID = Product::find($id);
        $brands = Brand::all();

        if($this->isAdmin()) {
            return view('admin/admin_edit_products')->with('productID', $productID)->with('brands', $brands);
        } else {
            return redirect()->route('admin_login');
        }
    }

    public function add_product()
    {
        $brands = Brand::all();

        if($this->isAdmin()) {
            return view('admin/admin_add_product', compact('brands'));
        } else {
            return redirect()->route('admin_login');
        }

    }

    public function add_brand()
    {
        if($this->isAdmin()) {
            return view('admin/admin_add_brand');
        } else {
            return redirect()->route('admin_login');
        }
    }

    public function isAdmin()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->is_admin) {
                return true;
            }
        }
        return false;
    }
}
