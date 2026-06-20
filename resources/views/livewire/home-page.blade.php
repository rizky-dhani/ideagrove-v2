<div>
    {{-- Hero --}}
    <section id="hero" class="relative overflow-hidden bg-cream">
        {{-- Subtle grain + warm wash --}}
        <div class="pointer-events-none absolute inset-0 opacity-[0.035]"
             style="background-image: radial-gradient(circle at 1px 1px, var(--color-charcoal) 1px, transparent 0); background-size: 3px 3px;"
             aria-hidden="true"></div>
        <div class="pointer-events-none absolute -top-32 right-0 h-[28rem] w-[28rem] rounded-full bg-peach/40 blur-3xl" aria-hidden="true"></div>
        <div class="pointer-events-none absolute bottom-0 -left-24 h-72 w-72 rounded-full bg-brand/5 blur-3xl" aria-hidden="true"></div>

        <div class="relative mx-auto max-w-6xl px-6 pt-24 pb-28 sm:px-8 sm:pt-32 sm:pb-32 lg:px-12 lg:pt-40 lg:pb-40">
            <div class="grid items-end gap-16 lg:grid-cols-12">
                <div class="lg:col-span-8">
                    <div class="flex items-center gap-3 text-xs font-medium tracking-[0.2em] text-warm-gray uppercase">
                        <span class="inline-block h-px w-8 bg-warm-gray/60"></span>
                        <span>{{ __('home.hero.badge') }}</span>
                    </div>

                    <h1 class="mt-8 font-serif text-[2.75rem] leading-[1.05] text-charcoal sm:text-6xl lg:text-[5.25rem]">
                        {!! __('home.hero.heading', ['considered' => "<span class=\"italic text-brand-dark\">".__('home.hero.heading_em')."</span>"]) !!}
                    </h1>

                    <p class="mt-8 max-w-xl text-base leading-relaxed text-warm-gray sm:text-lg">
                        {{ __('home.hero.subtitle') }}
                    </p>
                    <div class="mt-8 flex flex-wrap items-center gap-x-6 gap-y-4 sm:mt-10">
                        <a href="#work" class="inline-flex items-center gap-2 rounded-full bg-charcoal px-6 py-3 text-sm font-medium text-cream transition-colors hover:bg-brand-dark">
                            {{ __('home.hero.cta_work') }}
                            <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                        <a href="#contact" class="group inline-flex items-center gap-2 text-sm font-medium text-charcoal transition-colors hover:text-brand-dark">
                            {{ __('home.hero.cta_contact') }}
                            <span class="inline-block h-px w-8 bg-charcoal transition-all group-hover:w-12 group-hover:bg-brand-dark" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>

                <aside class="hidden lg:col-span-4 lg:block">
                    <dl class="space-y-8 border-l border-peach-medium/60 pl-8">
                        <div>
                            <dt class="text-xs font-medium tracking-[0.2em] text-warm-gray uppercase">{{ __('home.hero.disciplines_label') }}</dt>
                            <dd class="mt-2 font-serif text-lg text-charcoal">{{ __('home.hero.disciplines_value') }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium tracking-[0.2em] text-warm-gray uppercase">{{ __('home.hero.engagements_label') }}</dt>
                            <dd class="mt-2 font-serif text-lg text-charcoal">{{ __('home.hero.engagements_value') }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium tracking-[0.2em] text-warm-gray uppercase">{{ __('home.hero.studio_label') }}</dt>
                            <dd class="mt-2 font-serif text-lg text-charcoal">{{ __('home.hero.studio_value') }}</dd>
                        </div>
                    </dl>
                </aside>
            </div>
        </div>

        {{-- Hairline divider --}}
        <div class="relative mx-auto h-px max-w-6xl bg-peach-medium/60"></div>
    </section>

    {{-- Approach / ethos --}}
    <section class="scroll-reveal bg-warm-white px-6 py-24 sm:px-8 sm:py-28 lg:px-12 lg:py-32">
        <div class="mx-auto max-w-6xl">
            <div class="grid gap-16 lg:grid-cols-12">
                <div class="lg:col-span-4">
                    <h2 class="mt-4 font-serif text-3xl leading-tight text-charcoal sm:text-4xl">
                        {!! __('home.ethos.heading') !!}
                    </h2>
                </div>
                <div class="lg:col-span-8">
                    <p class="max-w-2xl text-base leading-relaxed text-warm-gray sm:text-lg">
                        {{ __('home.ethos.body') }}
                    </p>

                    <div class="scroll-reveal-group mt-12 grid gap-10 sm:grid-cols-3 sm:gap-8">
                        <div class="border-t border-peach-medium/60 pt-6">
                            <svg class="mt-4 size-8 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z"/>
                            </svg>
                            <h3 class="mt-3 font-serif text-lg text-charcoal">{{ __('home.ethos.research_title') }}</h3>
                            <p class="mt-2 text-sm leading-relaxed text-warm-gray">{{ __('home.ethos.research_body') }}</p>
                        </div>
                        <div class="border-t border-peach-medium/60 pt-6">
                            <svg class="mt-4 size-8 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z"/>
                            </svg>
                            <h3 class="mt-3 font-serif text-lg text-charcoal">{{ __('home.ethos.design_title') }}</h3>
                            <p class="mt-2 text-sm leading-relaxed text-warm-gray">{{ __('home.ethos.design_body') }}</p>
                        </div>
                        <div class="border-t border-peach-medium/60 pt-6">
                            <svg class="mt-4 size-8 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                            </svg>
                            <h3 class="mt-3 font-serif text-lg text-charcoal">{{ __('home.ethos.care_title') }}</h3>
                            <p class="mt-2 text-sm leading-relaxed text-warm-gray">{{ __('home.ethos.care_body') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Services --}}
    <section class="scroll-reveal border-y border-peach-medium/40 bg-cream px-6 py-24 sm:px-8 sm:py-28 lg:px-12">
        <div class="mx-auto max-w-6xl">
            <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <h2 class="mt-4 font-serif text-3xl text-charcoal sm:text-4xl">{{ __('home.services.heading') }}</h2>
                </div>
                <p class="max-w-sm text-sm leading-relaxed text-warm-gray">
                    {{ __('home.services.subtitle') }}
                </p>
            </div>

            <div class="scroll-reveal-group mt-14 grid gap-px overflow-hidden rounded-2xl border border-peach-medium/40 bg-peach-medium/40 sm:grid-cols-2 lg:grid-cols-4">
                <article class="bg-cream p-8">
                    <svg class="mt-3 size-7 text-warm-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a48.667 48.667 0 00-1.418 8.773 7.46 7.46 0 01-1.13-3.197M14.634 15.55c.007.276.018.55.035.824a7.506 7.506 0 01-6.876 3.473M12 2.25a9.75 9.75 0 00-9.75 9.75c0 3.573 1.553 6.813 4.015 9.027M12 2.25c2.605 0 4.998.89 6.914 2.37M12 2.25v19.5m0 0a9.75 9.75 0 01-9.75-9.75M12 2.25a9.75 9.75 0 009.75 9.75m-9.75 0a48.667 48.667 0 01-1.418-8.773m1.418 8.773c.364 0 .727-.027 1.088-.08M12 21.75a9.75 9.75 0 009.75-9.75M12 21.75a9.75 9.75 0 01-9.75-9.75"/>
                    </svg>
                    <h3 class="mt-4 font-serif text-xl text-charcoal">{{ __('home.services.brand_title') }}</h3>
                    <p class="mt-3 text-sm leading-relaxed text-warm-gray">{{ __('home.services.brand_body') }}</p>
                </article>
                <article class="bg-cream p-8">
                    <svg class="mt-3 size-7 text-warm-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.53 16.122a3 3 0 00-5.78 1.128 2.25 2.25 0 01-2.4 2.245 4.5 4.5 0 008.4-2.245c0-.399-.078-.78-.22-1.128zm0 0a15.998 15.998 0 003.388-1.62m-5.043-.025a15.994 15.994 0 011.622-3.395m3.42 3.42a15.995 15.995 0 004.764-4.648l3.876-5.814a1.151 1.151 0 00-1.597-1.597L14.146 6.32a15.996 15.996 0 00-4.649 4.763m3.42 3.42a6.776 6.776 0 00-3.42-3.42"/>
                    </svg>
                    <h3 class="mt-4 font-serif text-xl text-charcoal">{{ __('home.services.web_title') }}</h3>
                    <p class="mt-3 text-sm leading-relaxed text-warm-gray">{{ __('home.services.web_body') }}</p>
                </article>
                <article class="bg-cream p-8">
                    <svg class="mt-3 size-7 text-warm-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"/>
                    </svg>
                    <h3 class="mt-4 font-serif text-xl text-charcoal">{{ __('home.services.dev_title') }}</h3>
                    <p class="mt-3 text-sm leading-relaxed text-warm-gray">{{ __('home.services.dev_body') }}</p>
                </article>
                <article class="bg-cream p-8">
                    <svg class="mt-3 size-7 text-warm-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18"/>
                    </svg>
                    <h3 class="mt-4 font-serif text-xl text-charcoal">{{ __('home.services.strategy_title') }}</h3>
                    <p class="mt-3 text-sm leading-relaxed text-warm-gray">{{ __('home.services.strategy_body') }}</p>
                </article>
            </div>
        </div>
    </section>

    <section id="work" class="scroll-reveal px-6 py-24 sm:px-8 sm:py-28 lg:px-12 lg:py-32">
        <div class="mx-auto max-w-6xl">
            <div class="max-w-2xl">
                <span class="font-mono text-xs font-medium tracking-[0.2em] text-brand uppercase">{{ __('home.work.section_label') }}</span>
                <h2 class="mt-4 font-serif text-3xl text-charcoal sm:text-4xl">{{ __('home.work.heading') }}</h2>
                <p class="mt-4 text-base leading-relaxed text-warm-gray">
                    {{ __('home.work.subtitle') }}
                </p>
            </div>

            @if ($projects->count())
                <div class="scroll-reveal-group mt-14 grid gap-10 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($projects as $project)
                        <a href="{{ route('projects.show', $project) }}"
                           class="group block">
                            <div class="relative aspect-[4/3] overflow-hidden rounded-xl bg-peach/40">
                                @if ($project->imageUrl())
                                    <img src="{{ $project->imageUrl() }}"
                                         alt="{{ $project->name }}"
                                         class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-[1.03]"
                                         loading="lazy">
                                @else
                                    <div class="flex h-full w-full items-center justify-center">
                                        <span class="font-serif text-2xl text-warm-gray/40">{{ $project->name }}</span>
                                    </div>
                                @endif
                            <div class="absolute inset-0 bg-brand/30 opacity-0 transition-opacity duration-500 ease-out group-hover:opacity-100" aria-hidden="true"></div>
                            </div>
                            <div class="mt-5 flex items-start justify-between gap-4">
                                <div>
                                    <h3 class="font-serif text-lg text-charcoal transition-colors group-hover:text-brand-dark">
                                        {{ $project->name }}
                                    </h3>
                                    @if ($project->client_name)
                                        <p class="mt-1 text-xs font-medium tracking-[0.15em] text-warm-gray uppercase">
                                            {{ $project->client_name }}
                                        </p>
                                    @endif
                                </div>
                                <svg class="size-5 shrink-0 text-warm-gray/70 transition-transform duration-300 group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                                </svg>
                            </div>
                            @if ($project->description)
                                <p class="mt-3 max-w-md text-sm leading-relaxed text-warm-gray">{{ $project->excerpt(50) }}</p>
                            @endif
                        </a>
                    @endforeach
                </div>
            @else
                <div class="mt-14 rounded-xl border border-dashed border-peach-medium/60 px-8 py-20 text-center">
                    <p class="font-serif text-lg text-warm-gray/60">{{ __('home.work.loading') }}</p>
                    <p class="mt-2 text-sm text-warm-gray/50">{{ __('home.work.loading_sub') }}</p>
                </div>
            @endif

            <div class="mt-14 text-center">
                <a href="{{ route('projects.index') }}"
                   class="inline-flex items-center gap-2 rounded-full bg-charcoal px-8 py-4 text-base font-medium text-cream transition-colors hover:bg-brand-dark">
                    {{ __('home.work.view_all') }}
                    <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- Sectors / clients --}}
    <section class="scroll-reveal border-t border-peach-medium/40 bg-warm-white px-6 py-20 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-6xl">
            <div class="grid gap-12 lg:grid-cols-12">
                <div class="lg:col-span-4">
                    <h2 class="mt-4 font-serif text-2xl text-charcoal sm:text-3xl">
                        {{ __('home.sectors.heading') }}
                    </h2>
                </div>
                <ul class="scroll-reveal-group lg:col-span-8 grid grid-cols-2 gap-x-8 gap-y-4 sm:grid-cols-3">
                    <li class="border-t border-peach-medium/60 pt-4 font-serif text-lg text-charcoal">{{ __('home.sectors.hospitality') }}</li>
                    <li class="border-t border-peach-medium/60 pt-4 font-serif text-lg text-charcoal">{{ __('home.sectors.wellness') }}</li>
                    <li class="border-t border-peach-medium/60 pt-4 font-serif text-lg text-charcoal">{{ __('home.sectors.sustainability') }}</li>
                    <li class="border-t border-peach-medium/60 pt-4 font-serif text-lg text-charcoal">{{ __('home.sectors.culture') }}</li>
                    <li class="border-t border-peach-medium/60 pt-4 font-serif text-lg text-charcoal">{{ __('home.sectors.lifestyle') }}</li>
                    <li class="border-t border-peach-medium/60 pt-4 font-serif text-lg text-charcoal">{{ __('home.sectors.social_impact') }}</li>
                    <li class="border-t border-peach-medium/60 pt-4 font-serif text-lg text-charcoal">{{ __('home.sectors.education') }}</li>
                    <li class="border-t border-peach-medium/60 pt-4 font-serif text-lg text-charcoal">{{ __('home.sectors.technology') }}</li>
                    <li class="border-t border-peach-medium/60 pt-4 font-serif text-lg text-charcoal">{{ __('home.sectors.more') }}</li>
                </ul>
            </div>
        </div>
    </section>

    {{-- Contact --}}
    <section id="contact" class="scroll-reveal relative overflow-hidden bg-cream px-6 py-24 sm:px-8 sm:py-28 lg:px-12 lg:py-32">
        <div class="pointer-events-none absolute -top-32 right-0 h-96 w-96 rounded-full bg-brand/10 blur-3xl" aria-hidden="true"></div>
        <div class="pointer-events-none absolute -bottom-32 -left-24 h-80 w-80 rounded-full bg-peach/5 blur-3xl" aria-hidden="true"></div>

        <div class="relative mx-auto max-w-6xl">
            <div class="grid gap-16 lg:grid-cols-12">
                <div class="lg:col-span-5">
                    <span class="font-mono text-xs font-medium tracking-[0.2em] text-brand uppercase">{{ __('home.contact.section_label') }}</span>
                    <h2 class="mt-4 font-serif text-3xl leading-tight text-charcoal sm:text-4xl lg:text-5xl">
                        {{ __('home.contact.heading') }}
                    </h2>
                    <p class="mt-6 max-w-md text-base leading-relaxed text-warm-gray">
                        {{ __('home.contact.subtitle') }}
                    </p>

                </div>

                <div class="lg:col-span-7">
                    <div class="rounded-2xl border border-charcoal/10 bg-charcoal/[0.04] p-8 backdrop-blur-sm sm:p-10">
                        <livewire:contact-form />
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
