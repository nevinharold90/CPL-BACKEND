<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;

class UserController extends Controller
{

    public function index(){
        $users = Users::all();

        return response()->json($users);
    }
}
