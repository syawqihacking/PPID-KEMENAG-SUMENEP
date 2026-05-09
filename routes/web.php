<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\AdminDocumentController;
use App\Http\Controllers\AuthController;

// Public Routes
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/news/{slug}', [PublicController::class, 'newsDetail'])->name('news.show');
Route::get('/ppid-info', [PublicController::class, 'ppidInfo'])->name('ppid.info');

// Authentication Routes
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Admin News
    Route::resource('news', AdminNewsController::class);
    
    // Admin Documents
    Route::resource('documents', AdminDocumentController::class);
});
