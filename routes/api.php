<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/regEmail', [AuthController::class, 'regEmail']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/getUser', [LoginController::class, 'getUser']);
    Route::post('/logout', [LoginController::class, 'logout']);
    // Add other authenticated routes here
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
