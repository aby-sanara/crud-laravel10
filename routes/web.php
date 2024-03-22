<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WargaController;

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

Route::get('/', [AuthController::class, 'index'])->middleware('blmLogin');

Route::get('/auth/register', [AuthController::class, 'registrasi'])->middleware('blmLogin');

Route::post('/auth/create', [AuthController::class, 'create']);

Route::post('/auth/login', [AuthController::class, 'login']);

Route::get('/auth/logout', [AuthController::class, 'logout']);

Route::resource('warga', WargaController::class)->middleware('sdhLogin');
