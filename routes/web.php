<?php

use App\Http\Controllers\JadwalController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jadwal', [JadwalController::class, 'index']);
Route::get('/jadwal/create', [JadwalController::class, 'add_view']);
Route::get('/jadwal/{id}', [JadwalController::class, 'update_view']);
Route::post('/jadwal', [JadwalController::class, 'add'])->name('jadwal.add');
Route::post('/jadwal/update', [JadwalController::class, 'edit']);
Route::get('/jadwal/delete/{id}', [JadwalController::class, 'destroy']);