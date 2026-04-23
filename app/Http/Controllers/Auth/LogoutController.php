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
        /** @var \App\Models\Users $user **/
        $user = Auth::user();

        if ($user) {
            // 1. Manually kill the "Online" status in the Cache
            $user->status = 'offline';
            $user->save();
            // $user->refresh();

            \Illuminate\Support\Facades\Cache::forget('user-is-online-' . $user->id);

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
