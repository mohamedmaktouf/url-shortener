<?php

use App\Livewire\Url;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth'])->group(function () {
    Route::get('/url', Url::class)->name('url');
});

Route::get('/url/{short}', \App\Http\Controllers\UrlRedirectionController::class)->name('url.redirect');

require __DIR__.'/auth.php';
