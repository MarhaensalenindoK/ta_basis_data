<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DvdController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TemanController;
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

Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/report', [ReportController::class, 'index']);

Route::get('/user', [TemanController::class, 'index']);
Route::get('/user/create', [TemanController::class, 'create']);
Route::post('/user', [TemanController::class, 'store']);
Route::delete('/user/{id}', [TemanController::class, 'destroy']);
Route::get('/user/{id}/edit', [TemanController::class, 'edit']);
Route::put('/user/{id}', [TemanController::class, 'update']);

Route::get('/transaction', [PeminjamanController::class, 'index']);
Route::get('/transaction/create', [PeminjamanController::class, 'create']);
Route::post('/transaction', [PeminjamanController::class, 'store']);
Route::get('/transaction/{id}/edit', [PeminjamanController::class, 'edit']);
Route::put('/transaction/{id}', [PeminjamanController::class, 'update']);
Route::delete('/transaction/{id}', [PeminjamanController::class, 'destroy']);

Route::get('/product', [DvdController::class, 'index']);
Route::get('/product/create', [DvdController::class, 'create']);
Route::post('/product', [DvdController::class, 'store']);
Route::get('/product/{id}/edit', [DvdController::class, 'edit']);
Route::put('/product/{id}', [DvdController::class, 'update']);
Route::delete('/product/{id}', [DvdController::class, 'destroy']);
