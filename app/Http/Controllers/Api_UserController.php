<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class Api_UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function findOne(User $id)
    {
        return $id;
    }

    public function destroy(User $id)
    {
        $id->delete();
        return response()->json(null, 204);
    }

}
