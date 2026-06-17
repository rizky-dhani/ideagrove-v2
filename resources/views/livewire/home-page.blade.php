<div>
    {{-- Hero --}}
    <section class="relative overflow-hidden bg-gradient-to-b from-charcoal to-charcoal-soft px-6 pt-24 pb-32 sm:px-8 lg:px-12">
        {{-- Decorative brand blobs --}}
        <div class="pointer-events-none absolute -top-24 -right-24 size-96 rounded-full bg-brand/10 blur-3xl" aria-hidden="true"></div>
        <div class="pointer-events-none absolute -bottom-32 -left-32 size-[30rem] rounded-full bg-peach/10 blur-3xl" aria-hidden="true"></div>

        <div class="mx-auto max-w-6xl">
            <div class="max-w-2xl">
                <span class="mb-6 inline-flex items-center gap-2 rounded-full border border-cream/20 bg-cream/10 px-4 py-1.5 text-xs font-medium tracking-wider text-cream/80 uppercase">
                    <span class="inline-block size-1.5 rounded-full bg-brand"></span>
                    Bali-based digital studio
                </span>

                <h1 class="font-serif text-4xl leading-tight text-cream sm:text-5xl lg:text-6xl">
                    We grow
                    <span class="text-brand-light">ideas</span>
                    into digital
                    <span class="block">experiences.</span>
                </h1>

                <p class="mt-6 max-w-lg text-base leading-relaxed text-cream/70 sm:text-lg">
                    The Idea Grove Studio is a small, focused team crafting thoughtful websites, apps, and brand identities from our studio in Bali.
                </p>

                <div class="mt-10 flex flex-wrap gap-4">
                    <a href="#projects" class="inline-flex items-center gap-2 rounded-full border border-cream/30 bg-cream px-6 py-3 text-sm font-medium text-charcoal transition-all hover:bg-cream/90 hover:shadow-lg">
                        See our work
                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </a>
                    <a href="#contact" class="inline-flex items-center gap-2 rounded-full border border-cream/20 px-6 py-3 text-sm font-medium text-cream/80 transition-all hover:border-cream/40 hover:text-cream">
                        Let's talk
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Ethos / tagline strip --}}
    <section class="border-b border-peach bg-cream px-6 py-16 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-6xl">
            <div class="grid gap-8 sm:grid-cols-3">
                <div class="space-y-2">
                    <span class="font-mono text-xs font-medium tracking-widest text-brand uppercase">01</span>
                    <h3 class="font-serif text-xl text-charcoal">Purpose-driven</h3>
                    <p class="text-sm leading-relaxed text-warm-gray">We don't build for the sake of building. Every project starts with a question worth answering.</p>
                </div>
                <div class="space-y-2">
                    <span class="font-mono text-xs font-medium tracking-widest text-brand uppercase">02</span>
                    <h3 class="font-serif text-xl text-charcoal">Crafted in Bali</h3>
                    <p class="text-sm leading-relaxed text-warm-gray">Our island shapes how we think — slow, intentional, connected to nature and culture.</p>
                </div>
                <div class="space-y-2">
                    <span class="font-mono text-xs font-medium tracking-widest text-brand uppercase">03</span>
                    <h3 class="font-serif text-xl text-charcoal">End-to-end</h3>
                    <p class="text-sm leading-relaxed text-warm-gray">Strategy, design, and development under one roof. No handoffs, no friction.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Projects --}}
    <section id="projects" class="px-6 py-24 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-6xl">
            <div class="mb-16">
                <span class="font-mono text-xs font-medium tracking-widest text-brand uppercase">/projects</span>
                <h2 class="mt-3 font-serif text-3xl text-charcoal sm:text-4xl">What we've been growing</h2>
                <p class="mt-3 max-w-lg text-sm leading-relaxed text-warm-gray">A selection of recent work from our studio.</p>
            </div>

            @if ($projects->count())
                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($projects as $project)
                        <a href="{{ route('projects.show', $project) }}"
                           class="group relative flex flex-col overflow-hidden rounded-2xl border border-peach-medium/40 bg-cream transition-all hover:-translate-y-1 hover:shadow-lg">
                            @if ($project->imageUrl())
                                <div class="aspect-[16/9] overflow-hidden">
                                    <img src="{{ $project->imageUrl() }}"
                                         alt="{{ $project->name }}"
                                         class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                         loading="lazy">
                                </div>
                            @endif
                            <div class="flex flex-1 flex-col p-6 pt-5">
                                <div class="mb-3 flex items-start justify-between">
                                    <span class="inline-block rounded-full bg-brand/10 px-3 py-1 text-xs font-medium text-brand">{{ $project->client_name ?: 'Project' }}</span>
                                    <svg class="size-5 shrink-0 text-peach-medium transition-all group-hover:translate-x-1 group-hover:-translate-y-1 group-hover:text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </div>
                                <h3 class="font-serif text-lg text-charcoal">{{ $project->name }}</h3>
                                @if ($project->description)
                                    <p class="mt-2 line-clamp-2 text-sm leading-relaxed text-warm-gray">{{ $project->description }}</p>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="rounded-2xl border border-dashed border-peach-medium/40 px-8 py-16 text-center">
                    <p class="font-serif text-lg text-warm-gray/50">No projects yet — the grove is still growing.</p>
                    <p class="mt-2 text-sm text-warm-gray/40">Check back soon.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- Contact section --}}
    <section id="contact" class="bg-gradient-to-b from-charcoal to-charcoal-soft px-6 py-24 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-6xl">
            <div class="mx-auto max-w-2xl">
                <div class="text-center">
                    <span class="font-mono text-xs font-medium tracking-widest text-brand-light uppercase">/connect</span>
                    <h2 class="mt-3 font-serif text-3xl text-cream sm:text-4xl">Have an idea?</h2>
                    <p class="mt-4 text-sm leading-relaxed text-cream/70">
                        Whether you're starting from scratch or rethinking something existing, we'd love to hear about it.
                    </p>
                </div>
                <div class="mt-10 rounded-2xl border border-cream/10 bg-cream/5 p-8 backdrop-blur-sm">
                    <livewire:contact-form />
                </div>
            </div>
        </div>
    </section>
</div>