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
        $user = User::find($id);

        return $user;
    }

    public function destroy(User $id)
    {

        $id->delete();
        return response()->json(null, 204);
    }

    public function update(Request $request, User $id)
    {

        $validated = $request->validate([

            'first_name' => 'sometimes|string|max:50',
            'last_name' => 'sometimes|string|max:50',
            'is_admin' => 'sometimes|boolean',
        ]);

        $id->update($validated);
        return $id;
    }

}
