<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/images', [ImageController::class, 'index']);
    Route::post('/images', [ImageController::class, 'store']);
});

Route::post('/login', [AuthController::class, 'login']);


