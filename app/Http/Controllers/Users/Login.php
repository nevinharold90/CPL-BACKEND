<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Users;
use App\Http\Resources\UserResource;

class Login extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Start - Find the user by username
            $user = Users::where('username', $validated['username'])->first();
        // End - Find the user by username

        // Start - Check if the user exists and if the password is correct
            if (!$user || !Hash::check($validated['password'], $user->password)) {
                return response()->json([
                    'message' => 'Invalid credentials. Please check your username or password.'
                ], 401); // 401 means "Unauthorized"
            }
        // End - Check if the user exists and if the password is correct

        // start - Record their "Pulse" manually for the first time for
            \Illuminate\Support\Facades\Cache::put('user-is-online-' . $user->id, true, now()->addMinutes(5));
        // end - Record their "Pulse" manually for the first time

        // Start - Create a token for the user and return it along with the user data
            $token = $user->createToken('auth_token')->plainTextToken;
        // End - Create a token for the user and return it along with the user data

        // Start - Create a token for the user and return it along with the user data
            return response()->json([
                'user' => new UserResource($user),
                'token' => $token,
                'message' => 'Welcome back, ' . $user->first_name
            ]);
        // End - Create a token for the user and return it along with the user data
    }
}
