<?php

use App\Http\Controllers\DemographicController;
use App\Http\Controllers\ResidentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// UI-only demo routes
Route::view('/login', 'auth.login')->name('login');
Route::resource('residents', ResidentController::class);
Route::resource('demographic', DemographicController::class);
Route::post('/login', function () {
    // Placeholder for Fortify or custom login action
    return redirect('/admin/dashboard');
})->name('login.post');
Route::view('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');
Route::view('/auth/change-password', 'auth.change-password')->name('password.change');
