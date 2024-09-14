<?php

use App\Http\Controllers\Api as Api;
use App\Http\Controllers\Auth as Auth;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::post('register', [Auth\RegisterController::class, 'store']);
Route::post('login', [Auth\LoginController::class, 'store']);

/** Common */
Route::get('plans', [Api\Common\PlanController::class, 'index']);
Route::get('posts', [Api\Common\PostController::class, 'index']);

/** User Posts */
Route::patch('user/posts/{post}/activate', [Api\User\PostController::class, 'activate'])->middleware('auth:sanctum');
Route::apiResource('user/posts', Api\User\PostController::class)->middleware('auth:sanctum');

/** User Plans */
Route::get('user/plans', [Api\User\PlanController::class, 'index'])->middleware('auth:sanctum');
Route::post('user/plans/{plan}', [Api\User\PlanUserController::class, 'store'])->middleware('auth:sanctum');



/** Admin Plans */
Route::apiResource('admin/plans', Api\Admin\PlanController::class)
    ->middleware(['auth:sanctum', AdminMiddleware::class]);
