<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Api\AdminAuthController;
use App\Http\Controllers\Api\UserAuthController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;



Route::post("/v1/user/register", [UserAuthController::class, 'register']);
Route::post("/v1/user/login", [UserAuthController::class, 'login']);

Route::middleware('auth:sanctum')->prefix("/v1/user")->group(function () {

    Route::get("/profile", [UserDashboardController::class, 'profile']);
});


// Admin Routes
Route::post("/v1/admin/login", [AdminAuthController::class, 'login']);
Route::middleware(['auth:admin', 'admin.only'])->prefix("/v1/admin")->group(function () {

    Route::get("/dashboard", [AdminDashboardController::class, 'dashboard']);
});
