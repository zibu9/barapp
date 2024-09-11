<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\TransactionController;

Route::get('/', [ManagerController::class, 'index'])->name('index');
Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
