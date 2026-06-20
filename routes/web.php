<?php

use App\Livewire\ContactPage;
use App\Livewire\HomePage;
use App\Livewire\ShowProject;
use App\Livewire\WorkPage;
use Illuminate\Support\Facades\Route;

// Root redirect to default locale
Route::get('/', fn () => redirect('/'.config('app.locale')));

// Locale-prefixed frontend routes
Route::prefix('{locale}')
    ->whereIn('locale', ['en', 'id'])
    ->middleware('locale')
    ->group(function () {
        Route::get('/', HomePage::class)->name('home');
        Route::get('/work', WorkPage::class)->name('projects.index');
        Route::get('/contact', ContactPage::class)->name('contact');
        Route::get('/work/{project}', ShowProject::class)->name('projects.show');
    });
