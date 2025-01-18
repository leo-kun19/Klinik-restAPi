<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\ObatController;

Route::apiResource('dokter', DokterController::class);
Route::apiResource('pasien', PasienController::class);
Route::apiResource('jadwal', JadwalController::class);
Route::apiResource('rekam-medis', RekamMedisController::class);
Route::apiResource('obat', ObatController::class);
