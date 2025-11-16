<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SeeAllController;
use App\Http\Controllers\WelcomeSettingController;
use App\Models\WelcomeSetting;

Route::group(['middleware' => 'web'], function () {
    Route::get('/', function () {
        $settings = WelcomeSetting::first();
        return view('welcome', compact('settings'));
    });

    Route::get('/see-all', [SeeAllController::class, 'index']);

    Route::get('/login', [LoginController::class, 'showLoginForm']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/logout', [LoginController::class, 'logout']);

    Route::get('/admin', function () {
        return view('admin');
    });

    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Admin see-all page
    Route::get('/admin/see-all', [SeeAllController::class, 'admin']);

    // Logo CRUD routes
    Route::post('/logos', [SeeAllController::class, 'store']);
    Route::put('/logos/{id}', [SeeAllController::class, 'update']);
    Route::delete('/logos/{id}', [SeeAllController::class, 'destroy']);

    // Welcome settings routes
    Route::get('/dashboard/welcome', [WelcomeSettingController::class, 'index']);
    Route::post('/dashboard/welcome/update', [WelcomeSettingController::class, 'update']);
});
