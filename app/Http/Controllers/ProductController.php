<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage; // Storage sınıfını dahil edin

class ProductController extends Controller
{
    public function store(Request $request, $id = null)
    {
        //  dd($request->all());

        $request->validate([
            'model' => 'required|string',
            'price' => 'required|numeric',
            'sale' => 'sometimes|nullable|numeric', // sale alanı zorunlu değil
            'brand' => 'required|string',
            'type' => 'required|string',
            'symmetry' => 'required|string',
            'features' => 'required|string',
            'stock' => 'required|integer',
            'color' => 'required|string',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'extra_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($id)
        {
            $product = Product::find($id);
            if (!$product)
            {
                return redirect()->route('admin_index')->with('error', 'Product not found.');
            }
        }
        else
        {
            $product = new Product();
            $product->product_code = $this->generateUniqueProductCode();
        }

        $product->model = $request->input('model');
        $product->price = $request->input('price');
        $product->brand = $request->input('brand');
        $product->type = $request->input('type');
        $product->symmetry = $request->input('symmetry');
        $product->features = $request->input('features');
        $product->stock = $request->input('stock');
        $product->color = $request->input('color');

        if ($request->filled('sale')) { // eğer sale alanı dolu ise, Db'da sale fiyatı ekliyoruz
            $product->sale = $request->input('sale');
        }
        else {
            $product->sale = null;  // değilse, ama yinede bir edit yapıldıysa, indirimi ortadan kaldırıyorum
        }


        if ($request->hasFile('main_image')) {
            $product->main_image = $request->file('main_image')->store('images', 'public');
        } else if ($request->input('existing_main_image')) {
            $product->main_image = $request->input('existing_main_image');
        }

        $existingImages = $request->input('existing_images', []);

        foreach ($existingImages as $key => $image) {
            $product->{'image' . ($key + 1)} = $image;
        }

        if ($request->hasFile('extra_images')) {
            foreach ($request->file('extra_images') as $key => $image) {
                if ($key < 4) { // Sadece 4 adet resim yüklemek için kontrol
                    $product->{'image' . ($key + 1)} = $image->store('images', 'public');
                }
            }
        }

        $product->save();

        if ($id) {
            return redirect()->route('admin_index')->with('success', 'Product updated successfully!');
        } else {
            return redirect()->route('admin_index')->with('success', 'Product added successfully!');
        }
    }

    private function generateUniqueProductCode()
    {
        do {
            $code = '#' . str_pad(mt_rand(0, 9999999), 7, '0', STR_PAD_LEFT);
        } while (Product::where('product_code', $code)->exists());

        return $code;
    }

    public function search(Request $request)
    {
        $product_code = $request->input('product_code');    // ürün kodunu aldım

        if ($product_code && preg_match('/^#\d{7}$/', $product_code)) { // ürün kodu geldiyse ve baş karakteri(^) # işareti ise, 7 karakterli ise
            $products = Product::where('product_code', $product_code)->get();
        } else {
            $products = Product::all(); // Tüm ürünleri getir
        }
        $brands = Brand::all();
        return view('admin/products_admin')->with('brands', $brands)->with('products', $products);


    }
}
