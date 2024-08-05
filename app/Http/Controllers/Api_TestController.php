<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Comment;
use Illuminate\Support\Facades\Schema;

class Api_TestController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'table' => 'required|string',
            'where' => 'required|string',
            'id' => 'nullable|numeric'
        ]);

        $table = $validated['table'];
        $whereColumn = $validated['where'];
        $id  = $validated['id'] ?? null;
        switch ($table) {
            case 'Brand':
                $model = new Brand();
                break;
            case 'Product':
                $model = new Product();
                break;
            case 'User':
                $model = new User();
                break;
            case 'Order':
                $model = new Order();
                break;
            case 'Comment':
                $model = new Comment();
                break;
            default:
                return response()->json(['message' => 'Invalid table name'], 400);
        }

        // Check if the column exists in the table

        if (!Schema::hasColumn($model->getTable(), $whereColumn)) {
            return response()->json(['message' => 'Invalid column name'], 400);
        }

        if ($id) {
            $object = $model->select('id', $whereColumn)->find($id);
            if (!$object) {
                return response()->json(['message' => 'Record not found'], 404);
            }
            return response()->json($object);
        } else {
            // If no ID, get all records with the specified column
            $objects = $model->select('id', $whereColumn)->get();
            return response()->json($objects);
        }
    }
}
