<?php

use Illuminate\Support\Facades\Route;

use App\Models\Kendaraan;

use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfileController;
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

// Route Auth
Route::prefix('auth')->group(function () {
	// Route Authentication
	Route::post('/login', [AuthController::class, 'login']);
	Route::post('/register', [AuthController::class, 'register']);

	// Route Google
	Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
	Route::get('/reset', [AuthController::class, 'reset']);
	Route::get('/verify', [AuthController::class, 'verify']);
	Route::get('/google', [AuthController::class, 'google']);
	Route::get('/google/callback', [AuthController::class, 'google_callback']);
	Route::get('/logout', [AuthController::class, 'logout']);
});

// Route Kendaraan
Route::resource('kendaraan', KendaraanController::class)->middleware('otentikasi');
Route::get('kendaraan/{id}/show', [KendaraanController::class, 'show']);
Route::post('kendaraan/{id}/pesan_{invoice}', [KendaraanController::class, 'pesan'])->middleware('otentikasi');

// Route Pesanan
Route::prefix('pesanan')->group(function() {
	Route::get('/', [PesananController::class, 'index'])->middleware('otentikasi');
	Route::post('/', [PesananController::class, 'store'])->middleware('otentikasi');
	Route::get('/get-all', [PesananController::class, 'getall'])->middleware('otentikasi');
});

// Route Profile
Route::prefix('profile')->group(function () {
	Route::get('/', [ProfileController::class, 'index'])->middleware('otentikasi');
	Route::patch('/', [ProfileController::class, 'profileUpdate'])->middleware('otentikasi');
	Route::post('/telepon', [ProfileController::class, 'teleponUpdate'])->middleware('otentikasi');
});