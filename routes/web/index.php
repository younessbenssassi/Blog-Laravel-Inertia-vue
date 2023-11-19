<?php

use App\Http\Controllers\App\AppController;
use App\Http\Controllers\General\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {

//    Route::name('users.')
//        ->prefix('users')
//        ->group(__DIR__ . '/users.php');

    Route::name('blog.')
        ->group(__DIR__ . '/Blog/index.php');

});

Route::get('version', AppController::class);
require __DIR__ . '/Auth/auth.php';
require __DIR__ . '/Public/index.php';
