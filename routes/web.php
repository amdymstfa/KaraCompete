<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
 
// publics routes 
Route::get('/', function () {
    return view('pages.welcome');
});
Route::get('login', [LoginController::class, 'ShowLoginForm']);