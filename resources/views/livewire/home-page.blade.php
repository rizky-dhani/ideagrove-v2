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
                        <span>Bali &mdash; est. 2019</span>
                    </div>

                    <h1 class="mt-8 font-serif text-[2.75rem] leading-[1.05] text-charcoal sm:text-6xl lg:text-[5.25rem]">
                        A small studio for
                        <span class="italic text-brand-dark">considered</span>
                        digital work.
                    </h1>

                    <p class="mt-8 max-w-xl text-base leading-relaxed text-warm-gray sm:text-lg">
                        We design and build brand identities, websites, and applications for organisations that take their craft seriously &mdash; from boutique hospitality to climate, wellness, and culture.
                    </p>

                    <div class="mt-10 flex flex-wrap items-center gap-x-6 gap-y-4">
                        <a href="#work" class="inline-flex items-center gap-2 rounded-full bg-charcoal px-6 py-3 text-sm font-medium text-cream transition-colors hover:bg-brand-dark">
                            Selected work
                            <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                        <a href="#contact" class="group inline-flex items-center gap-2 text-sm font-medium text-charcoal transition-colors hover:text-brand-dark">
                            Start a conversation
                            <span class="inline-block h-px w-8 bg-charcoal transition-all group-hover:w-12 group-hover:bg-brand-dark" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>

                <aside class="hidden lg:col-span-4 lg:block">
                    <dl class="space-y-8 border-l border-peach-medium/60 pl-8">
                        <div>
                            <dt class="text-xs font-medium tracking-[0.2em] text-warm-gray uppercase">Disciplines</dt>
                            <dd class="mt-2 font-serif text-lg text-charcoal">Brand&nbsp;&middot;&nbsp;Web&nbsp;&middot;&nbsp;Product</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium tracking-[0.2em] text-warm-gray uppercase">Engagements</dt>
                            <dd class="mt-2 font-serif text-lg text-charcoal">Project &amp; retainer</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium tracking-[0.2em] text-warm-gray uppercase">Studio</dt>
                            <dd class="mt-2 font-serif text-lg text-charcoal">Dalung, Bali</dd>
                        </div>
                    </dl>
                </aside>
            </div>
        </div>

        {{-- Hairline divider --}}
        <div class="relative mx-auto h-px max-w-6xl bg-peach-medium/60"></div>
    </section>

    {{-- Approach / ethos --}}
    <section class="bg-warm-white px-6 py-24 sm:px-8 sm:py-28 lg:px-12 lg:py-32">
        <div class="mx-auto max-w-6xl">
            <div class="grid gap-16 lg:grid-cols-12">
                <div class="lg:col-span-4">
                    <span class="font-mono text-xs font-medium tracking-[0.2em] text-brand uppercase">/approach</span>
                    <h2 class="mt-4 font-serif text-3xl leading-tight text-charcoal sm:text-4xl">
                        Quiet craft.<br>Lasting work.
                    </h2>
                </div>
                <div class="lg:col-span-8">
                    <p class="max-w-2xl text-base leading-relaxed text-warm-gray sm:text-lg">
                        We move slowly on purpose. Every engagement begins with listening &mdash; to the founders, the customers, the place. The work that follows is shaped by what we hear, not by trend or template. The result is digital work that feels rooted, considered, and built to last.
                    </p>

                    <div class="mt-12 grid gap-10 sm:grid-cols-3 sm:gap-8">
                        <div class="border-t border-peach-medium/60 pt-6">
                            <span class="font-mono text-xs font-medium tracking-[0.2em] text-brand uppercase">01 &mdash; Listen</span>
                            <h3 class="mt-3 font-serif text-lg text-charcoal">Research first</h3>
                            <p class="mt-2 text-sm leading-relaxed text-warm-gray">We start with conversations and study, not wireframes. Strategy grows from what we learn.</p>
                        </div>
                        <div class="border-t border-peach-medium/60 pt-6">
                            <span class="font-mono text-xs font-medium tracking-[0.2em] text-brand uppercase">02 &mdash; Make</span>
                            <h3 class="mt-3 font-serif text-lg text-charcoal">Design &amp; build</h3>
                            <p class="mt-2 text-sm leading-relaxed text-warm-gray">Design and engineering sit together, so the vision survives the build.</p>
                        </div>
                        <div class="border-t border-peach-medium/60 pt-6">
                            <span class="font-mono text-xs font-medium tracking-[0.2em] text-brand uppercase">03 &mdash; Tend</span>
                            <h3 class="mt-3 font-serif text-lg text-charcoal">Long-term care</h3>
                            <p class="mt-2 text-sm leading-relaxed text-warm-gray">We stay close after launch &mdash; refining, extending, and protecting the work.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Services --}}
    <section class="border-y border-peach-medium/40 bg-cream px-6 py-24 sm:px-8 sm:py-28 lg:px-12">
        <div class="mx-auto max-w-6xl">
            <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <span class="font-mono text-xs font-medium tracking-[0.2em] text-brand uppercase">/services</span>
                    <h2 class="mt-4 font-serif text-3xl text-charcoal sm:text-4xl">What we do</h2>
                </div>
                <p class="max-w-sm text-sm leading-relaxed text-warm-gray">
                    End-to-end capability under one roof, so nothing is lost in handoff.
                </p>
            </div>

            <div class="mt-14 grid gap-px overflow-hidden rounded-2xl border border-peach-medium/40 bg-peach-medium/40 sm:grid-cols-2 lg:grid-cols-4">
                <article class="bg-cream p-8">
                    <span class="font-mono text-xs font-medium tracking-[0.2em] text-warm-gray uppercase">01</span>
                    <h3 class="mt-4 font-serif text-xl text-charcoal">Brand identity</h3>
                    <p class="mt-3 text-sm leading-relaxed text-warm-gray">Naming, marks, type, colour systems, and the guidelines that hold them together.</p>
                </article>
                <article class="bg-cream p-8">
                    <span class="font-mono text-xs font-medium tracking-[0.2em] text-warm-gray uppercase">02</span>
                    <h3 class="mt-4 font-serif text-xl text-charcoal">Web design</h3>
                    <p class="mt-3 text-sm leading-relaxed text-warm-gray">Marketing sites, editorial platforms, and product interfaces designed with intent.</p>
                </article>
                <article class="bg-cream p-8">
                    <span class="font-mono text-xs font-medium tracking-[0.2em] text-warm-gray uppercase">03</span>
                    <h3 class="mt-4 font-serif text-xl text-charcoal">Web development</h3>
                    <p class="mt-3 text-sm leading-relaxed text-warm-gray">Hand-crafted, performant builds &mdash; typically Laravel &amp; Filament, occasionally bespoke.</p>
                </article>
                <article class="bg-cream p-8">
                    <span class="font-mono text-xs font-medium tracking-[0.2em] text-warm-gray uppercase">04</span>
                    <h3 class="mt-4 font-serif text-xl text-charcoal">Digital strategy</h3>
                    <p class="mt-3 text-sm leading-relaxed text-warm-gray">Positioning, content systems, and roadmaps that align digital work with the business.</p>
                </article>
            </div>
        </div>
    </section>

    {{-- Selected work / projects --}}
    <section id="work" class="px-6 py-24 sm:px-8 sm:py-28 lg:px-12 lg:py-32">
        <div class="mx-auto max-w-6xl">
            <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <span class="font-mono text-xs font-medium tracking-[0.2em] text-brand uppercase">/selected work</span>
                    <h2 class="mt-4 font-serif text-3xl text-charcoal sm:text-4xl">Recent projects</h2>
                </div>
                <p class="max-w-sm text-sm leading-relaxed text-warm-gray">
                    A small selection of recent engagements. A longer list is available on request.
                </p>
            </div>

            @if ($projects->count())
                <div class="mt-14 grid gap-10 sm:grid-cols-2 lg:grid-cols-3">
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
                                <span class="font-mono text-xs tracking-[0.15em] text-warm-gray/70 uppercase shrink-0" aria-hidden="true">
                                    &rarr;
                                </span>
                            </div>
                            @if ($project->description)
                                <p class="mt-3 max-w-md text-sm leading-relaxed text-warm-gray">{{ $project->description }}</p>
                            @endif
                        </a>
                    @endforeach
                </div>
            @else
                <div class="mt-14 rounded-xl border border-dashed border-peach-medium/60 px-8 py-20 text-center">
                    <p class="font-serif text-lg text-warm-gray/60">The portfolio is being curated.</p>
                    <p class="mt-2 text-sm text-warm-gray/50">Selected work will appear here shortly.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- Sectors / clients --}}
    <section class="border-t border-peach-medium/40 bg-warm-white px-6 py-20 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-6xl">
            <div class="grid gap-12 lg:grid-cols-12">
                <div class="lg:col-span-4">
                    <span class="font-mono text-xs font-medium tracking-[0.2em] text-brand uppercase">/sectors</span>
                    <h2 class="mt-4 font-serif text-2xl text-charcoal sm:text-3xl">
                        We work with founders in
                    </h2>
                </div>
                <ul class="lg:col-span-8 grid grid-cols-2 gap-x-8 gap-y-4 sm:grid-cols-3">
                    <li class="border-t border-peach-medium/60 pt-4 font-serif text-lg text-charcoal">Hospitality</li>
                    <li class="border-t border-peach-medium/60 pt-4 font-serif text-lg text-charcoal">Wellness</li>
                    <li class="border-t border-peach-medium/60 pt-4 font-serif text-lg text-charcoal">Sustainability</li>
                    <li class="border-t border-peach-medium/60 pt-4 font-serif text-lg text-charcoal">Culture &amp; arts</li>
                    <li class="border-t border-peach-medium/60 pt-4 font-serif text-lg text-charcoal">Lifestyle</li>
                    <li class="border-t border-peach-medium/60 pt-4 font-serif text-lg text-charcoal">Social impact</li>
                </ul>
            </div>
        </div>
    </section>

    {{-- Contact --}}
    <section id="contact" class="relative overflow-hidden bg-cream px-6 py-24 sm:px-8 sm:py-28 lg:px-12 lg:py-32">
        <div class="pointer-events-none absolute -top-32 right-0 h-96 w-96 rounded-full bg-brand/10 blur-3xl" aria-hidden="true"></div>
        <div class="pointer-events-none absolute -bottom-32 -left-24 h-80 w-80 rounded-full bg-peach/5 blur-3xl" aria-hidden="true"></div>

        <div class="relative mx-auto max-w-6xl">
            <div class="grid gap-16 lg:grid-cols-12">
                <div class="lg:col-span-5">
                    <span class="font-mono text-xs font-medium tracking-[0.2em] text-brand uppercase">/contact</span>
                    <h2 class="mt-4 font-serif text-3xl leading-tight text-charcoal sm:text-4xl lg:text-5xl">
                        Have a project in mind?
                    </h2>
                    <p class="mt-6 max-w-md text-base leading-relaxed text-warm-gray">
                        We take on a small number of new engagements each quarter. If you&rsquo;re working on something meaningful, we&rsquo;d love to hear about it.
                    </p>

                    <div class="mt-10 space-y-3 text-sm text-warm-gray">
                        <p>
                            <span class="block text-xs font-medium tracking-[0.2em] text-warm-gray uppercase">Studio</span>
                            Dalung, Bali &middot; GMT+8
                        </p>
                        <p>
                            <span class="block text-xs font-medium tracking-[0.2em] text-warm-gray uppercase">Availability</span>
                            Currently full — accepting enquiries for late {{ now()->addMonths(4)->format('F') }}
                        </p>
                    </div>
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
