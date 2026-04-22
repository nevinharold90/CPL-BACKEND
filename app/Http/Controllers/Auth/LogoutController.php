<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    // LOGOUT
        /**
         * Handle user logout and revoke token.
        *
        * @param  \Illuminate\Http\Request  $request
        * @return \Illuminate\Http\JsonResponse
        */
        public function logout(Request $request)
        {
            if(Auth::user())
                {
                    $request->user()->token()->revoke();

                    return response()->json(['success' => true,'message'=> 'Logged out successfully.'], 200);
            } else {
                    return response()->json(['success' => false,'message'=> 'Unable to logout.'], 401);
            }
        }
    // LOGOUT
}
