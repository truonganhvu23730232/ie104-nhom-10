<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\QltvController;
use Illuminate\Support\Facades\Route;

// qltv
Route::get('/qltv', function () {
    return redirect()->route('qltv.auth.signin');
});

Route::middleware('guest')->group(function () {
    Route::get('/qltv/auth/sign-in', [AuthController::class, 'validateAdminSignin'])->name('qltv.auth.signin');
    Route::post('/qltv/auth/sign-in', [AuthController::class, 'adminSignin']);
});

Route::middleware('auth')->group(function () {
    Route::get('/qltv/main', [QltvController::class, 'index'])->name('qltv.main');
    Route::post('/qltv/auth/sign-out', [AuthController::class, 'adminSignout'])->name('qltv.auth.signout');
});

// tvcc
Route::get('auth/sign-in', function () {
    return view('auth.signin');
})->name('auth.signin');

Route::get('auth/sign-up', function () {
    return view('auth.signup');
})->name('auth.signup');

Route::get('/', function () {
    return view('home');
});
