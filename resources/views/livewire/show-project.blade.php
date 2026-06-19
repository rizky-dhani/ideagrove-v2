<div>
    {{-- Hero --}}
    <section class="relative overflow-hidden bg-cream px-6 py-10 sm:px-8 lg:px-12">
        <div class="pointer-events-none absolute -top-24 -right-24 size-96 rounded-full bg-brand/10 blur-3xl" aria-hidden="true"></div>
        <div class="mx-auto flex max-w-4xl flex-col gap-6 sm:flex-row sm:items-start sm:justify-between">
            <a href="{{ route('projects.index') }}" class="inline-flex shrink-0 items-center gap-2 text-sm text-warm-gray/60 transition-colors hover:text-charcoal dark:text-warm-gray/80 dark:hover:text-white">
                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
                </svg>
                Back to work
            </a>

            <div class="text-left sm:text-right">
                @if ($project->client_name)
                    <p class="mb-2 text-sm font-medium tracking-widest text-brand-light uppercase">{{ $project->client_name }}</p>
                @endif

                <h1 class="font-serif text-3xl leading-tight text-charcoal sm:text-4xl lg:text-5xl">{{ $project->name }}</h1>
            </div>
        </div>
    </section>

    {{-- Content --}}
    <section class="px-6 py-20 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-4xl">
            @if ($project->description)
                <div class="grid gap-12 md:grid-cols-10">
                    @if ($project->imageUrl())
                        <div class="mb-4 w-full overflow-hidden rounded-2xl border border-peach-medium/30 aspect-video md:col-span-7 md:row-start-1">
                            <img src="{{ $project->imageUrl() }}"
                                 alt="{{ $project->name }}"
                                 class="h-full w-full object-cover"
                                 loading="eager">
                        </div>
                    @endif

                    {{-- Description --}}
                    <div class="prose prose-gray text-base leading-relaxed text-warm-gray md:col-span-7 md:row-start-2">
                        {{ $project->description }}
                    </div>

                    {{-- Sidebar --}}
                    <div class="space-y-8 md:col-span-3 md:col-start-8 md:row-start-1">
                        @if ($project->client_name)
                            <div>
                                <p class="mb-1 text-xs font-medium tracking-widest text-brand-light uppercase">Client</p>
                                <p class="text-lg text-charcoal-soft">{{ $project->client_name }}</p>
                            </div>
                        @endif

                        <div>
                            <p class="mb-1 text-xs font-medium tracking-widest text-brand-light uppercase">Project</p>
                            <p class="text-lg text-charcoal-soft">{{ $project->name }}</p>
                        </div>

                        @if ($project->web_url)
                            <a href="{{ $project->web_url }}"
                               target="_blank" rel="noopener noreferrer"
                               class="inline-flex w-full items-center justify-center gap-2 rounded-full bg-charcoal px-6 py-3 text-sm font-medium text-cream transition-colors hover:bg-charcoal-soft">
                                Visit site
                                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </section>

</div>
