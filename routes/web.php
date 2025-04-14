<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RefereeController;
use App\Http\Controllers\AthleteController;



 
// publics routes 
Route::get('/', function () {
    return view('welcome');
});
Route::get('login', [LoginController::class, 'ShowLoginForm'])->name('login');
Route::get('register', [RegisterController::class, 'ShowRegisterForm'])->name('register');


// Route pour l'admin
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin');

// Route pour l'arbitre
Route::get('/referee', function () {
    return view('referee.dashboard');
})->name('referee');

// Route pour l'athlète
Route::get('/athlete', function () {
    return view('athlete.dashboard');
})->name('athlete');
