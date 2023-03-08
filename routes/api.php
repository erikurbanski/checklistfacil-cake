<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CakeController;
use App\Http\Controllers\ClientController;



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

Route::apiResource('/cakes', CakeController::class);
Route::get('/cake/{id}', [CakeController::class, 'show']);
Route::delete('/cake/{id}', [CakeController::class, 'destroy']);
Route::put('/cake/{id}', [CakeController::class, 'update']);

Route::apiResource('/clients', ClientController::class);
Route::get('/client/{id}', [ClientController::class, 'show']);
Route::delete('/client/{id}', [ClientController::class, 'destroy']);
Route::put('/client/{id}', [ClientController::class, 'update']);
