<?php

use App\Http\Controllers\DemographicController;
use App\Http\Controllers\ResidentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// 1. Root Redirect
Route::get('/', function () {
    return redirect()->route('login');
});

// 2. Authentication Routes (Login & Register)
Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');

Route::post('/login', function () {
    return redirect()->route('residents.index');
})->name('login.post');

Route::post('/register', function () {
    return redirect()->route('residents.index')->with('success', 'Welcome! Account created successfully.');
})->name('register.post');

// 3. Password Management (Forgot & Change)
Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');

Route::post('/forgot-password', function () {
    // Simulated action: I-re-redirect pabalik na may success message
    return back()->with('success', 'A password reset link has been sent to your email address.');
})->name('password.email');

Route::view('/auth/change-password', 'auth.change-password')->name('password.change');

// 4. Resources (Main App)
Route::resource('residents', ResidentController::class);
Route::resource('demographic', DemographicController::class);

// 5. Logout
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');