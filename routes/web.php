<?php

use App\Livewire\ContactPage;
use App\Livewire\HomePage;
use App\Livewire\ShowProject;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class);
use App\Livewire\WorkPage;

Route::get('/work', WorkPage::class)->name('projects.index');
Route::get('/contact', ContactPage::class)->name('contact');
Route::get('/work/{project}', ShowProject::class)->name('projects.show');
