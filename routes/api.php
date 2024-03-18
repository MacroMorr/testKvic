<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/tasks', [\App\Http\Controllers\Api\TaskController::class, 'index']);
Route::post('/tasks', [\App\Http\Controllers\Api\TaskController::class, 'create']);
Route::put('/tasks/{id}', [\App\Http\Controllers\Api\TaskController::class, 'store']);
Route::delete('/tasks/{id}', [\App\Http\Controllers\Api\TaskController::class, 'delete']);
