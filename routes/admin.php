<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\CurrencyController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin auth verified web" middleware group. Make something great!
|
*/

Route::get('/', [AdminController::class, 'index'])->name('index');
Route::resource('currencies', CurrencyController::class)->only('index', 'edit', 'store');

