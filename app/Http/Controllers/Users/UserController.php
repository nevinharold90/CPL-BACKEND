<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Http\Resources\UserResource;

class UserController extends Controller
{

public function index()
    {
        $users = Users::all();
        // Wrap your users in the Resource so the is_online check runs
        return UserResource::collection($users);
    }

}
