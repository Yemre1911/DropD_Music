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
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

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

    public function tokenFunc(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if (auth()->attempt(['email' => $validated['email'], 'password' => $validated['password']]))
        {
            $user = User::where('email', $validated['email'])->first();

            if($user->is_admin == 1)
            {
            $token = $user->createToken('DropD')->plainTextToken;   // Token oluştur

            return response()->json(['token' => $token]);        // Token'ı döndür
            }
            else
            {
                return response()->json(['message:' => 'This User Is Not An Admin!']);
            }
        }

        // Kimlik doğrulama başarısızsa hata döndür
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function showTokens()
    {
        $tokens = PersonalAccessToken::all();
        return response()->json($tokens);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([

            'id' => 'required|numeric',
            'goal' => 'required|string'
        ]);
        $id = $validated['id'];
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $goal=$validated['goal'];

        switch ($goal) {
            case 'comments':
                return response()->json(['comments' => $user->comments]);
            case 'cart':
                $cart = $user->cart;
                $cartItems = $cart->items;
                return response()->json(['cart_items' => $cartItems]);

            case 'address':
                return response()->json(['address' => $user->address]);

            default:
                return response()->json(['message' => 'Invalid operation'], 400);
        }
        return response($goal);
    }
}
