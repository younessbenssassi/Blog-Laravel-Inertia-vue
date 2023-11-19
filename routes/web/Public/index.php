<?php

use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\General\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::post('/subscription', [SubscriptionController::class, 'store'])->name('subscription.store');
    Route::delete('/{subscription}/cancel', [SubscriptionController::class, 'destroy'])->name('subscription.destroy');
});

Route::get('/posts/{post}', [PostController::class, 'show'])->name('blog.posts.view');

