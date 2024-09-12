<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
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
Route::get('/users', [AdminController::class, 'users'])->name('users.index');
Route::get('/create-user', [AdminController::class, 'createUser'])->name('user.create');
Route::post('/users/store', [AdminController::class, 'storeUser'])->name('user.store');
Route::resource('currencies', CurrencyController::class)->only('index', 'edit', 'store');
Route::resource('products', ProductController::class);

// Bloquer un utilisateur
Route::post('/users/{id}/block', [AdminController::class, 'blockUser'])->name('blockUser');

// Editer un utilisateur
Route::get('/users/{id}/edit', [AdminController::class, 'editUser'])->name('editUser');
Route::post('/users/{id}/update', [AdminController::class, 'updateUser'])->name('updateUser');

// Réinitialiser le mot de passe
Route::post('/users/{id}/reset-password', [AdminController::class, 'resetPassword'])->name('resetPassword');


