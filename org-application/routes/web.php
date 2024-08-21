<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAdminRole;
use App\Http\Middleware\CheckApplicantRole;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::middleware([CheckAdminRole::class])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/user-create', function () {
            return view('user-form-create');
        })->name('create-user');
    });

    Route::middleware([CheckApplicantRole::class])->group(function () {
        Route::get('/applicant-dashboard', function () {
            return view('Admin.dashboard');
        })->name('applicant-dashboard');
    });
});
