<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\stock;

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

/*
|-----------------------------------------------------------------------------
| Base Dashboard
|-----------------------------------------------------------------------------
| Base dashboard (used for only stock viwers. viewrs can't add stock from
| base Dashboard). No need to auth.
*/
Route::get('/', [stock::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::post('/stock-manage', [stock::class, 'add_portfolio'])->name('stock.manage.store');

Route::get('/stock-list', [stock::class, 'listStock'])
    ->middleware(['auth', 'verified'])
    ->name('listStock');

// deleted stock
Route::delete('/stock/{id}', [stock::class, 'deleteStock'])
    ->middleware(['auth', 'verified'])
    ->name('deleteStock');

Route::get('/stock/{id}', [stock::class, 'updateStock'])
    ->middleware(['auth', 'verified'])
    ->name('updateStock');
    
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    // update stock
    Route::put('/stock/{id}', [stock::class, 'submitStockUpdate'])
    ->middleware(['auth', 'verified'])
    ->name('submit_stock_update');
    
require __DIR__.'/auth.php';
