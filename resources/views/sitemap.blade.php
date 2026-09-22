<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xhtml="http://www.w3.org/1999/xhtml">
    {{-- Home pages --}}
    @foreach ($locales as $locale)
        <url>
            <loc>{{ url('/' . $locale) }}</loc>
            <lastmod>{{ $lastModified }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>1.0</priority>
            @foreach ($locales as $alt)
                <xhtml:link rel="alternate" hreflang="{{ $alt }}" href="{{ url('/' . $alt) }}" />
            @endforeach
            <xhtml:link rel="alternate" hreflang="x-default" href="{{ url('/en') }}" />
        </url>
    @endforeach

    {{-- Work pages --}}
    @foreach ($locales as $locale)
        <url>
            <loc>{{ url('/' . $locale . '/work') }}</loc>
            <lastmod>{{ $lastModified }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
            @foreach ($locales as $alt)
                <xhtml:link rel="alternate" hreflang="{{ $alt }}" href="{{ url('/' . $alt . '/work') }}" />
            @endforeach
            <xhtml:link rel="alternate" hreflang="x-default" href="{{ url('/en/work') }}" />
        </url>
    @endforeach

    {{-- Contact pages --}}
    @foreach ($locales as $locale)
        <url>
            <loc>{{ url('/' . $locale . '/contact') }}</loc>
            <lastmod>{{ $lastModified }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.6</priority>
            @foreach ($locales as $alt)
                <xhtml:link rel="alternate" hreflang="{{ $alt }}" href="{{ url('/' . $alt . '/contact') }}" />
            @endforeach
            <xhtml:link rel="alternate" hreflang="x-default" href="{{ url('/en/contact') }}" />
        </url>
    @endforeach

    {{-- Project pages --}}
    @foreach ($projects as $project)
        @foreach ($locales as $locale)
            <url>
                <loc>{{ url('/' . $locale . '/work/' . $project->slug) }}</loc>
                <lastmod>{{ $project->updated_at->format('Y-m-d\TH:i:sP') }}</lastmod>
                <changefreq>monthly</changefreq>
                <priority>0.7</priority>
                @foreach ($locales as $alt)
                    <xhtml:link rel="alternate" hreflang="{{ $alt }}" href="{{ url('/' . $alt . '/work/' . $project->slug) }}" />
                @endforeach
                <xhtml:link rel="alternate" hreflang="x-default" href="{{ url('/en/work/' . $project->slug) }}" />
            </url>
        @endforeach
    @endforeach
    {{-- Blog index --}}
    @foreach ($locales as $locale)
        <url>
            <loc>{{ url('/' . $locale . '/blog') }}</loc>
            <lastmod>{{ $lastModified }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
            @foreach ($locales as $alt)
                <xhtml:link rel="alternate" hreflang="{{ $alt }}" href="{{ url('/' . $alt . '/blog') }}" />
            @endforeach
            <xhtml:link rel="alternate" hreflang="x-default" href="{{ url('/en/blog') }}" />
        </url>
    @endforeach

    {{-- Blog posts: one URL per post, under its own locale --}}
    @foreach ($posts as $post)
        @php $translation = $post->translation(); @endphp
        <url>
            <loc>{{ url('/' . $post->locale . '/blog/' . $post->slug) }}</loc>
            <lastmod>{{ $post->updated_at->format('Y-m-d\TH:i:sP') }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.7</priority>
            @if ($translation)
                <xhtml:link rel="alternate" hreflang="{{ $translation->locale }}" href="{{ url('/' . $translation->locale . '/blog/' . $translation->slug) }}" />
                <xhtml:link rel="alternate" hreflang="{{ $post->locale }}" href="{{ url('/' . $post->locale . '/blog/' . $post->slug) }}" />
            @endif
            <xhtml:link rel="alternate" hreflang="x-default" href="{{ url('/' . $post->locale . '/blog/' . $post->slug) }}" />
        </url>
    @endforeach
</urlset>
