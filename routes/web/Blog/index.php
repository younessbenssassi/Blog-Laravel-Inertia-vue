<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::name('posts.')
        ->prefix('posts')
        ->group(__DIR__ . '/post.php');

    Route::name('categories.')
        ->prefix('categories')
        ->group(__DIR__ . '/category.php');

});

