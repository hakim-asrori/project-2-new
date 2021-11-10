<?php

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
	return view('layout.template');
});

// Route Authentication
Route::post('/auth/register', [App\Http\Controllers\AuthController::class, 'register']);

Route::get('/auth/verify', [App\Http\Controllers\AuthController::class, 'verify']);
Route::get('/auth/google', [App\Http\Controllers\AuthController::class, 'google']);
Route::get('/auth/google/callback', [App\Http\Controllers\AuthController::class, 'google_callback']);
Route::get('/auth/logout', [App\Http\Controllers\AuthController::class, 'logout']);