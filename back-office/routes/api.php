<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LinkApiController;
use App\Http\Controllers\API\TextMessageController;
use App\Http\Controllers\API\UploadedImageController;

// User route (returns authenticated user)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Links routes
Route::get('/links', [LinkApiController::class, 'index']); // Fetch links
Route::middleware('auth:sanctum')->post('/links', [LinkApiController::class, 'store']); // Create link

// Texts routes
Route::get('/texts', [TextMessageController::class, 'index']); // Fetch texts
Route::post('/text', [TextMessageController::class, 'store']); // Create text

// Images routes
Route::get('/images', [UploadedImageController::class, 'index']); // Fetch images
Route::post('/upload-image', [UploadedImageController::class, 'store'])->name('upload.image'); // Upload image