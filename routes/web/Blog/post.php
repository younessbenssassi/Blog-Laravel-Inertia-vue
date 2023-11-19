<?php

use App\Http\Controllers\Blog\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'list'])->name('list');
Route::post('/', [PostController::class, 'store'])->name('store');
Route::get('/new', [PostController::class, 'new'])->name('new');
Route::get('//{post}/edit', [PostController::class, 'edit'])->name('edit');
Route::put('/{post}', [PostController::class, 'update'])->name('update');
Route::delete('/{post}', [PostController::class, 'destroy'])->name('destroy');
