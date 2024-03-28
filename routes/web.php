<?php

use App\Http\Controllers\DashboardController;
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

// WALLBOARD
Route::get('/agent-asuransi', [WallboardController::class, 'agentAsuransi'])->name('agentAsuransi');

Route::get('/agent-cc', [WallboardController::class, 'agentCC'])->name('agentCC');

Route::get('/spv-asuransi', [WallboardController::class, 'spvAsuransi'])->name('spvAsuransi');

Route::get('/spv-cc', [WallboardController::class, 'spvCC'])->name('spvCC');

Route::get('/campaign-asuransi', [WallboardController::class, 'campaignAsuransi'])->name('campaignAsuransi');

Route::get('/campaign-cc', [WallboardController::class, 'campaignCC'])->name('campaignCC');


// DASHBOARD
Route::get('/sys-admin-asuransi', [DashboardController::class, 'sysAdminAsuransi'])->name('sysAdminAsuransi');
Route::post('/sys-admin-asuransi', [DashboardController::class, 'sysAdminAsuransi'])->name('sysAdminAsuransi');

Route::get('/sys-admin-cc', [DashboardController::class, 'sysAdminCC'])->name('sysAdminCC');
Route::get('/dashboard-spv-asuransi', [DashboardController::class, 'dashSpvAsuransi'])->name('dashSpvAsuransi');
Route::get('/dashboard-spv-cc', [DashboardController::class, 'dashSpvCC'])->name('dashSpvCC');
Route::get('/manager=asuransi', [DashboardController::class, 'managerAsuransi'])->name('managerAsuransi');
Route::get('/manager-cc', [DashboardController::class, 'managerCC'])->name('managerCC');
