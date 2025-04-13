<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\AdminTextMessageController;

// Homepage route (not admin related)
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

// Authenticated dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Admin routes (only for is_admin = true)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/auth-check', function () {
        return auth()->check()?'logged in as'. auth()->user()->email:'not logged in';
    });
    // Links Management (Edit only)
    Route::get('/links', [LinkController::class, 'index'])->name('admin.links.index');
    Route::get('/links/{link}/edit', [LinkController::class, 'edit'])->name('admin.links.edit');
    Route::put('/links/{link}', [LinkController::class, 'update'])->name('admin.links.update');
    
    // Text Management (Edit only)
    Route::get('/texts', [AdminTextMessageController::class, 'index'])->name('admin.texts.index');
    Route::get('/texts/{text}/edit', [AdminTextMessageController::class, 'edit'])->name('admin.texts.edit');
    Route::put('/texts/{text}', [AdminTextMessageController::class, 'update'])->name('admin.texts.update');
});
