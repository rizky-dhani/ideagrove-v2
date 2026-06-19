<div>
    {{-- Hero --}}
    <section class="relative overflow-hidden bg-gradient-to-b from-charcoal to-charcoal-soft px-6 pt-24 pb-20 sm:px-8 lg:px-12">
        <div class="pointer-events-none absolute -top-24 -right-24 size-96 rounded-full bg-brand/10 blur-3xl" aria-hidden="true"></div>
        <div class="mx-auto max-w-4xl">
            <a href="{{ route('projects.index') }}" class="mb-8 inline-flex items-center gap-2 text-sm text-cream/60 transition-colors hover:text-cream">
                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
                </svg>
                Back to work
            </a>

            @if ($project->client_name)
                <p class="mb-4 text-sm font-medium tracking-widest text-brand-light uppercase">{{ $project->client_name }}</p>
            @endif

            <h1 class="font-serif text-3xl leading-tight text-cream sm:text-4xl lg:text-5xl">{{ $project->name }}</h1>
        </div>
    </section>

    {{-- Content --}}
    <section class="px-6 py-20 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-4xl">
            @if ($project->imageUrl())
                <div class="mb-12 overflow-hidden rounded-2xl border border-peach-medium/30">
                    <img src="{{ $project->imageUrl() }}"
                         alt="{{ $project->name }}"
                         class="h-auto w-full object-cover"
                         loading="eager">
                </div>
            @endif

            @if ($project->description)
                <div class="prose prose-gray mx-auto max-w-2xl text-base leading-relaxed text-warm-gray">
                    {{ $project->description }}
                </div>
            @endif
        </div>
    </section>

    {{-- Nav --}}
    <section class="border-t border-peach px-6 py-16 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-4xl">
            <a href="{{ route('projects.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-charcoal-soft transition-colors hover:text-brand">
                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
                </svg>
                All work
            </a>
        </div>
    </section>
</div>
