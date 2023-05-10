<?php

use App\Http\Controllers\FactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', fn() => view('cockpit'));

Route::get('/factions', [FactionController::class, 'index']);

Route::get('/waypoint/{symbol}', fn(string $symbol) => view('waypoint.show', ['symbol' => $symbol]));
