<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth" x-data="{ dark: localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches) }" x-init="$watch('dark', v => { document.documentElement.classList.toggle('dark', v); localStorage.setItem('theme', v ? 'dark' : 'light'); }); document.documentElement.classList.toggle('dark', dark);"
    :class="dark ? 'dark' : ''">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <title>{{ $code }} — {{ config('app.name') }}</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" type="image/webp" href="{{ asset('assets/images/Logo_Square.webp') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="flex min-h-screen flex-col bg-warm-white text-charcoal font-sans leading-relaxed antialiased">
@php
    $segments = request()->segments();
    $hasLocalePrefix = count($segments) > 0 && in_array($segments[0], ['en', 'id']);
    $pathSegments = $hasLocalePrefix ? array_slice($segments, 1) : $segments;
    $localeUrl = fn ($locale) => url('/' . $locale . '/' . implode('/', $pathSegments));
@endphp
    <header x-data="{ open: false }" class="sticky top-0 z-50 border-b border-peach bg-warm-white/90 backdrop-blur-md">
        <div class="relative mx-auto flex max-w-6xl items-center justify-between px-6 sm:px-8 lg:px-12">
            {{-- Logo (left) --}}
            <a href="{{ url('/' . app()->getLocale()) }}" class="block max-w-64">
                <img src="{{ asset('assets/images/Logo_Landscape.webp') }}" alt="{{ config('app.name') }}" class="h-20 sm:h-20 lg:h-24 w-auto" loading="eager">
            </a>

            {{-- Centered desktop nav --}}
            <nav class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 hidden items-center gap-6 text-sm font-medium sm:flex">
                <a href="{{ url('/' . app()->getLocale() . '/work') }}" class="text-charcoal-soft transition-colors hover:text-brand">{{ __('layout.nav.work') }}</a>
                <a href="{{ url('/' . app()->getLocale() . '/contact') }}" class="text-charcoal-soft transition-colors hover:text-brand">{{ __('layout.nav.contact') }}</a>
            </nav>

            {{-- Right controls: locale + dark toggle --}}
            <div class="hidden items-center gap-4 sm:flex">
                <div class="flex items-center gap-0.5 rounded-full border border-peach p-0.5 text-xs font-semibold tracking-wider uppercase dark:border-charcoal">
                    <a href="{{ $localeUrl('en') }}" class="rounded-full px-2.5 py-1.5 transition-colors {{ app()->getLocale() === 'en' ? 'bg-brand text-white dark:bg-brand dark:text-white' : 'text-warm-gray hover:text-charcoal dark:hover:text-white' }}" aria-label="English">EN</a>
                    <a href="{{ $localeUrl('id') }}" class="rounded-full px-2.5 py-1.5 transition-colors {{ app()->getLocale() === 'id' ? 'bg-brand text-white dark:bg-brand dark:text-white' : 'text-warm-gray hover:text-charcoal dark:hover:text-white' }}" aria-label="Bahasa Indonesia">ID</a>
                </div>
                <button @click="dark = !dark" class="flex size-8 items-center justify-center rounded-full border border-peach transition-colors hover:bg-peach dark:border-charcoal dark:hover:bg-charcoal/10" aria-label="{{ __('layout.nav.toggle_dark_mode') }}">
                    <svg x-show="!dark" class="size-4 text-charcoal" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"/></svg>
                    <svg x-show="dark" x-cloak class="size-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"/></svg>
                </button>
            </div>
            <button @click="open = !open" :aria-expanded="open" class="sm:hidden flex size-10 items-center justify-center" aria-label="{{ __('layout.nav.toggle_menu') }}">
                <svg class="size-6 text-charcoal" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="!open"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg class="size-6 text-charcoal" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="open" x-cloak><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        {{-- Mobile menu --}}
        <nav x-show="open" x-cloak
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             @click.outside="open = false"
             class="border-t border-peach bg-warm-white px-6 pb-6 pt-4 sm:hidden">
            <div class="flex flex-col gap-4 text-base font-medium text-charcoal-soft">
                <a href="{{ url('/' . app()->getLocale() . '/work') }}" @click="open = false" class="transition-colors hover:text-brand">{{ __('layout.nav.work') }}</a>
                <a href="{{ url('/' . app()->getLocale() . '/contact') }}" @click="open = false" class="transition-colors hover:text-brand">{{ __('layout.nav.contact') }}</a>
                <div class="flex items-center gap-2 pt-2">
                    <a href="{{ $localeUrl('en') }}" @click="open = false" class="text-sm transition-colors {{ app()->getLocale() === 'en' ? 'text-brand font-medium' : 'text-warm-gray hover:text-brand' }}">EN</a>
                    <span class="text-warm-gray/30">/</span>
                    <a href="{{ $localeUrl('id') }}" @click="open = false" class="text-sm transition-colors {{ app()->getLocale() === 'id' ? 'text-brand font-medium' : 'text-warm-gray hover:text-brand' }}">ID</a>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex flex-1 items-center justify-center px-6 py-24">
        <div class="text-center">
            <p class="font-mono text-7xl font-bold tracking-tight text-brand/20 dark:text-brand/30 sm:text-9xl">{{ $code }}</p>
            <h1 class="mt-6 font-serif text-3xl text-charcoal sm:text-4xl">{{ $title }}</h1>
            <p class="mx-auto mt-4 max-w-md text-base leading-relaxed text-warm-gray">{{ $description }}</p>
            <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
                <a href="{{ url('/' . app()->getLocale()) }}"
                   class="inline-flex items-center gap-2 rounded-full bg-charcoal px-6 py-3 text-sm font-medium text-cream transition-colors hover:bg-brand-dark dark:bg-brand dark:text-white dark:hover:bg-brand-dark">
                    {{ app()->getLocale() === 'id' ? 'Kembali ke Beranda' : 'Back to Home' }}
                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
                @if ($code === 404)
                    <a href="{{ url('/' . app()->getLocale() . '/work') }}"
                       class="inline-flex items-center gap-2 rounded-full border border-peach px-6 py-3 text-sm font-medium text-charcoal-soft transition-colors hover:bg-peach/50">
                        {{ __('layout.nav.work') }}
                    </a>
                @endif
            </div>
        </div>
    </main>

    <footer class="border-t border-peach bg-cream">
        <div class="mx-auto max-w-6xl px-6 py-6 sm:px-8 lg:px-12">
            <p class="text-center text-sm text-warm-gray">© {{ date('Y') }} {{ config('app.name') }}. {{ app()->getLocale() === 'id' ? 'Berakar di Bali.' : 'Rooted in Bali.' }}</p>
        </div>
    </footer>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
