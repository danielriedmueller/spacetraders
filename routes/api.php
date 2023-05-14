<?php

use App\Http\Controllers\ApiController;
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

Route::get('/agent', [ApiController::class, 'agent']);
Route::get('/faction/{symbol}', [ApiController::class, 'faction']);
Route::get('/waypoint/{symbol}', [ApiController::class, 'waypoint']);
Route::get('/system/{symbol}', [ApiController::class, 'system']);
Route::get('/my/ships/{symbol}', [ApiController::class, 'ship']);
Route::get('/my/contracts/{symbol}', [ApiController::class, 'contract']);
Route::post('/my/contracts/{symbol}/accept', [ApiController::class, 'acceptContract']);
Route::get('/systems/{systemSymbol}/waypoints/{waypointSymbol}/shipyard', [ApiController::class, 'shipyard']);
Route::get('/systems/{systemSymbol}/waypoints/{waypointSymbol}/market', [ApiController::class, 'market']);
