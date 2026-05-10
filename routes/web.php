<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\AdminDocumentController;
use App\Http\Controllers\AuthController;

// Public Routes
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/profil-ppid', [PublicController::class, 'profil'])->name('profil.index');
Route::get('/prosedur-layanan', [PublicController::class, 'prosedur'])->name('prosedur.index');
Route::get('/ppid-info', [PublicController::class, 'ppidInfo'])->name('documents.index');
Route::get('/news', [PublicController::class, 'indexNews'])->name('news.index');
Route::get('/news/{slug}', [PublicController::class, 'newsDetail'])->name('news.show');

Route::get('/kontak', [PublicController::class, 'kontak'])->name('kontak.index');
Route::get('/faq', [PublicController::class, 'faq'])->name('faq.index');
Route::get('/statistik', [PublicController::class, 'statistik'])->name('statistik.index');
Route::get('/search', [PublicController::class, 'search'])->name('search');
Route::get('/daftar-informasi-publik', [PublicController::class, 'dip'])->name('dip.index');
Route::get('/ulasan', [PublicController::class, 'reviews'])->name('reviews.index');
Route::post('/ulasan', [PublicController::class, 'submitReview'])->name('reviews.store');

Route::get('/permohonan-informasi', [PublicController::class, 'requestForm'])->name('requests.create');
Route::post('/permohonan-informasi', [PublicController::class, 'submitRequest'])->name('requests.store');
Route::get('/permohonan-informasi/success/{id}', [PublicController::class, 'success'])->name('requests.success');
Route::get('/permohonan-informasi/receipt/{id}', [PublicController::class, 'receipt'])->name('requests.receipt');
Route::get('/cek-status', [PublicController::class, 'trackRequest'])->name('requests.track');

// Authentication Routes
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Settings Management
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings.index');
    Route::put('/settings/password', [AdminController::class, 'updatePassword'])->name('settings.password');
    Route::put('/settings/general', [AdminController::class, 'updateGeneralSettings'])->name('settings.general');
    
    // Admin DIP
    Route::resource('dip', \App\Http\Controllers\AdminPublicInformationController::class);
    
    // Admin Reviews
    Route::get('/reviews', [\App\Http\Controllers\AdminController::class, 'reviews'])->name('reviews.index');
    Route::put('/reviews/{review}/approve', [\App\Http\Controllers\AdminController::class, 'approveReview'])->name('reviews.approve');
    Route::delete('/reviews/{review}', [\App\Http\Controllers\AdminController::class, 'deleteReview'])->name('reviews.destroy');
    
    // Admin FAQ
    Route::resource('faqs', \App\Http\Controllers\AdminFaqController::class);

    // Admin News
    Route::resource('news', AdminNewsController::class);
    
    // Admin Documents
    Route::resource('documents', AdminDocumentController::class);
    
    // Admin Requests
    Route::resource('requests', \App\Http\Controllers\AdminRequestController::class)->only(['index', 'show', 'update']);
});
