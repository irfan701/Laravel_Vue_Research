<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/users/store',[\App\Http\Controllers\Api\UserController::class,'store']);
Route::get('/users/get',[\App\Http\Controllers\Api\UserController::class,'index']);
Route::get('/users/destroy/{id}',[\App\Http\Controllers\Api\UserController::class,'destroy']);
Route::get('/users/update/{id}',[\App\Http\Controllers\Api\UserController::class,'update']);
