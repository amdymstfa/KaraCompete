<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

 
// publics routes 
Route::get('/', function () {
    return view('pages.welcome');
});
Route::get('login', [LoginController::class, 'ShowLoginForm']);
Route::get('register', [RegisterController::class, 'ShowRegisterForm']);
