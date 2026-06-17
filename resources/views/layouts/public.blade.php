<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @if ($meta ?? false)
        {!! $meta !!}
    @else
        <title>{{ config('app.name', 'The Idea Grove Studio') }} — Digital Agency, Bali</title>
        <meta name="description" content="The Idea Grove Studio — a digital agency from Bali crafting meaningful digital experiences.">
    @endif

    <link rel="icon" type="image/webp" href="{{ asset('assets/images/Logo_Square.webp') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-warm-white text-charcoal font-sans leading-relaxed antialiased">

    <header x-data="{ open: false }" class="sticky top-0 z-50 border-b border-peach bg-warm-white/90 backdrop-blur-md">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-6 sm:px-8 lg:px-12">
            <a href="/" class="block max-w-64">
                <img src="{{ asset('assets/images/Logo_Landscape.webp') }}"
                     alt="The Idea Grove Studio"
                     class="h-16 sm:h-20 lg:h-24 w-auto"
                     loading="eager">
            </a>

            {{-- Desktop nav --}}
            <nav class="hidden items-center gap-6 text-sm font-medium text-charcoal-soft sm:flex">
                <a href="/#projects" class="transition-colors hover:text-brand">Work</a>
                <a href="/#contact" class="transition-colors hover:text-brand">Contact</a>
            </nav>

            {{-- Hamburger (mobile) --}}
            <button @click="open = !open" class="flex size-10 items-center justify-center sm:hidden" aria-label="Toggle menu">
                <svg class="size-6 text-charcoal" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="!open">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg class="size-6 text-charcoal" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="open" x-cloak>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Mobile menu --}}
        <nav x-show="open" x-cloak
             @click.outside="open = false"
             class="border-t border-peach bg-warm-white px-6 pb-6 pt-4 sm:hidden">
            <div class="flex flex-col gap-4 text-base font-medium text-charcoal-soft">
                <a href="/#projects" @click="open = false" class="transition-colors hover:text-brand">Work</a>
                <a href="/#contact" @click="open = false" class="transition-colors hover:text-brand">Contact</a>
            </div>
        </nav>
    </header>

    {{ $slot }}

    <footer class="border-t border-peach bg-cream">
        <div class="mx-auto max-w-6xl px-6 py-12 sm:px-8 lg:px-12">
            <div class="flex flex-col items-center gap-8 sm:flex-row sm:justify-between">
                <a href="/" class="block max-w-64">
                    <img src="{{ asset('assets/images/Logo_Landscape.webp') }}"
                         alt="The Idea Grove Studio"
                         class="h-28 w-auto opacity-80 transition-opacity hover:opacity-100">
                </a>
                <div class="flex flex-col items-center gap-2 text-sm text-warm-gray sm:items-end">
                    <p>&copy; {{ date('Y') }} The Idea Grove Studio. Rooted in Bali.</p>
                    <p class="flex items-center gap-2">
                        <span class="inline-block size-1.5 rounded-full bg-brand"></span>
                        Made with <span class="italic">soul</span> on the Island of the Gods
                    </p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>