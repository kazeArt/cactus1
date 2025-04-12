<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\LinkController;

Route::get('/', function () {
    return view('welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => false, // Registration disabled
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Login routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Authenticated dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Admin routes (only for is_admin = true)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Links Management (CRUD)
    Route::get('/links', [LinkController::class, 'index'])->name('admin.links.index');
    Route::post('/links', [LinkController::class, 'store'])->name('admin.links.store');
    Route::get('/links/{link}/edit', [LinkController::class, 'edit'])->name('admin.links.edit');
    Route::put('/links/{link}', [LinkController::class, 'update'])->name('admin.links.update');
    Route::delete('/links/{link}', [LinkController::class, 'destroy'])->name('admin.links.destroy');
    Route::get('/admin/links', [LinkController::class, 'index'])->name('admin.links');
});
use App\Http\Controllers\AdminTextMessageController;

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Text Management (CRUD)
    Route::get('/texts', [AdminTextMessageController::class, 'index'])->name('admin.texts.index');
    Route::post('/texts', [AdminTextMessageController::class, 'store'])->name('admin.texts.store');
    Route::get('/texts/{text}/edit', [AdminTextMessageController::class, 'edit'])->name('admin.texts.edit');
    Route::put('/texts/{text}', [AdminTextMessageController::class, 'update'])->name('admin.texts.update');
    Route::delete('/texts/{text}', [AdminTextMessageController::class, 'destroy'])->name('admin.texts.destroy');
});

