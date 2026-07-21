<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\_Test\OnlineUsers;
use App\Http\Controllers\Books\BooksController;
use App\Http\Controllers\Books\AuthorController;
use App\Http\Controllers\Books\DeweyDecimalController;
// use App\Http\Controllers\Books\AuthorController;


    // User Route
        Route::post('user/admin/register', [RegisterController::class, 'createAdmin']);
        Route::get('user/admin/index', [RegisterController::class, 'indexAdmin']);

        Route::post('user/login', [LoginController::class, 'login']);
        Route::middleware('auth:sanctum')->group(function () {
            Route::post('user/logout', [LogoutController::class, 'logout']);
        });
    // User Route

    // Books Route
        Route::middleware(['auth:sanctum'])->group(function () {
            Route::post('/book/register', [BooksController::class, 'registerBook']);
        });
        Route::get('/book/index', [BooksController::class, 'bookIndex']); // <- Show all books and its copy(ies)

        Route::post('book/callnumber/register', [DeweyDecimalController::class, 'callnumberRegister']);
        Route::post('book/author/register', [AuthorController::class, 'authorRegister']);
    // Books Route

    // API Checker
        Route::get('test', function () {
            return ['message' => 'API routes working'];
        });

        Route::get('/online-check', [OnlineUsers::class, 'checkStatus']);
    // API Checker
