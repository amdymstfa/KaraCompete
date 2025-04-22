<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\API\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/registration', [RegisterController::class, 'registrationUser']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::apiResource('users', UserController::class)->except(['store']);