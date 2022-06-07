<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[BarangController::class, 'getManagePage'])->name('managePage');

Route::prefix('barang')->group(function(){
    Route::get('/add',[BarangController::class, 'getAddPage'])->name('addPage');
    Route::post('/add',[BarangController::class, 'addBarang'])->name('addBarang');
    Route::get('{id}/edit',[BarangController::class, 'getUpdatePage'])->name('updatePage');
    Route::patch('{id}/edit',[BarangController::class,'updateBarang'])->name('updateBarang');
    Route::delete('{id}/delete',[BarangController::class, 'deleteBarang'])->name('deleteBarang');
});

