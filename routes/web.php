<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\AdminDocumentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminProfileController;

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

// Authentication Routes (Publik & Admin)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Operator Routes (Customer Service Live Chat)
Route::prefix('operator')->name('operator.')->middleware(['auth', 'role:operator'])->group(function () {
    Route::get('/livechat', [\App\Http\Controllers\AdminLiveChatController::class, 'index'])->name('livechat.index');
    Route::get('/livechat/{session}', [\App\Http\Controllers\AdminLiveChatController::class, 'show'])->name('livechat.show');
    Route::post('/livechat/{session}/reply', [\App\Http\Controllers\AdminLiveChatController::class, 'reply'])->name('livechat.reply');
    Route::post('/livechat/{session}/close', [\App\Http\Controllers\AdminLiveChatController::class, 'close'])->name('livechat.close');
    Route::get('/livechat/{session}/poll', [\App\Http\Controllers\AdminLiveChatController::class, 'fetchMessages'])->name('livechat.poll');
});

// Admin Routes (Admin PPID)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Profile & Security
    Route::get('/profile', [AdminProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/session-info', [AdminProfileController::class, 'sessionInfo'])->name('profile.session');
    Route::put('/profile/password', [AdminProfileController::class, 'updatePassword'])->name('profile.password');

    // Content Management
    Route::resource('news', AdminNewsController::class);
    Route::resource('documents', AdminDocumentController::class);
    Route::resource('dip', \App\Http\Controllers\AdminPublicInformationController::class);
    Route::resource('faqs', \App\Http\Controllers\AdminFaqController::class);

    // Managerial & Settings
    Route::resource('chatbot_knowledge', \App\Http\Controllers\AdminChatbotKnowledgeController::class)->except(['show']);

    Route::get('/settings', [AdminController::class, 'settings'])->name('settings.index');
    Route::put('/settings/general', [AdminController::class, 'updateGeneralSettings'])->name('settings.general');
    Route::get('/reviews', [\App\Http\Controllers\AdminController::class, 'reviews'])->name('reviews.index');
    Route::put('/reviews/{review}/approve', [\App\Http\Controllers\AdminController::class, 'approveReview'])->name('reviews.approve');
    Route::delete('/reviews/{review}', [\App\Http\Controllers\AdminController::class, 'deleteReview'])->name('reviews.destroy');
    Route::resource('requests', \App\Http\Controllers\AdminRequestController::class)->only(['index', 'show', 'update']);
});

// Chatbot Route
Route::post('/chatbot/chat', [\App\Http\Controllers\ChatbotController::class, 'chat'])->name('chatbot.chat');
Route::get('/chatbot/poll', [\App\Http\Controllers\ChatbotController::class, 'poll'])->name('chatbot.poll');
