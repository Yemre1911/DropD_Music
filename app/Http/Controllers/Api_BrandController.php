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
            'name' => 'sometimes|string',
            'info' => 'sometimes|string',

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
