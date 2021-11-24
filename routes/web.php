<?php

use Illuminate\Support\Facades\Route;

use App\Models\Kendaraan;

use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PesananController;
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
	$kendaraan = Kendaraan::all();
	return view('template.first', compact('kendaraan'));
});

// Route Authentication
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);

// Route Google
Route::post('/auth/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/auth/telepon', [AuthController::class, 'telepon']);
Route::get('/auth/reset', [AuthController::class, 'reset']);
Route::get('/auth/verify', [AuthController::class, 'verify']);
Route::get('/auth/google', [AuthController::class, 'google']);
Route::get('/auth/google/callback', [AuthController::class, 'google_callback']);
Route::get('/auth/logout', [AuthController::class, 'logout']);

// Route Kendaraan
// Route::get('/kendaraan', [KendaraanController::class, ''])
Route::resource('kendaraan', KendaraanController::class)->middleware('otentikasi');
Route::get('kendaraan/{id}/show', [KendaraanController::class, 'show']);
Route::post('kendaraan/{id}/pesan_{invoice}', [KendaraanController::class, 'pesan'])->middleware('otentikasi');

// Route Pesanan
Route::prefix('pesanan')->group(function() {
	Route::get('/', [PesananController::class, 'index'])->middleware('otentikasi');
	Route::post('/', [PesananController::class, 'store'])->middleware('otentikasi');
	Route::get('/get-all', [PesananController::class, 'getall'])->middleware('otentikasi');
});