<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LinkApiController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user(); // Returns the authenticated user
});

// This route is open to everyone (no authentication required)
Route::get('/links', [LinkApiController::class, 'index']);

// You can add other routes here as needed, such as creating or updating links, and they can be protected
// For example, protecting the route to store a new link
Route::middleware('auth:sanctum')->post('/links', [LinkApiController::class, 'store']);
