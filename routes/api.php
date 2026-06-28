<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NewsApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Resource API for PPID Kemenag Sumenep.
| Base URL: /api
|
*/

// Public API Resources
Route::prefix('v1')->group(function () {
    // News Resource API
    Route::get('/news', [NewsApiController::class, 'index']);
    Route::get('/news/{id}', [NewsApiController::class, 'show']);
});

Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::post('/v1/news', [NewsApiController::class, 'store']);
    Route::put('/v1/news/{id}', [NewsApiController::class, 'update']);
    Route::delete('/v1/news/{id}', [NewsApiController::class, 'destroy']);
});
