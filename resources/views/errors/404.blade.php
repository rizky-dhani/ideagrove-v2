<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 — {{ config('app.name') }}</title>
    <meta name="description" content="The page you are looking for does not exist.">
    <link rel="icon" type="image/webp" href="{{ asset('assets/images/Logo_Square.webp') }}">
    @vite(['resources/css/app.css'])
</head>
<body class="bg-warm-white text-charcoal font-sans leading-relaxed antialiased">
    <header class="sticky top-0 z-50 border-b border-peach bg-warm-white/90 backdrop-blur-md">
        <div class="relative mx-auto flex max-w-6xl items-center justify-between px-6 sm:px-8 lg:px-12">
            <a href="{{ url('/') }}" class="block max-w-64">
                <img src="{{ asset('assets/images/Logo_Landscape.webp') }}" alt="The Idea Grove Studio" class="h-20 w-auto" loading="eager">
            </a>
            <nav class="flex items-center gap-6 text-sm font-medium">
                <a href="{{ url('/' . app()->getLocale() . '/work') }}" class="text-charcoal-soft transition-colors hover:text-brand">{{ __('layout.nav.work') }}</a>
                <a href="{{ url('/' . app()->getLocale() . '/contact') }}" class="text-charcoal-soft transition-colors hover:text-brand">{{ __('layout.nav.contact') }}</a>
            </nav>
        </div>
    </header>

    <main class="flex min-h-[60vh] items-center justify-center px-6 py-24">
        <div class="text-center">
            <p class="font-mono text-7xl font-bold tracking-tight text-brand/20 sm:text-9xl">404</p>
            <h1 class="mt-6 font-serif text-3xl text-charcoal sm:text-4xl">
                {{ app()->getLocale() === 'id' ? 'Halaman tidak ditemukan' : 'Page not found' }}
            </h1>
            <p class="mx-auto mt-4 max-w-md text-base leading-relaxed text-warm-gray">
                {{ app()->getLocale() === 'id'
                    ? 'Halaman yang kamu cari mungkin sudah dihapus, namanya diganti, atau sedang tidak tersedia.'
                    : 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.'
                }}
            </p>
            <a href="{{ url('/' . app()->getLocale()) }}"
               class="mt-8 inline-flex items-center gap-2 rounded-full bg-charcoal px-6 py-3 text-sm font-medium text-cream transition-colors hover:bg-brand-dark">
                {{ app()->getLocale() === 'id' ? 'Kembali ke Beranda' : 'Back to Home' }}
                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </main>

    <footer class="border-t border-peach bg-cream">
        <div class="mx-auto max-w-6xl px-6 py-6 sm:px-8 lg:px-12">
            <p class="text-center text-sm text-warm-gray">© {{ date('Y') }} {{ config('app.name') }}. {{ app()->getLocale() === 'id' ? 'Berakar di Bali.' : 'Rooted in Bali.' }}</p>
        </div>
    </footer>
</body>
</html>
