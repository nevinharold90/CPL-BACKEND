<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LogoutController extends Controller
{
    public function logout(Request $request)
        {
            $user = $request->user();

            if ($user) {
                // 1. Update status to offline
                $user->status = 'offline';
                $user->save();

                // 2. Forget online status in Cache
                Cache::forget('user-is-online-' . $user->id);

                // 3. Delete the current active Sanctum token
                $user->currentAccessToken()->delete();

                return response()->json([
                    'success' => true,
                    'message' => 'Logged out successfully.'
                ], 200);
            }

            return response()->json([
                'success' => false,
                'message' => 'Unable to logout.'
            ], 401);
        }
}
