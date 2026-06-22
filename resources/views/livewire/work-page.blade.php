<div>
    {{-- Hero --}}
    <section class="relative overflow-hidden bg-cream px-6 pt-24 pb-20 sm:px-8 lg:px-12">
        <div class="pointer-events-none absolute -top-24 -right-24 size-96 rounded-full bg-brand/10 blur-3xl" aria-hidden="true"></div>
        <div class="mx-auto max-w-6xl">
            <span class="font-mono text-xs font-medium tracking-[0.2em] text-brand-light uppercase">{{ __('work.hero.section_label') }}</span>
            <h1 class="mt-4 font-serif text-3xl leading-tight text-charcoal sm:text-4xl lg:text-5xl">{{ __('work.hero.heading') }}</h1>
            <p class="mt-4 max-w-xl text-base leading-relaxed text-warm-gray">{{ __('work.hero.subtitle') }}</p>
        </div>
    </section>

    {{-- Controls bar --}}
    <section class="sticky top-20 z-40 border-b border-peach bg-warm-white/90 backdrop-blur-md">
        <div class="mx-auto flex max-w-6xl items-center justify-between gap-4 px-6 py-4 sm:px-8 lg:px-12">
            <div class="flex items-center gap-4">
                {{-- Sort --}}
                <div class="flex items-center gap-2">
                    <label for="sort" class="text-xs font-medium tracking-[0.1em] text-warm-gray uppercase">{{ __('work.controls.sort') }}</label>
                    <select id="sort"
                            wire:model.live="sort"
                            class="rounded-lg border border-peach bg-warm-white px-4 py-2 text-sm text-charcoal focus:border-brand focus:ring-1 focus:ring-brand/30">
                        <option value="latest">{{ __('work.controls.sort_latest') }}</option>
                        <option value="oldest">{{ __('work.controls.sort_oldest') }}</option>
                        <option value="name_asc">{{ __('work.controls.sort_name_asc') }}</option>
                        <option value="name_desc">{{ __('work.controls.sort_name_desc') }}</option>
                    </select>
                </div>

                {{-- Per page --}}
                <div class="hidden items-center gap-2 sm:flex">
                    <label for="perPage" class="text-xs font-medium tracking-[0.1em] text-warm-gray uppercase">{{ __('work.controls.show') }}</label>
                    <select id="perPage"
                            wire:model.live="perPage"
                            class="rounded-lg border border-peach bg-warm-white px-4 py-2 text-sm text-charcoal focus:border-brand focus:ring-1 focus:ring-brand/30">
                        <option value="12">12</option>
                        <option value="24">24</option>
                        <option value="48">48</option>
                    </select>
                </div>
            </div>

            {{-- Layout toggle --}}
            <div class="flex items-center gap-1 rounded-lg border border-peach bg-warm-white p-1">
                <button wire:click="$set('layout', 'grid')"
                        class="rounded-md p-2 transition-colors {{ $layout === 'grid' ? 'bg-charcoal text-cream' : 'text-warm-gray hover:text-charcoal' }}"
                        aria-label="{{ __('work.controls.grid_aria') }}">
                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
                    </svg>
                </button>
                <button wire:click="$set('layout', 'list')"
                        class="rounded-md p-2 transition-colors {{ $layout === 'list' ? 'bg-charcoal text-cream' : 'text-warm-gray hover:text-charcoal' }}"
                        aria-label="{{ __('work.controls.list_aria') }}">
                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5"/>
                    </svg>
                </button>
            </div>
        </div>
    </section>

    {{-- Projects --}}
    <section class="px-6 py-12 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-6xl">
            @if ($projects->count())
                {{-- Grid layout --}}
                @if ($layout === 'grid')
                    <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3">
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
                @endif

                {{-- List layout --}}
                @if ($layout === 'list')
                    <div class="space-y-8">
                        @foreach ($projects as $project)
                            <a href="{{ route('projects.show', $project) }}"
                               class="group flex flex-col gap-6 rounded-xl border border-peach-medium/40 bg-warm-white p-4 transition-shadow hover:shadow-md sm:flex-row">
                                <div class="relative aspect-[4/3] w-full shrink-0 overflow-hidden rounded-lg bg-peach/40 sm:w-72">
                                    @if ($project->imageUrl())
                                        <img src="{{ $project->imageUrl() }}"
                                             alt="{{ $project->name }}"
                                             class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-[1.03]"
                                             loading="lazy">
                                    @else
                                        <div class="flex h-full w-full items-center justify-center">
                                            <span class="font-serif text-xl text-warm-gray/40">{{ $project->name }}</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex flex-1 flex-col justify-center py-2">
                                    <div class="flex items-start justify-between gap-4">
                                        <div>
                                            <h3 class="font-serif text-xl text-charcoal transition-colors group-hover:text-brand-dark">
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
                                        <p class="mt-3 max-w-lg text-sm leading-relaxed text-warm-gray">{{ $project->excerpt(50) }}</p>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif

                {{-- Pagination --}}
                <div class="mt-14">
                    {{ $projects->links() }}
                </div>
            @else
                <div class="rounded-xl border border-dashed border-peach-medium/60 px-8 py-20 text-center">
                    @php
                        $returnHomeLink = '<a href="' . route('home') . '" class="text-brand underline underline-offset-2 hover:text-brand-dark">' . __('work.empty.return_home') . '</a>';
                    @endphp
                    <p class="font-serif text-lg text-warm-gray/60">{{ __('work.empty.heading') }}</p>
                    <p class="mt-2 text-sm text-warm-gray/50">{!! __('work.empty.body', ['link' => $returnHomeLink]) !!}</p>
                </div>
            @endif
        </div>
    </section>
</div>
