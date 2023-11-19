<?php

use App\Http\Controllers\Blog\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CategoryController::class, 'list'])->name('list');
Route::post('/', [CategoryController::class, 'store'])->name('store');
Route::put('/{category}', [CategoryController::class, 'update'])->name('update');
Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
