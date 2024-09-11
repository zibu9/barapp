<?php

use Laravel\Fortify\Features;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CurrencyController;

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
    return redirect('home');
});

Route::middleware(['ensure.no.users'])->group(function () {
    Route::get('/register', function () {
        if (Features::enabled(Features::registration())) {
            return view('auth.register');
        }
        abort(404);
    })->name('register');
});



Route::get('/verification/notice', [AuthController::class, 'showVerificationNotice'])
    ->middleware(['auth'])
    ->name('verification.notice');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [AuthController::class, 'index'])->name('home');
});

Route::get('/products/{id}/prices', [ProductController::class, 'getPrices']);
