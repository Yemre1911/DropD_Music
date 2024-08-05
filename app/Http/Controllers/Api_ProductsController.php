<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class Api_ProductsController extends Controller
{
    public function index()
    {
        return Product::all();
    }
    public function update(Request $request, Product $id)
    {

        $validated = $request->validate([
            'model' => 'sometimes|string',
            'price' => 'sometimes|numeric',
            'sale' => 'sometimes|nullable|numeric', // sale alanı zorunlu değil
            'brand' => 'sometimes|string',
            'type' => 'sometimes|string',
            'symmetry' => 'sometimes|string',
            'features' => 'sometimes|string',
            'stock' => 'sometimes|integer',
            'color' => 'sometimes|string',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'extra_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $id->update($validated);
        return $id;
    }
    public function findOne(Product $id)
    {
        return $id;
    }

    public function destroy(Product $id)
    {
        $id->delete();
        return response()->json(null, 204);

    }
}
