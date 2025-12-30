<?php

use App\Http\Controllers\Api\AdminAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post("/v1/admin/register", [AdminAuthController::class, 'register']);
Route::post("/v1/admin/login", [AdminAuthController::class, 'login']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
