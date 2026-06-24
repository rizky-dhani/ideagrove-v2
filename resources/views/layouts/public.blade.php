<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth" x-data="{ dark: localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches) }" x-init="$watch('dark', v => { document.documentElement.classList.toggle('dark', v); localStorage.setItem('theme', v ? 'dark' : 'light'); }); document.documentElement.classList.toggle('dark', dark);"
    :class="dark ? 'dark' : ''">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    {{-- SEO: canonical, hreflang, OG, JSON-LD --}}
    @php
        $segments = request()->segments();
        $locale = app()->getLocale();
        $otherLocale = $locale === 'en' ? 'id' : 'en';
        $path = count($segments) > 1 ? '/' . implode('/', array_slice($segments, 1)) : '/';
        $canonical = url('/' . $locale . $path);
        $otherUrl = url('/' . $otherLocale . $path);

        $seo = $seo ?? [];
        $seoTitle = ($seo['title'] ?? null) ?: config('app.name');
        $seoDescription = ($seo['description'] ?? null) ?: __('layout.meta.home.description');
        $ogTitle = ($seo['og_title'] ?? null) ?: $seoTitle;
        $ogDescription = ($seo['og_description'] ?? null) ?: $seoDescription;
        $seoImage = $seo['og_image'] ?? null;
    @endphp
    <link rel="canonical" href="{{ $canonical }}">
    <link rel="alternate" hreflang="en" href="{{ url('/en' . $path) }}">
    <link rel="alternate" hreflang="id" href="{{ url('/id' . $path) }}">
    <link rel="alternate" hreflang="x-default" href="{{ url('/en' . $path) }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $canonical }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="og:title" content="{{ $ogTitle }}">
    <meta property="og:description" content="{{ $ogDescription }}">
    @if ($seoImage)
        <meta property="og:image" content="{{ $seoImage }}">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
    @endif
    <meta name="twitter:card" content="{{ $seoImage ? 'summary_large_image' : 'summary' }}">
    <meta name="twitter:title" content="{{ $ogTitle }}">
    <meta name="twitter:description" content="{{ $ogDescription }}">
    @if ($seoImage)
        <meta name="twitter:image" content="{{ $seoImage }}">
    @endif
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => config('app.name'),
        'url' => config('app.url'),
        'logo' => asset('assets/images/Logo_Landscape.webp'),
        'address' => [
            '@type' => 'PostalAddress',
            'addressLocality' => 'Bali',
            'addressCountry' => 'ID',
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>

    <title>{{ $seoTitle }}</title>
    <meta name="description" content="{{ $seoDescription }}">

    <link rel="icon" type="image/webp" href="{{ asset('assets/images/Logo_Square.webp') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @if ($siteSetting?->ga_property_id)
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $siteSetting->ga_property_id }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ $siteSetting->ga_property_id }}');
        </script>
    @endif
    @livewireStyles
</head>
<body class="bg-warm-white text-charcoal font-sans leading-relaxed antialiased">
@php
    $segments = request()->segments();
    $localeUrl = fn ($locale) => count($segments) > 0
        ? url('/' . $locale . '/' . implode('/', array_slice($segments, 1)))
        : url('/' . $locale);
@endphp
    <a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-[100] focus:rounded-lg focus:bg-brand focus:px-4 focus:py-2 focus:text-sm focus:font-medium focus:text-white focus:outline-none">
        {{ __('layout.nav.skip_to_content') }}
    </a>

    <header x-data="{ open: false }" class="sticky top-0 z-50 border-b border-peach bg-warm-white/90 backdrop-blur-md">
        <div class="relative mx-auto flex max-w-6xl items-center justify-between px-6 sm:px-8 lg:px-12">
            {{-- Logo (left) --}}
            <a href="{{ route('home') }}" class="block max-w-64">
                <img src="{{ asset('assets/images/Logo_Landscape.webp') }}"
                     alt="The Idea Grove Studio"
                     class="h-20 sm:h-20 lg:h-24 w-auto"
                     loading="eager">
            </a>

            {{-- Centered desktop nav --}}
            <nav class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 hidden items-center gap-6 text-sm font-medium sm:flex">
                <a href="{{ route('projects.index') }}" {{ request()->routeIs('projects.*') ? 'aria-current="page"' : '' }} class="transition-colors hover:text-brand {{ request()->routeIs('projects.*') ? 'text-brand' : 'text-charcoal-soft' }}">{{ __('layout.nav.work') }}</a>
                <a href="{{ route('contact') }}" {{ request()->routeIs('contact') ? 'aria-current="page"' : '' }} class="transition-colors hover:text-brand {{ request()->routeIs('contact') ? 'text-brand' : 'text-charcoal-soft' }}">{{ __('layout.nav.contact') }}</a>
            </nav>

            {{-- Right controls: social links + dark toggle --}}
            <div class="hidden items-center gap-4 sm:flex">
                    @foreach ($socialLinks as $link)
                        <a href="{{ $link->url }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="text-warm-gray transition-colors hover:text-brand"
                           title="{{ $link->platform }}">
                            @svg($link->icon, 'size-5')
                        </a>
                    @endforeach
                <div class="flex items-center gap-0.5 rounded-full border border-peach p-0.5 text-xs font-semibold tracking-wider uppercase dark:border-charcoal">
                    <a href="{{ $localeUrl('en') }}"
                       class="rounded-full px-2.5 py-1.5 transition-colors {{ app()->getLocale() === 'en' ? 'bg-brand text-white dark:bg-brand dark:text-white' : 'text-warm-gray hover:text-charcoal dark:hover:text-white' }}"
                       aria-label="English">EN</a>
                    <a href="{{ $localeUrl('id') }}"
                       class="rounded-full px-2.5 py-1.5 transition-colors {{ app()->getLocale() === 'id' ? 'bg-brand text-white dark:bg-brand dark:text-white' : 'text-warm-gray hover:text-charcoal dark:hover:text-white' }}"
                       aria-label="Bahasa Indonesia">ID</a>
                </div>
                <button @click="dark = !dark" class="flex size-8 items-center justify-center rounded-full border border-peach transition-colors hover:bg-peach dark:border-charcoal dark:hover:bg-charcoal/10" aria-label="{{ __('layout.nav.toggle_dark_mode') }}">
                    <svg x-show="!dark" class="size-4 text-charcoal" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"/>
                    </svg>
                    <svg x-show="dark" x-cloak class="size-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"/>
                    </svg>
                </button>
            </div>
            <button @click="open = !open" :aria-expanded="open" class="sm:hidden flex size-10 items-center justify-center" aria-label="{{ __('layout.nav.toggle_menu') }}">
                <svg class="size-6 text-charcoal" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="!open">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg class="size-6 text-charcoal" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="open" x-cloak>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Mobile menu --}}
        <nav x-show="open"
             x-cloak
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             @click.outside="open = false"
             class="border-t border-peach bg-warm-white px-6 pb-6 pt-4 sm:hidden">
            <div class="flex flex-col gap-4 text-base font-medium text-charcoal-soft">
                <a href="{{ route('projects.index') }}" @click="open = false" class="transition-colors hover:text-brand {{ request()->routeIs('projects.*') ? 'text-brand' : '' }}">{{ __('layout.nav.work') }}</a>
                <a href="{{ route('contact') }}" @click="open = false" class="transition-colors hover:text-brand {{ request()->routeIs('contact') ? 'text-brand' : '' }}">{{ __('layout.nav.contact') }}</a>
                <div class="flex items-center gap-2 pt-2">
                    <a href="{{ $localeUrl('en') }}" @click="open = false"
                       class="text-sm transition-colors {{ app()->getLocale() === 'en' ? 'text-brand font-medium' : 'text-warm-gray hover:text-brand' }}">EN</a>
                    <span class="text-warm-gray/30">/</span>
                    <a href="{{ $localeUrl('id') }}" @click="open = false"
                       class="text-sm transition-colors {{ app()->getLocale() === 'id' ? 'text-brand font-medium' : 'text-warm-gray hover:text-brand' }}">ID</a>
                </div>
                @if ($socialLinks->isNotEmpty())
                    <div class="border-t border-peach-medium/40 pt-4 mt-1 flex flex-wrap gap-4">
                    @foreach ($socialLinks as $link)
                        <a href="{{ $link->url }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           @click="open = false"
                           class="flex items-center gap-3 text-sm text-warm-gray transition-colors hover:text-brand">
                            @svg($link->icon, 'size-5 shrink-0')
                            {{ $link->platform }}
                        </a>
                    @endforeach
                    </div>
                @endif
            </div>
        </nav>
    </header>

    <main id="main">
        {{ $slot }}
    </main>

    <footer class="border-t border-peach bg-cream">
        <div class="mx-auto max-w-6xl px-6 py-12 sm:px-8 lg:px-12">
            <div class="grid gap-10 sm:grid-cols-3">
                {{-- Brand --}}
                <div>
                    <a href="{{ route('home') }}" class="block max-w-64">
                        <img src="{{ asset('assets/images/Logo_Landscape.webp') }}"
                             alt="The Idea Grove Studio"
                             class="h-28 w-auto opacity-80 transition-opacity hover:opacity-100">
                    </a>
                </div>

                {{-- Links --}}
                <div>
                    <h4 class="text-xs font-medium tracking-[0.2em] text-warm-gray uppercase">{{ __('layout.footer.links') }}</h4>
                    <nav class="mt-4 flex flex-col gap-2">
                        <a href="{{ route('projects.index') }}" class="text-sm text-warm-gray transition-colors hover:text-brand">{{ __('layout.nav.work') }}</a>
                        <a href="{{ route('contact') }}" class="text-sm text-warm-gray transition-colors hover:text-brand">{{ __('layout.nav.contact') }}</a>
                    </nav>
                </div>

                {{-- Connect --}}
                <div>
                    <h4 class="text-xs font-medium tracking-[0.2em] text-warm-gray uppercase">{{ __('layout.footer.connect') }}</h4>
                    <div class="mt-4 space-y-2">
                        @if ($siteSetting?->email)
                            <a href="mailto:{{ $siteSetting->email }}"
                               class="text-sm text-warm-gray transition-colors hover:text-brand">
                                {{ $siteSetting->email }}
                            </a>
                        @endif
                        @if ($siteSetting?->phone_display)
                            <br>
                            <a href="tel:{{ $siteSetting->phone }}"
                               class="text-sm text-warm-gray transition-colors hover:text-brand">
                                {{ $siteSetting->phone_display }}
                            </a>
                        @endif
                        @if ($socialLinks->isNotEmpty())
                            <div class="mt-3 flex flex-wrap gap-4">
                                @foreach ($socialLinks as $link)
                                    <a href="{{ $link->url }}"
                                       target="_blank"
                                       rel="noopener noreferrer"
                                       class="flex items-center gap-2 text-sm text-warm-gray transition-colors hover:text-brand"
                                       title="{{ $link->platform }}">
                                        @svg($link->icon, 'size-4 shrink-0')
                                        {{ $link->platform }}
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom bar --}}
        <div class="border-t border-peach-medium/40">
            <div class="mx-auto max-w-6xl px-6 py-6 sm:px-8 lg:px-12">
                <div class="flex flex-col items-center gap-2 text-sm text-warm-gray sm:flex-row sm:justify-between">
                    <p>{{ __('layout.footer.copyright', ['year' => date('Y')]) }}</p>
                    <p class="flex items-center gap-2">
                        <span class="inline-block size-1.5 rounded-full bg-brand"></span>
                        {!! __('layout.footer.made_with', ['soul' => '<span class="italic">'.__('layout.footer.made_with_soul').'</span>']) !!}
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <x-back-to-top />
    @livewireScripts
    @livewireScriptConfig

</body>
</html>
