<?php

use App\Http\Controllers\DvdController;
use App\Http\Controllers\PeminjamanController;
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
    return view('welcome');
});

Route::get('/teman', [TemanController::class, 'index']);
Route::get('/teman/create', [TemanController::class, 'create']);
Route::post('/teman', [TemanController::class, 'store']);
Route::delete('/teman/{id}', [TemanController::class, 'destroy']);
Route::get('/teman/{id}/edit', [TemanController::class, 'edit']);
Route::put('/teman/{id}', [TemanController::class, 'update']);

Route::get('/peminjaman', [PeminjamanController::class, 'index']);
Route::get('/peminjaman/create', [PeminjamanController::class, 'create']);
Route::post('/peminjaman', [PeminjamanController::class, 'store']);
Route::get('/peminjaman/{id}/edit', [PeminjamanController::class, 'edit']);
Route::put('/peminjaman/{id}', [PeminjamanController::class, 'update']);
Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'destroy']);

Route::get('/dvd', [DvdController::class, 'index']);
Route::get('/dvd/create', [DvdController::class, 'create']);
Route::post('/dvd', [DvdController::class, 'store']);
Route::get('/dvd/{id}/edit', [DvdController::class, 'edit']);
Route::put('/dvd/{id}', [DvdController::class, 'update']);
Route::delete('/dvd/{id}', [DvdController::class, 'destroy']);