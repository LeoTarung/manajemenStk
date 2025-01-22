<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SparePartController;
use App\Http\Controllers\StockController;

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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [StockController::class, 'dashboard']);
Route::get('/master-data/sparepart', [SparePartController::class, 'index']);
Route::get('/stock', [StockController::class, 'index']);
Route::get('/log-stock', [StockController::class, 'logStock']);

// Route::get('/data/stok', [SparePartController::class, 'indexStok'])->name('indexUser');
Route::post('/add/stock', [StockController::class, 'addStock']);
Route::get('/edit/stock/{id}', [StockController::class, 'modalEdit']);
Route::post('/update/stock/{id}', [StockController::class, 'updateStock']);
Route::get('/detail-modal/sparepart/{id}', [SparePartController::class, 'modalUpdate']);
Route::post('/add/SparePart', [SparePartController::class, 'addSparepart']);
Route::post('/update/SparePart/{id}', [SparePartController::class, 'updateSparepart']);
Route::post('/delete/SparePart/{id}', [SparePartController::class, 'deleteSparepart']);
Route::get('/detail-modal/log-stock/{id}', [StockController::class, 'detailStock']);
Route::post('/add/stock/out', [StockController::class, 'outStock']);