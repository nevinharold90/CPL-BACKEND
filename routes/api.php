<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\_Test\OnlineUsers;

    // User Route
        Route::post('user/register', [RegisterController::class, 'register']);
        Route::post('user/login', [LoginController::class, 'login']);
        Route::post('user/logout', [LogoutController::class, 'logout'])->middleware('auth:api');
        Route::get('user/index', [UserController::class, 'index']);
    // User Route


    // API Checker
        Route::get('test', function () {
            return ['message' => 'API routes working'];
        });

        Route::get('/online-check', [OnlineUsers::class, 'checkStatus']);
    // API Checker
