<div>
    {{-- Hero --}}
    <section class="relative overflow-hidden bg-cream px-6 pt-16 pb-12 sm:px-8 lg:px-12">
        <div class="pointer-events-none absolute -top-24 -right-24 size-96 rounded-full bg-brand/10 blur-3xl" aria-hidden="true"></div>
        <div class="mx-auto max-w-3xl">
            <a href="{{ route('posts.index') }}" class="inline-flex items-center gap-2 text-sm text-warm-gray transition-colors hover:text-charcoal">
                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
                </svg>
                {{ __('posts.show.back') }}
            </a>

            @if ($post->category)
                <a href="{{ route('posts.index', ['category' => $post->category->slug]) }}" class="mt-8 inline-block text-xs font-medium tracking-[0.2em] text-brand-dark uppercase transition-colors hover:text-brand">{{ $post->category->name }}</a>
            @endif
            <h1 class="mt-4 font-serif text-3xl leading-tight text-charcoal sm:text-4xl lg:text-5xl">{{ $post->title }}</h1>

            <p class="mt-6 font-mono text-xs tracking-[0.1em] text-warm-gray uppercase">
                @if ($post->author){{ __('posts.show.by') }} {{ $post->author->name }} &middot; @endif
                @if ($post->published_at){{ $post->published_at->format('j M Y') }} &middot; @endif
                {{ __('posts.show.reading_time', ['minutes' => $post->readingTime()]) }}
            </p>
        </div>
    </section>

    {{-- Cover --}}
    @if ($post->coverImageUrl())
        <section class="px-6 sm:px-8 lg:px-12">
            <div class="mx-auto max-w-4xl overflow-hidden rounded-2xl border border-peach-medium/30">
                <img src="{{ $post->coverImageUrl() }}" alt="{{ $post->title }}" class="aspect-video w-full object-cover" loading="eager">
            </div>
        </section>
    @endif

    {{-- Body --}}
    <section class="px-6 py-16 sm:px-8 lg:px-12">
        <article class="prose prose-lg mx-auto max-w-3xl text-base leading-relaxed text-charcoal-soft">
            {!! \Illuminate\Support\Str::sanitizeHtml($post->body) !!}
        </article>

        @if ($post->tags->isNotEmpty())
            <div class="mx-auto mt-12 flex max-w-3xl flex-wrap items-center gap-3 border-t border-peach pt-8">
                <span class="text-xs font-medium tracking-[0.15em] text-warm-gray uppercase">{{ __('posts.show.tags') }}</span>
                @foreach ($post->tags as $tag)
                    <a href="{{ route('posts.index', ['tag' => $tag->slug]) }}" class="rounded-full border border-peach-medium/60 px-3 py-1 text-xs text-warm-gray transition-colors hover:border-brand hover:text-brand-dark">{{ $tag->name }}</a>
                @endforeach
            </div>
        @endif
    </section>

    {{-- Related --}}
    @if ($related->isNotEmpty())
        <section class="border-t border-peach bg-cream px-6 py-16 sm:px-8 lg:px-12">
            <div class="mx-auto max-w-6xl">
                <h2 class="font-serif text-2xl text-charcoal">{{ __('posts.show.related') }}</h2>
                <div class="mt-8 grid gap-10 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($related as $item)
                        <a href="{{ route('posts.show', $item->slug) }}" class="group block">
                            <div class="relative aspect-[4/3] overflow-hidden rounded-xl bg-peach/40">
                                @if ($item->coverImageUrl())
                                    <img src="{{ $item->coverImageUrl() }}" alt="{{ $item->title }}" class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-[1.03]" loading="lazy">
                                @else
                                    <div class="flex h-full w-full items-center justify-center">
                                        <span class="font-serif text-lg text-warm-gray/40">{{ $item->title }}</span>
                                    </div>
                                @endif
                            </div>
                            <h3 class="mt-4 font-serif text-lg text-charcoal transition-colors group-hover:text-brand-dark">{{ $item->title }}</h3>
                            <p class="mt-2 text-sm leading-relaxed text-warm-gray">{{ $item->excerpt(18) }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</div>
