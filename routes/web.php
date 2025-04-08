<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


 
// publics routes 
Route::get('/', function () {
    return view('pages.welcome');
});
Route::get('login', [LoginController::class, 'ShowLoginForm'])->name('login');
Route::get('register', [RegisterController::class, 'ShowRegisterForm'])->name('register');
Route::get('/athlete/dashboard', [LoginController::class, 'index'])->name('pages.athlete.dashboard');
Route::get('/admin/dashboard', [LoginController::class, 'index'])->name('pages.admin.dashboard');
Route::get('/referee/dashboard', [LoginController::class, 'index'])->name('pages.referee.dashboard');



