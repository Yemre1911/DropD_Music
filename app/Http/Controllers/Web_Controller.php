<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;

class Web_Controller extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        $products = Product::all();

        return view('index')->with('brands', $brands)->with('products', $products);
    }

    public function brands()
    {
        $brands = Brand::paginate(4);
        $products = Product::all();

        /* withCount('products'): Bu metod, Brand modeline ilişkili products modelinin sayısını ekler.
        Yani her Brand modelinde products_count adında bir özellik oluşturur ve bu özellik,
        o markaya ait ürün sayısını içerir.

        get(): Bu metod, sorguyu çalıştırır ve sonuçları bir koleksiyon olarak döner. */

        return view('brands')->with('brands', $brands)->with('products', $products);
    }

    public function guitars()
    {
        $brands = Brand::all();
        $products = Product::where('type', '!=', 'Amplifier')->paginate(6);

        return view('guitars')->with('brands', $brands)->with('products', $products);
    }


    public function amps()
    {
        $brands = Brand::all();
        $products = Product::where('type', '=', 'Amplifier')->paginate(6);

        return view('amps')->with('brands', $brands)->with('products', $products);
    }

    public function sale()
    {
        $brands = Brand::all();
        $products = Product::whereNotNull('sale')->paginate(6);

        return view('guitars')->with('brands', $brands)->with('products', $products);
    }

    public function product_show($model)
    {
        $brands = Brand::all();
        $product = Product::all();
        $main_product = Product::where('model', $model)->firstOrFail();
        return view('product_show')->with('brands', $brands)->with('products', $product)->with('main_product', $main_product);

    }



    public function filter_guitar(Request $request)
    {
        $query = Product::query();  //query DB'da sorgu yapmayı sağlayan bir komut, kriterleri ona aşağıda yüklüyorum

        if($request->page=='guitar')
            $query->where('type', '!=', 'Amplifier');   // amfiler hariç

        else if($request->page=='amp')
            $query->where('type', '=', 'Amplifier');   //  sadece amfilerx"

        //if($request->page=='amp')



        if ($request->has('brands')) {
            $query->whereIn('brand', $request->brands);
        }

        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        if ($request->has('symmetry')) {
            $query->where('symmetry', $request->symmetry);
        }

        if ($request->has('colors')) {
            $query->whereIn('color', $request->colors);
        }

        if ($request->has('price')) {
            [$min, $max] = explode('-', $request->price);
            $query->whereBetween('price', [(int)$min, (int)$max]);
        }

        $brands= Brand::all();
        $products = $query->paginate(6); // Her sayfada 10 ürün göstermek için

        if($request->page=='guitar' ||$request->page=='brand' )
            return view('guitars', compact('products','brands'));

         if($request->page=='amp')
            return view('amps', compact('products','brands'));
        }

        public function register()
        {
            $brand = Brand::all();
            $product = Product::all();
            return view('register')->with('products', $product)->with('brands', $brand);
        }

        public function login()
        {
            $brand = Brand::all();
            $product = Product::all();
            return view('login')->with('products', $product)->with('brands', $brand);
        }

        public function cart()
        {
            $brand = Brand::all();
            $product = Product::all();
            return view('cart')->with('products', $product)->with('brands', $brand);
        }
}
