<?php

// routes/web.php

use App\Http\Controllers\AdminImageController;
use App\Http\Controllers\AdminTextMessageController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

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
    
    Route::get('/panel', function () {
        return view('admin.panel');
    })->name('admin.panel');
    // Links Management (Edit only)
    Route::get('/links', [LinkController::class, 'index'])->name('admin.links.index');
    Route::get('/links/{link}/edit', [LinkController::class, 'edit'])->name('admin.links.edit');
    Route::put('/links/{link}', [LinkController::class, 'update'])->name('admin.links.update');
    
    // Text Management (Edit only)
    Route::get('/texts/create', [AdminTextMessageController::class, 'create'])->name('admin.texts.create');
    Route::get('/texts', [AdminTextMessageController::class, 'index'])->name('admin.texts.index');
    Route::get('/texts/{text}/edit', [AdminTextMessageController::class, 'edit'])->name('admin.texts.edit');
    Route::put('/texts/{text}', [AdminTextMessageController::class, 'update'])->name('admin.texts.update');
    Route::post('/admin/texts', [AdminTextMessageController::class, 'store'])->name('admin.texts.store');

    // Image Management
    Route::get('/images', [AdminImageController::class, 'index'])->name('admin.images.index');
    Route::get('/images/{image}/edit', [AdminImageController::class, 'edit'])->name('admin.images.edit');
    Route::put('/images/{image}', [AdminImageController::class, 'update'])->name('admin.images.update');

});
