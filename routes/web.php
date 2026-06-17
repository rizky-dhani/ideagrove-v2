<?php

use App\Livewire\HomePage;
use App\Livewire\ShowProject;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class);
Route::get('/work/{project}', ShowProject::class)->name('projects.show');
