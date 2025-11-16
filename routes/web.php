<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SeeAllController;

Route::group(['middleware' => 'web'], function () {
    Route::get('/', function () {
        return view('welcome');
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
});
