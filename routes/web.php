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

Route::get('/master-data/sparepart', [SparePartController::class, 'index']);
Route::get('/stock', [StockController::class, 'index']);

// Route::get('/data/stok', [SparePartController::class, 'indexStok'])->name('indexUser');
Route::post('/add/SparePart', [SparePartController::class, 'addSparepart']);
Route::post('/update/SparePart/{id}', [SparePartController::class, 'updateSparepart']);
Route::post('/delete/SparePart/{id}', [SparePartController::class, 'deleteSparepart']);
Route::get('/detail-modal/sparepart/{id}', [SparePartController::class, 'modalUpdate']);