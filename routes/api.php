<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

Route::post('register', [RegisterController::class, 'register']);

Route::get('test', function () {
    return ['message' => 'API routes working'];
});
