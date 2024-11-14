<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\PostController;
use App\Http\Controllers\Api\V1\CommentController;

Route::namespace('App\Http\Controllers\Api\V1')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('token');
    Route::apiResource('posts', PostController::class)->middleware('token');
    Route::post('posts/{id}/comments', [CommentController::class, 'store'])->middleware('token');
});
