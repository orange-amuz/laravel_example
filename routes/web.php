<?php

use App\Http\Controllers\AppController;
use App\Http\Middleware\BlogMiddleware;
use App\Http\Middleware\LocalMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [AppController::class, 'index'])->name('index');

Route::middleware([
    LocalMiddleware::class,
])->group(function() {
    Route::get('/page', [AppController::class, 'index'])->name('page');

    Route::middleware([
        BlogMiddleware::class,
    ])->get('/blog', [AppController::class, 'index'])->name('blog');
});

Route::get('/org', [AppController::class, 'org'])->name('org');