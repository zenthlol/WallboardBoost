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

Route::get('/agent-cc', [WallboardController::class, 'agentCC'])->name('agentCC');

Route::get('/spv-asuransi', [WallboardController::class, 'spvAsuransi'])->name('spvAsuransi');

Route::get('/spv-cc', [WallboardController::class, 'spvCC'])->name('spvCC');

Route::get('/campaign-asuransi', [WallboardController::class, 'campaignAsuransi'])->name('campaignAsuransi');


Route::get('/campaign-cc', [WallboardController::class, 'campaignCC'])->name('campaignCC');
