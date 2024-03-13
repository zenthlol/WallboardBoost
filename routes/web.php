<?php

use App\Http\Controllers\WallboardController;
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

Route::get('/', [WallboardController::class, 'welcome'])->name('welcome');
Route::get('/agent-asuransi', [WallboardController::class, 'agentAsuransi'])->name('agentAsuransi');
