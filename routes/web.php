<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('/profil', [DashboardController::class, 'profile'])->name('profil');
Route::get('/show/{slug}', [DashboardController::class, 'show'])->name('article.show');
Route::get('/info/{category}', [DashboardController::class, 'info'])->name('info.category');
