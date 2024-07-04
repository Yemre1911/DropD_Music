<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;


class Brand_controller extends Controller
{

    public function add_brand(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'info' => 'required|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $brand = new Brand();
        $brand->name = $request->input('name');
        $brand->info = $request->input('info');

        if ($request->hasFile('img')) {
            $brand->img = $request->file('img')->store('images', 'public');
        }

        $brand->save();

        return redirect()->route('admin_index')->with('success', 'Product added successfully!');


    }

}
