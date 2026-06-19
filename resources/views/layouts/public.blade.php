<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth" x-data="{ dark: localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches) }" x-init="$watch('dark', v => { document.documentElement.classList.toggle('dark', v); localStorage.setItem('theme', v ? 'dark' : 'light'); }); document.documentElement.classList.toggle('dark', dark);"
    :class="dark ? 'dark' : ''">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">

    @if ($meta ?? false)
        {!! $meta !!}
    @else
        <title>{{ config('app.name', 'The Idea Grove Studio') }} — Digital Agency, Bali</title>
        <meta name="description" content="The Idea Grove Studio — a digital agency from Bali crafting meaningful digital experiences.">
    @endif

    <link rel="icon" type="image/webp" href="{{ asset('assets/images/Logo_Square.webp') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-warm-white text-charcoal font-sans leading-relaxed antialiased">
    <a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-[100] focus:rounded-lg focus:bg-brand focus:px-4 focus:py-2 focus:text-sm focus:font-medium focus:text-white focus:outline-none">
        Skip to content
    </a>

    <header x-data="{ open: false }" class="sticky top-0 z-50 border-b border-peach bg-warm-white/90 backdrop-blur-md">
        <div class="relative mx-auto flex max-w-6xl items-center justify-between px-6 sm:px-8 lg:px-12">
            {{-- Logo (left) --}}
            <a href="/" class="block max-w-64">
                <img src="{{ asset('assets/images/Logo_Landscape.webp') }}"
                     alt="The Idea Grove Studio"
                     class="h-20 sm:h-20 lg:h-24 w-auto"
                     loading="eager">
            </a>

            {{-- Centered desktop nav --}}
            <nav class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 hidden items-center gap-6 text-sm font-medium text-charcoal-soft sm:flex">
                <a href="{{ route('projects.index') }}" class="transition-colors hover:text-brand">Work</a>
                <a href="/#contact" class="transition-colors hover:text-brand">Contact</a>
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
                <button @click="dark = !dark" class="flex size-8 items-center justify-center rounded-full border border-peach transition-colors hover:bg-peach dark:border-charcoal dark:hover:bg-charcoal/10" aria-label="Toggle dark mode">
                    <svg x-show="!dark" class="size-4 text-charcoal" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"/>
                    </svg>
                    <svg x-show="dark" x-cloak class="size-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"/>
                    </svg>
                </button>
            </div>

            {{-- Mobile controls --}}
            <div class="flex items-center gap-2 sm:hidden">
                <button @click="dark = !dark" class="flex size-10 items-center justify-center" aria-label="Toggle dark mode">
                    <svg x-show="!dark" class="size-5 text-charcoal" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"/>
                    </svg>
                    <svg x-show="dark" x-cloak class="size-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"/>
                    </svg>
                </button>
                <button @click="open = !open" class="flex size-10 items-center justify-center" aria-label="Toggle menu">
                    <svg class="size-6 text-charcoal" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="!open">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg class="size-6 text-charcoal" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="open" x-cloak>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile menu --}}
        <nav x-show="open"
             x-cloak
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             @click.outside="open = false"
             class="border-t border-peach bg-warm-white px-6 pb-6 pt-4 sm:hidden">
            <div class="flex flex-col gap-4 text-base font-medium text-charcoal-soft">
                <a href="{{ route('projects.index') }}" @click="open = false" class="transition-colors hover:text-brand">Work</a>
                <a href="/#contact" @click="open = false" class="transition-colors hover:text-brand">Contact</a>
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
                    <a href="/" class="block max-w-64">
                        <img src="{{ asset('assets/images/Logo_Landscape.webp') }}"
                             alt="The Idea Grove Studio"
                             class="h-28 w-auto opacity-80 transition-opacity hover:opacity-100">
                    </a>
                </div>

                {{-- Links --}}
                <div>
                    <h4 class="text-xs font-medium tracking-[0.2em] text-warm-gray uppercase">Links</h4>
                    <nav class="mt-4 flex flex-col gap-2">
                        <a href="{{ route('projects.index') }}" class="text-sm text-warm-gray transition-colors hover:text-brand">Work</a>
                        <a href="/#contact" class="text-sm text-warm-gray transition-colors hover:text-brand">Contact</a>
                    </nav>
                </div>

                {{-- Connect --}}
                <div>
                    <h4 class="text-xs font-medium tracking-[0.2em] text-warm-gray uppercase">Connect</h4>
                    <div class="mt-4 space-y-2">
                        @if ($siteSetting?->email)
                            <a href="mailto:{{ $siteSetting->email }}"
                               class="text-sm text-warm-gray transition-colors hover:text-brand">
                                {{ $siteSetting->email }}
                            </a>
                        @endif
                        @if ($siteSetting?->phone_display)
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
                    <p>&copy; {{ date('Y') }} The Idea Grove Studio. Rooted in Bali.</p>
                    <p class="flex items-center gap-2">
                        <span class="inline-block size-1.5 rounded-full bg-brand"></span>
                        Made with <span class="italic">soul</span> on the Island of the Gods
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <x-back-to-top />

</body>
</html>
