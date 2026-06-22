<?php

use App\Livewire\ContactPage;
use App\Livewire\HomePage;
use App\Livewire\ShowProject;
use App\Livewire\WorkPage;
use App\Models\Project;
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
        Route::get('/work/barbershop', fn () => view('portfolio.barbershop', ['title' => 'BLK & GOLD Barbershop | IdeaGrove']));
        Route::get('/work/{project}', ShowProject::class)->name('projects.show');
    });

// SEO: XML Sitemap
Route::get('/sitemap.xml', function () {
    $projects = Project::all();
    $locales = ['en', 'id'];
    $lastModified = $projects->max('updated_at')?->format('Y-m-d\TH:i:sP') ?? now()->format('Y-m-d\TH:i:sP');

    return response()
        ->view('sitemap', compact('projects', 'locales', 'lastModified'))
        ->header('Content-Type', 'application/xml');
})->name('sitemap');
