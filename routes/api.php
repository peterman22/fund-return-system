<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FundController;

Route::post('/funds', [FundController::class, 'store']);
Route::post('/funds/{fund}/returns', [FundController::class, 'addReturn']);
Route::delete('/returns/{return}', [FundController::class, 'revertReturn']);
Route::get('/funds/{fund}/value', [FundController::class, 'getValueAt']);