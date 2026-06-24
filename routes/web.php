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
        Route::get('/work/sports-shop', fn () => view('portfolio.sports-shop.home', ['title' => 'STRIDE | Athletic Performance Gear']));
        Route::get('/work/sports-shop/products', fn () => view('portfolio.sports-shop.products', ['title' => 'STRIDE | All Products']));
        Route::get('/work/sports-shop/about', fn () => view('portfolio.sports-shop.about', ['title' => 'STRIDE | About']));
        Route::get('/work/sports-shop/contact', fn () => view('portfolio.sports-shop.contact', ['title' => 'STRIDE | Contact']));
        Route::get('/work/gadget-shop', fn () => view('portfolio.gadget-shop.home', ['title' => 'PULSE | Premium Tech Devices']));
        Route::get('/work/gadget-shop/products', fn () => view('portfolio.gadget-shop.products', ['title' => 'PULSE | All Products']));
        Route::get('/work/gadget-shop/about', fn () => view('portfolio.gadget-shop.about', ['title' => 'PULSE | About']));
        Route::get('/work/gadget-shop/contact', fn () => view('portfolio.gadget-shop.contact', ['title' => 'PULSE | Contact']));
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
// GA Setup Guide
Route::get('/ga-setup-guide', fn () => view('ga-setup-guide'))->name('ga-setup-guide');
