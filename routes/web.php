<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/area/{slug}', [AreaController::class, 'show'])->name('area.show');
Route::get('/rekomendasi', [RecommendationController::class, 'index'])->name('rekomendasi');
Route::get('/peta', [MapController::class, 'index'])->name('peta');
Route::post('/area/{slug}/komentar', [CommentController::class, 'store'])->name('comment.store');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
