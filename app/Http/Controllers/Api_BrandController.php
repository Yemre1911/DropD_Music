<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class Api_BrandController extends Controller
{

    public function index()
    {
        return Brand::all();
    }
    public function update(Request $request, Brand $id)
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
    public function findOne(Brand $id)
    {
        return $id;
    }

    public function destroy(Brand $id)
    {
        $id->delete();
        return response()->json(null, 204);
    }
}
