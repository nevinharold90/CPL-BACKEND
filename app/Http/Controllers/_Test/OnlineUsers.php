<?php

namespace App\Http\Controllers\_Test;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;

class OnlineUsers extends Controller
{
    /**
     * Get the real-time count of active librarians.
     */
    public function checkStatus()
    {
        $users = Users::all();

        $data = $users->map(function ($user) {
            return [
                'id' => $user->id,
                'full_name' => $user->first_name . ' ' . $user->last_name,
                // THE LOGIC LIVES HERE:
                'current_status' => $user->isOnline() ? $user->status : 'offline',
            ];
        });

        return response()->json($data);
    }
}
