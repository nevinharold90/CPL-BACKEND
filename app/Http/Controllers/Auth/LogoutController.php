<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache; // <--- Don't forget this!

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            // 1. Manually kill the "Online" status in the Cache
            Cache::forget('user-is-online-' . $user->id);

            // 2. Delete the Sanctum token
            $request->user()->currentAccessToken()->delete();

            return response()->json([
                'success' => true,
                'message' => 'Logged out successfully.'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Unable to logout.'
            ], 401);
        }
    }
}
