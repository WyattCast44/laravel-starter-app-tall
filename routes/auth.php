<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Controllers\Auth\LogoutController;

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
    Route::get('/forgot-password', ForgotPassword::class)->name('password.email');
    Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');
});

Route::post('/logout', LogoutController::class)->name('logout');
