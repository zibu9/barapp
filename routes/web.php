<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::post('/register', [AuthController::class, 'register'])->name('register');


Route::get('/verification/notice', [AuthController::class, 'showVerificationNotice'])
    ->middleware(['auth'])
    ->name('verification.notice');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [AuthController::class, 'index'])->name('home');
});
