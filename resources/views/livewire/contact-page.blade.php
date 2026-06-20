<div>
    {{-- Hero --}}
    <section class="relative overflow-hidden bg-cream px-6 py-10 sm:px-8 lg:px-12">
        <div class="pointer-events-none absolute -top-24 -right-24 size-96 rounded-full bg-brand/10 blur-3xl" aria-hidden="true"></div>
        <div class="mx-auto flex max-w-4xl flex-col gap-6 sm:flex-row sm:items-start sm:justify-between">
            <a href="{{ route('home') }}" class="inline-flex shrink-0 items-center gap-2 text-sm text-warm-gray/60 transition-colors hover:text-charcoal dark:text-warm-gray/80 dark:hover:text-white">
                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
                </svg>
                {{ __('contact.back') }}
            </a>

            <div class="text-left sm:text-right">
                <p class="mb-2 text-sm font-medium tracking-widest text-brand-light uppercase">{{ __('contact.section_label') }}</p>

                <h1 class="font-serif text-3xl leading-tight text-charcoal sm:text-4xl lg:text-5xl">{{ __('contact.heading') }}</h1>

                <p class="mt-3 max-w-md text-base leading-relaxed text-warm-gray sm:ml-auto">
                    {{ __('contact.subtitle') }}
                </p>
            </div>
        </div>
    </section>

    {{-- Contact --}}
    <section class="px-6 py-16 sm:px-8 sm:py-20 lg:px-12 lg:py-24">
        <div class="mx-auto max-w-6xl">
            <div class="grid gap-16 lg:grid-cols-12">
                {{-- Form --}}
                <div class="lg:col-span-7">
                    <div class="rounded-2xl border border-charcoal/10 bg-charcoal/[0.04] p-8 backdrop-blur-sm sm:p-10">
                        <livewire:contact-form />
                    </div>
                </div>

                {{-- Contact details --}}
                <aside class="lg:col-span-5">
                    <div class="scroll-reveal space-y-10">
                        <div>
                            <h2 class="font-serif text-2xl text-charcoal sm:text-3xl">{{ __('contact.reach_out') }}</h2>
                            <p class="mt-3 text-sm leading-relaxed text-warm-gray">
                                {{ __('contact.reach_out_body') }}
                            </p>
                        </div>

                        @if ($siteSetting?->email)
                            <div>
                                <h3 class="text-xs font-medium tracking-[0.2em] text-warm-gray uppercase">{{ __('contact.email_label') }}</h3>
                                <a href="mailto:{{ $siteSetting->email }}"
                                   class="mt-2 block font-serif text-lg text-charcoal transition-colors hover:text-brand">
                                    {{ $siteSetting->email }}
                                </a>
                            </div>
                        @endif

                        @if ($siteSetting?->phone_display)
                            <div>
                                <h3 class="text-xs font-medium tracking-[0.2em] text-warm-gray uppercase">{{ __('contact.phone_label') }}</h3>
                                <a href="tel:{{ $siteSetting->phone }}"
                                   class="mt-2 block font-serif text-lg text-charcoal transition-colors hover:text-brand">
                                    {{ $siteSetting->phone_display }}
                                </a>
                            </div>
                        @endif

                        <div>
                            <h3 class="text-xs font-medium tracking-[0.2em] text-warm-gray uppercase">{{ __('contact.studio_label') }}</h3>
                            <p class="mt-2 font-serif text-lg text-charcoal">
                                {{ __('contact.studio_value') }}
                            </p>
                        </div>

                        @if ($socialLinks->isNotEmpty())
                            <div>
                                <h3 class="text-xs font-medium tracking-[0.2em] text-warm-gray uppercase">{{ __('contact.connect_label') }}</h3>
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
                            </div>
                        @endif
                    </div>
                </aside>
            </div>
        </div>
    </section>
</div>
