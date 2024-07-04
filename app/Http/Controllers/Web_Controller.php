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
        $products = Product::paginate(6);

        return view('guitars')->with('brands', $brands)->with('products', $products);
    }

    public function filter_guitar(Request $request)
    {
        $query = Product::query();  //query DB'da sorgu yapmayı sağlayan bir komut, kriterleri ona aşağıda yüklüyorum

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


        return view('guitars', compact('products','brands'));
    }
}
