<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

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



Route::get('/', [CrudController::class, 'viewItem'])->name('view');

Route::get('add-form', [CrudController::class, 'addForm'])->name('add.form');
Route::post('add-item', [CrudController::class, 'addItem'])->name('add.item');

Route::get('product/{id}/edit', [CrudController::class, 'editForm'])->name('edit.form');
Route::put('product/{id}/update', [CrudController::class, 'updateProduct'])->name('update.product');
Route::delete('product/{id}/delete', [CrudController::class, 'deletProduct'])->name('delete.product');


