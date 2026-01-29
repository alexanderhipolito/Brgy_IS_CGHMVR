<?php

use App\Http\Controllers\DemographicController;
use App\Http\Controllers\ResidentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::view('/login', 'auth.login')->name('login');

Route::resource('residents', ResidentController::class);
Route::resource('demographic', DemographicController::class);

Route::post('/login', function () {
    return redirect()->route('residents.index');
})->name('login.post');

Route::view('/auth/change-password', 'auth.change-password')->name('password.change');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');