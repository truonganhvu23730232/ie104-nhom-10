<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QlsachController;
use App\Http\Controllers\QltacGiaController;
use App\Http\Controllers\QlthuVienController;
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
    Route::get('/qltv/main', [DashboardController::class, 'index'])->name('qltv.main');

    Route::get('/qltv/quan-ly-tac-gia', [QltacGiaController::class, 'index'])->name('qltv.qltg');
    Route::get('/qltv/quan-ly-tac-sach', [QlsachController::class, 'index'])->name('qltv.qls');
    Route::get('/qltv/quan-ly-thu-vien', [QlthuVienController::class, 'index'])->name('qltv.qltvcc');

    Route::post('/qltv/auth/sign-out', [AuthController::class, 'adminSignout'])->name('qltv.auth.signout');
});

// tv
Route::get('auth/sign-in', function () {
    return view('auth.signin');
})->name('auth.signin');

Route::get('auth/sign-up', function () {
    return view('auth.signup');
})->name('auth.signup');

Route::get('/', function () {
    return view('home');
});
