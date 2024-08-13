<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// you can middleware this way 
// Route::get('/admin', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum', AdminMiddleware::class);

Route::middleware(['auth:sanctum', AdminMiddleware::class])->group(function () {
    Route::get('/admin', function (Request $request) {
        return $request->user();
    });
});

Route::post('/login',[AuthController::class,'login'])->name('login');   