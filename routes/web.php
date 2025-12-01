<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

// Route::post('/register', [RegisterController::class, 'register']);

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/test', function () {
//     return ['message' => 'API routes working. Im from web.php'];
// });
