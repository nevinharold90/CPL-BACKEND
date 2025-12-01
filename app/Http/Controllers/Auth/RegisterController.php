<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validate input
        $request->validate([
            'employee_id_no' => 'required|unique:users,employee_id_no',
            'username'       => 'required|unique:users,username',
            'first_name'     => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'middle_name'    => 'nullable|string|max:255',
            'email'          => 'required|string|email|max:255|unique:users,email',
            'password'       => 'required|string|min:8|confirmed',
            'c_number'       => 'nullable|string|max:15',
        ]);

        // Create user
        $user = Users::create([
            'employee_id_no' => $request->employee_id_no,
            'username'       => $request->username,
            'first_name'     => $request->first_name,
            'last_name'      => $request->last_name,
            'middle_name'    => $request->middle_name ?? '',
            'email'          => $request->email,
            'password'       => Hash::make($request->password),
            'c_number'       => $request->c_number ?? '',
            'role'           => 'user',     // default role
            'status'         => 'offline',  // default status
        ]);

        return response()->json([
            'message' => 'User registered successfully',
            'user'    => $user,
        ], 201);
    }
}
