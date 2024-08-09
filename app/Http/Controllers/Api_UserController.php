<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Log;  // Log sınıfını import ettik




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

    public function tokenUpdate(Request $request, $id)
    {
        $validated = $request->validate([

            'abilities' => 'sometimes|array',
        ]);
        $user = User::find($id);
        if ($request->has('abilities'))
        {
            Log::info($user,$validated);
            $tokens = PersonalAccessToken::where('tokenable_id', $user->id)->get();

            foreach ($tokens as $token) {
                // Update token abilities
                $token->abilities = $request->input('abilities');
                $token->save();
            }
        }

        return $tokens;
    }

}
