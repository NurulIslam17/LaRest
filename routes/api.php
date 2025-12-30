<?php

use App\Http\Controllers\Api\AdminAuthController;
use App\Http\Controllers\Api\UserAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post("/v1/user/register", [UserAuthController::class, 'register']);
Route::post("/v1/user/login", [UserAuthController::class, 'login']);

Route::post("/v1/admin/login", [AdminAuthController::class, 'login']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
