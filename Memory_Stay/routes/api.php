<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MarkerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);
Route::post('/auth/delete', [AuthController::class, 'deleteUser']);
Route::post('/markers/create', [MarkerController::class, 'createMarker']);
Route::post('/markers/delete', [MarkerController::class, 'deleteMarker']);
Route::post('/markers/select', [MarkerController::class, 'selectMarker']);
Route::get('/markers/get', [MarkerController::class, 'getMarkers']);
