<div>
    {{-- Hero --}}
    <section class="relative overflow-hidden bg-cream px-6 pt-24 pb-20 sm:px-8 lg:px-12">
        <div class="pointer-events-none absolute -top-24 -right-24 size-96 rounded-full bg-brand/10 blur-3xl" aria-hidden="true"></div>
        <div class="mx-auto max-w-6xl">
            <span class="font-mono text-xs font-medium tracking-[0.2em] text-brand-light uppercase">{{ __('posts.hero.section_label') }}</span>
            <h1 class="mt-4 font-serif text-3xl leading-tight text-charcoal sm:text-4xl lg:text-5xl">{{ __('posts.hero.heading') }}</h1>
            <p class="mt-4 max-w-xl text-base leading-relaxed text-warm-gray">{{ __('posts.hero.subtitle') }}</p>
        </div>
    </section>

    {{-- Controls bar --}}
    <section class="sticky top-20 z-40 border-b border-peach bg-warm-white/90 backdrop-blur-md">
        <div class="mx-auto flex max-w-6xl flex-col gap-4 px-6 py-4 sm:flex-row sm:items-end sm:justify-between sm:px-8 lg:px-12">
            <div class="flex flex-wrap items-end gap-4">
                <div class="flex flex-col gap-1">
                    <label for="category" class="text-xs font-medium tracking-[0.1em] text-warm-gray uppercase">{{ __('posts.controls.category') }}</label>
                    <select id="category" wire:model.live="category" class="rounded-lg border border-peach bg-warm-white px-4 py-2 text-sm text-charcoal focus:border-brand focus:ring-1 focus:ring-brand/30">
                        <option value="">{{ __('posts.controls.all_categories') }}</option>
                        @foreach ($categories as $option)
                            <option value="{{ $option->slug }}">{{ $option->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col gap-1">
                    <label for="tag" class="text-xs font-medium tracking-[0.1em] text-warm-gray uppercase">{{ __('posts.controls.tag') }}</label>
                    <select id="tag" wire:model.live="tag" class="rounded-lg border border-peach bg-warm-white px-4 py-2 text-sm text-charcoal focus:border-brand focus:ring-1 focus:ring-brand/30">
                        <option value="">{{ __('posts.controls.all_tags') }}</option>
                        @foreach ($tags as $option)
                            <option value="{{ $option->slug }}">{{ $option->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col gap-1">
                    <label for="sort" class="text-xs font-medium tracking-[0.1em] text-warm-gray uppercase">{{ __('posts.controls.sort') }}</label>
                    <select id="sort" wire:model.live="sort" class="rounded-lg border border-peach bg-warm-white px-4 py-2 text-sm text-charcoal focus:border-brand focus:ring-1 focus:ring-brand/30">
                        <option value="latest">{{ __('posts.controls.sort_latest') }}</option>
                        <option value="oldest">{{ __('posts.controls.sort_oldest') }}</option>
                    </select>
                </div>
            </div>

            <div class="flex flex-col gap-1 sm:w-64">
                <label for="q" class="text-xs font-medium tracking-[0.1em] text-warm-gray uppercase">{{ __('posts.controls.search') }}</label>
                <input id="q" type="search" wire:model.live.debounce.400ms="q" placeholder="{{ __('posts.controls.search_placeholder') }}" class="rounded-lg border border-peach bg-warm-white px-4 py-2 text-sm text-charcoal focus:border-brand focus:ring-1 focus:ring-brand/30">
            </div>
        </div>
    </section>

    {{-- Grid --}}
    <section class="px-6 py-16 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-6xl">
            @if ($posts->isEmpty())
                <div class="rounded-xl border border-peach-medium/40 bg-warm-white px-6 py-16 text-center">
                    <h2 class="font-serif text-2xl text-charcoal">{{ __('posts.empty.heading') }}</h2>
                    <p class="mt-3 text-sm text-warm-gray">
                        {!! __('posts.empty.body', ['link' => '<a href="'.route('home').'" class="text-brand-dark underline">'.__('posts.empty.return_home').'</a>']) !!}
                    </p>
                </div>
            @else
                <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($posts as $post)
                        <a href="{{ route('posts.show', $post->slug) }}" class="group block">
                            <div class="relative aspect-[4/3] overflow-hidden rounded-xl bg-peach/40">
                                @if ($post->coverImageUrl())
                                    <img src="{{ $post->coverImageUrl() }}" alt="{{ $post->title }}" class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-[1.03]" loading="lazy">
                                @else
                                    <div class="flex h-full w-full items-center justify-center">
                                        <span class="font-serif text-xl text-warm-gray/40">{{ $post->title }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="mt-5">
                                @if ($post->category)
                                    <p class="text-xs font-medium tracking-[0.15em] text-brand-light uppercase">{{ $post->category->name }}</p>
                                @endif
                                <h2 class="mt-2 font-serif text-lg text-charcoal transition-colors group-hover:text-brand-dark">{{ $post->title }}</h2>
                                <p class="mt-3 text-sm leading-relaxed text-warm-gray">{{ $post->excerpt(24) }}</p>
                                <p class="mt-4 font-mono text-xs tracking-[0.1em] text-warm-gray/70 uppercase">
                                    @if ($post->published_at){{ $post->published_at->format('j M Y') }} &middot; @endif{{ __('posts.card.reading_time', ['minutes' => $post->readingTime()]) }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>

                @if ($posts->hasPages())
                    <div class="mt-14 flex items-center justify-between border-t border-peach pt-8">
                        @if ($posts->onFirstPage())
                            <span class="text-sm text-warm-gray/50">{{ __('posts.pagination.previous') }}</span>
                        @else
                            <a href="{{ $posts->previousPageUrl() }}" class="text-sm text-brand-dark transition-colors hover:text-brand">{{ __('posts.pagination.previous') }}</a>
                        @endif

                        @if ($posts->hasMorePages())
                            <a href="{{ $posts->nextPageUrl() }}" class="text-sm text-brand-dark transition-colors hover:text-brand">{{ __('posts.pagination.next') }}</a>
                        @else
                            <span class="text-sm text-warm-gray/50">{{ __('posts.pagination.next') }}</span>
                        @endif
                    </div>
                @endif
            @endif
        </div>
    </section>
</div>
