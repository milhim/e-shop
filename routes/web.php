<?php

use App\Http\Controllers\ProducrController;
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

Route::get('/', [ProducrController::class,'index'])->name('home');
Route::get('/admin/dashboard', [ProducrController::class,'dashboard'])->name('dashboard');
Route::post('admin/product',[ProducrController::class,'store'])->name('add_product');
Route::post('admin/product/{id}',[ProducrController::class,'increseQuantity'])->name('increseQuantity');
Route::put('admin/product/{id}',[ProducrController::class,'decreseQuantity'])->name('decreseQuantity');
