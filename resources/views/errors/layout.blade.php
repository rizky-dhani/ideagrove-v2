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
    @vite(['resources/css/app.css'])
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-warm-white text-charcoal font-sans leading-relaxed antialiased dark:bg-charcoal dark:text-cream">
    <header class="sticky top-0 z-50 border-b border-peach bg-warm-white/90 backdrop-blur-md dark:border-charcoal-soft/20 dark:bg-charcoal/90">
        <div class="relative mx-auto flex max-w-6xl items-center justify-between px-6 sm:px-8 lg:px-12">
            <a href="{{ url('/' . app()->getLocale()) }}" class="block max-w-64">
                <img src="{{ asset('assets/images/Logo_Landscape.webp') }}" alt="{{ config('app.name') }}" class="h-20 w-auto" loading="eager">
            </a>
            <nav class="flex items-center gap-6 text-sm font-medium">
                <a href="{{ url('/' . app()->getLocale() . '/work') }}" class="text-charcoal-soft transition-colors hover:text-brand dark:text-cream/60 dark:hover:text-brand">{{ __('layout.nav.work') }}</a>
                <a href="{{ url('/' . app()->getLocale() . '/contact') }}" class="text-charcoal-soft transition-colors hover:text-brand dark:text-cream/60 dark:hover:text-brand">{{ __('layout.nav.contact') }}</a>
                <button @click="dark = !dark" class="flex size-8 items-center justify-center rounded-full border border-peach transition-colors hover:bg-peach dark:border-charcoal-soft/20 dark:hover:bg-charcoal-soft/10" aria-label="{{ __('layout.nav.toggle_dark_mode') }}">
                    <svg x-show="!dark" class="size-4 text-charcoal" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"/></svg>
                    <svg x-show="dark" x-cloak class="size-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"/></svg>
                </button>
            </nav>
        </div>
    </header>

    <main class="flex min-h-[60vh] items-center justify-center px-6 py-24">
        <div class="text-center">
            <p class="font-mono text-7xl font-bold tracking-tight text-brand/20 dark:text-brand/30 sm:text-9xl">{{ $code }}</p>
            <h1 class="mt-6 font-serif text-3xl text-charcoal sm:text-4xl dark:text-cream">{{ $title }}</h1>
            <p class="mx-auto mt-4 max-w-md text-base leading-relaxed text-warm-gray dark:text-cream/50">{{ $description }}</p>
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
                       class="inline-flex items-center gap-2 rounded-full border border-peach px-6 py-3 text-sm font-medium text-charcoal-soft transition-colors hover:bg-peach/50 dark:border-charcoal-soft/20 dark:text-cream/60 dark:hover:bg-charcoal-soft/10">
                        {{ __('layout.nav.work') }}
                    </a>
                @endif
            </div>
        </div>
    </main>

    <footer class="border-t border-peach bg-cream dark:border-charcoal-soft/20 dark:bg-charcoal">
        <div class="mx-auto max-w-6xl px-6 py-6 sm:px-8 lg:px-12">
            <p class="text-center text-sm text-warm-gray dark:text-cream/40">© {{ date('Y') }} {{ config('app.name') }}. {{ app()->getLocale() === 'id' ? 'Berakar di Bali.' : 'Rooted in Bali.' }}</p>
        </div>
    </footer>
</body>
</html>
