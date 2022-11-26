<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MarkerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum;

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

//Route::middleware('auth:sanctum')->getmiddleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('/auth/token', [AuthController::class, 'getToken']);
Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);
Route::post('/auth/delete', [AuthController::class, 'deleteUser']);
Route::middleware('auth:sanctum')->post('/markers/create', [MarkerController::class, 'createMarker']);
Route::middleware('auth:sanctum')->post('/markers/delete', [MarkerController::class, 'deleteMarker']);
Route::middleware('auth:sanctum')->post('/markers/select', [MarkerController::class, 'selectMarker']);
Route::middleware('auth:sanctum')->post('/auth/getuser', [AuthController::class, 'getUser']);
Route::get('/markers/get', [MarkerController::class, 'getMarkers']);
