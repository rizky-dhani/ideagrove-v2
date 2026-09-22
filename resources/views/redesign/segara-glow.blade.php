<!DOCTYPE html>
{{-- CONCEPT 2: "SEGARA GLOW" v4: live site copy, dark bioluminescent ocean.
  Copy source: lang/en + lang/id via __(). EN/ID stay in sync.
  Direction: DESIGN.md, dial ENERGY 2 / RHYTHM 2 / MOTION 1.
  Palette: night #04120E + sea mist #EFFAF3 cores, sea glass #2DD4BF accent.
  Theme reason (R-21): this route's identity IS the night ocean, so the dark ground is a
  branding decision, not "dark looks tech". There is no light variant to break. --}}
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ __('layout.meta.home.title') }} | Concept: Segara Glow</title>
<meta name="description" content="{{ __('layout.meta.home.description') }}">
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<script src="https://unpkg.com/@phosphor-icons/web"></script>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
:root{--night:#04120E;--mist:#EFFAF3;--glass:#2DD4BF;--muted:#A9B8B1;--panel:#0F231C}
body{font-family:'Space Grotesk',sans-serif;background:var(--night);color:var(--mist)}
.muted{color:var(--muted)}
.grain::after{content:"";position:fixed;inset:0;z-index:70;pointer-events:none;opacity:.06;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='140' height='140'%3E%3Cfilter id='n'%3E%3CfeTurbulence baseFrequency='0.9'/%3E%3C/filter%3E%3Crect width='140' height='140' filter='url(%23n)'/%3E%3C/svg%3E")}
.reveal{opacity:0;transform:translateY(26px);transition:opacity .9s cubic-bezier(.32,.72,0,1),transform .9s cubic-bezier(.32,.72,0,1)}
.reveal.in{opacity:1;transform:none}
/* Glass dose cap: the floating nav and the hero read-out only (R-10). Panels below are solid. */
.glass{background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.14);backdrop-filter:blur(20px)}
/* Panel: a solid raised surface, so the page is not glass-on-glass. */
.panel{background:var(--panel);border:1px solid rgba(255,255,255,.12)}
/* No glow loop. The accent marks the action by changing fill, not by emitting light (R-13, R-19). */
.btn-main{transition:background-color .4s cubic-bezier(.32,.72,0,1),color .4s cubic-bezier(.32,.72,0,1)}
.btn-main:hover{background:var(--mist)}
.card{transition:border-color .35s ease,transform .35s ease}
.card:hover{border-color:rgba(45,212,191,.5);transform:translateY(-3px)}
@media(prefers-reduced-motion:reduce){.reveal{opacity:1;transform:none}}
::selection{background:var(--glass);color:var(--night)}
#siteNavBar{transition:background .45s ease,box-shadow .45s ease}
#siteNav.scrolled #siteNavBar,#siteNav.nav-open #siteNavBar{background:rgba(8,30,24,.92);box-shadow:0 18px 50px -22px rgba(0,0,0,.75)}
#mobileNav{display:none}#mobileNav.open{display:flex}
.brand-logo{--logo-c:var(--mist);position:relative;display:block;overflow:hidden;aspect-ratio:1829/480;width:auto;height:2.5rem}
.brand-logo::after{content:"";position:absolute;left:-2.4046%;top:-59.5833%;width:104.9754%;height:225%;background-color:var(--logo-c);-webkit-mask:url("{{ asset('assets/images/Logo_Landscape.webp') }}") center/100% 100% no-repeat;mask:url("{{ asset('assets/images/Logo_Landscape.webp') }}") center/100% 100% no-repeat}
#siteNav.scrolled .brand-logo,#siteNav.nav-open .brand-logo{--logo-c:var(--glass)}
</style>
</head>
<body class="grain antialiased overflow-x-clip">

<div id="siteNav" class="fixed top-4 left-1/2 -translate-x-1/2 z-[60] w-[94%] max-w-7xl">
<nav id="siteNavBar" class="glass rounded-2xl px-5 py-3 grid grid-cols-[1fr_auto] md:grid-cols-[1fr_auto_1fr] items-center gap-3" aria-label="Primary">
<div class="flex items-center min-w-0"><a href="{{ url('/') }}" class="brand-logo shrink-0" role="img" aria-label="The Idea Grove Studio"></a></div>
<div class="hidden md:flex gap-6 text-sm justify-center"><a href="#layanan" class="hover:text-[#2DD4BF]">{{ __('home.services.heading') }}</a><a href="#kerja" class="hover:text-[#2DD4BF]">{{ __('layout.nav.work') }}</a><a href="#catatan" class="hover:text-[#2DD4BF]">{{ __('layout.nav.blog') }}</a><a href="#harga" class="hover:text-[#2DD4BF]">{{ __('layout.nav.pricing') }}</a><a href="#hubungi" class="hover:text-[#2DD4BF]">{{ __('layout.nav.contact') }}</a></div>
<div class="flex items-center gap-2 justify-end">
<a href="#hubungi" class="btn-main bg-[#2DD4BF] text-black text-sm font-bold rounded-full pl-5 pr-1.5 py-1.5 hidden sm:flex items-center gap-2">{{ __('home.hero.cta_contact') }} <span class="w-8 h-8 rounded-full bg-black/15 flex items-center justify-center"><i class="ph ph-arrow-down"></i></span></a>
<button type="button" id="navToggle" class="md:hidden w-10 h-10 rounded-xl bg-[#2DD4BF] text-black flex items-center justify-center" aria-expanded="false" aria-controls="mobileNav" aria-label="{{ __('layout.nav.toggle_menu') }}"><i class="ph ph-list text-lg"></i></button>
</div>
</nav>
</div>
<div id="mobileNav" class="fixed inset-0 z-[55] md:hidden flex-col justify-center gap-2 px-6 bg-[#04120E]/97 backdrop-blur-2xl">
<a href="#layanan" class="block px-5 py-4 rounded-2xl text-2xl font-bold hover:text-[#2DD4BF] transition">{{ __('home.services.heading') }}</a>
<a href="#kerja" class="block px-5 py-4 rounded-2xl text-2xl font-bold hover:text-[#2DD4BF] transition">{{ __('layout.nav.work') }}</a>
<a href="#catatan" class="block px-5 py-4 rounded-2xl text-2xl font-bold hover:text-[#2DD4BF] transition">{{ __('layout.nav.blog') }}</a>
<a href="#harga" class="block px-5 py-4 rounded-2xl text-2xl font-bold hover:text-[#2DD4BF] transition">{{ __('layout.nav.pricing') }}</a>
<a href="#hubungi" class="mt-2 flex items-center justify-center gap-2 rounded-2xl bg-[#2DD4BF] text-black px-5 py-4 text-lg font-bold transition">{{ __('layout.nav.contact') }} <i class="ph ph-arrow-down"></i></a>
</div>

{{-- Hero: single linear scrim for legibility over the photo. No radial glow orb (R-01, R-13). --}}
<header class="relative min-h-[100dvh] flex items-end pt-32 pb-10 px-5">
<img src="https://images.unsplash.com/photo-1710343866853-c88d66fb10ad?auto=format&fit=crop&w=1920&h=1100&q=80" alt="Night surf at Batu Bolong, Canggu, Bali" class="absolute inset-0 w-full h-full object-cover opacity-50">
<div class="absolute inset-0" style="background:linear-gradient(180deg,rgba(4,18,14,.25) 0%,rgba(4,18,14,.92) 78%)"></div>
<div class="relative max-w-7xl mx-auto w-full grid lg:grid-cols-12 gap-8 items-end">
<div class="lg:col-span-8">
<h1 class="mt-4 font-bold tracking-tight leading-[1.0] text-[clamp(2.4rem,5.6vw,5.2rem)] max-w-3xl">{!! __('home.hero.heading', ['considered' => '<span class="italic text-[#2DD4BF]">'.__('home.hero.heading_em').'</span>']) !!}</h1>
<p class="mt-5 text-lg muted max-w-[48ch]">{{ __('home.hero.subtitle') }}</p>
<div class="mt-7 flex flex-wrap gap-3">
<a href="#kerja" class="btn-main bg-[#EFFAF3] text-black font-bold rounded-full px-7 py-3.5">{{ __('home.hero.cta_work') }} <span aria-hidden="true">&rarr;</span></a>
<a href="#hubungi" class="rounded-2xl border border-white/35 px-7 py-3.5 font-semibold hover:bg-white/10">{{ __('home.hero.cta_contact') }}</a>
</div>
</div>
<div class="lg:col-span-4 glass rounded-3xl p-5 text-xs space-y-3">
<p class="muted">{{ __('home.hero.engagements_label') }} · {{ __('home.hero.engagements_value') }}</p>
<div class="flex justify-between"><span>{{ __('home.hero.disciplines_label') }}</span><span class="text-[#2DD4BF]">{{ __('home.hero.disciplines_value') }}</span></div>
<div class="flex justify-between"><span>{{ __('home.hero.studio_label') }}</span><span>{{ __('home.hero.studio_value') }}</span></div>
{{-- R-23/R-38: no released team photography, so initials placeholders, not stock faces. --}}
<div class="flex gap-2 pt-2" aria-hidden="true">
<span class="w-9 h-9 rounded-full border border-white/30 bg-[#2DD4BF] text-black grid place-items-center font-bold">IG</span>
<span class="w-9 h-9 rounded-full border border-white/30 bg-[#123524] grid place-items-center font-bold">RS</span>
<span class="w-9 h-9 rounded-full border border-white/30 bg-[#2DD4BF] text-black grid place-items-center font-bold">DP</span>
<span class="muted self-center">{{ __('home.sectors.more') }}</span>
</div>
</div>
</div>
</header>

{{-- Ethos: 4/8 split with a featured accent card --}}
<section class="max-w-7xl mx-auto px-5 py-24 grid lg:grid-cols-12 gap-10">
<div class="lg:col-span-4 reveal"><h2 class="text-4xl sm:text-5xl font-bold tracking-tight">{!! __('home.ethos.heading') !!}</h2></div>
<div class="lg:col-span-8 reveal"><p class="text-lg muted max-w-2xl leading-relaxed">{{ __('home.ethos.body') }}</p>
<div class="mt-10 grid sm:grid-cols-3 gap-6">
<div class="panel rounded-3xl p-6"><i class="ph ph-ear text-3xl text-[#2DD4BF]"></i><h3 class="font-bold mt-3">{{ __('home.ethos.research_title') }}</h3><p class="text-sm muted mt-2">{{ __('home.ethos.research_body') }}</p></div>
<div class="panel rounded-3xl p-6"><i class="ph ph-pen-nib text-3xl text-[#2DD4BF]"></i><h3 class="font-bold mt-3">{{ __('home.ethos.design_title') }}</h3><p class="text-sm muted mt-2">{{ __('home.ethos.design_body') }}</p></div>
<div class="rounded-3xl bg-[#2DD4BF] text-black p-6"><i class="ph ph-hand-heart text-3xl"></i><h3 class="font-bold mt-3">{{ __('home.ethos.care_title') }}</h3><p class="text-sm opacity-75 mt-2">{{ __('home.ethos.care_body') }}</p></div>
</div></div>
</section>

{{-- Services: full-width grid, one accent card, radius varies from pill --}}
<section id="layanan" class="pb-28">
<div class="max-w-7xl mx-auto px-5 flex flex-wrap items-end justify-between gap-6">
<div><h2 class="text-4xl sm:text-5xl font-bold tracking-tight">{{ __('home.services.heading') }}</h2>
<p class="mt-3 muted max-w-md">{{ __('home.services.subtitle') }}</p></div>
</div>
<div class="mt-10 grid sm:grid-cols-2 xl:grid-cols-4 gap-5 px-5 max-w-7xl mx-auto">
<article class="card reveal rounded-3xl overflow-hidden panel">
<img src="https://images.unsplash.com/photo-1611241893603-3c359704e0ee?auto=format&fit=crop&w=800&h=500&q=80" alt="Brand identity sketching on a tablet at the Bali studio" class="h-56 w-full object-cover"><div class="p-7"><h3 class="text-2xl font-bold">{{ __('home.services.brand_title') }}</h3><p class="muted mt-2 text-[15px]">{{ __('home.services.brand_body') }}</p></div></article>
<article class="card reveal rounded-3xl overflow-hidden bg-[#2DD4BF] text-black">
<img src="https://images.unsplash.com/photo-1522542550221-31fd19575a2d?auto=format&fit=crop&w=800&h=500&q=80" alt="Website wireframe sketches for a Bali client build" class="h-56 w-full object-cover"><div class="p-7"><h3 class="text-2xl font-bold">{{ __('home.services.web_title') }}</h3><p class="mt-2 text-[15px] opacity-75">{{ __('home.services.web_body') }}</p></div></article>
<article class="card reveal rounded-3xl overflow-hidden panel">
<img src="https://images.unsplash.com/photo-1542831371-29b0f74f9713?auto=format&fit=crop&w=800&h=500&q=80" alt="Laravel developer shipping a performant build from Bali" class="h-56 w-full object-cover"><div class="p-7"><h3 class="text-2xl font-bold">{{ __('home.services.dev_title') }}</h3><p class="muted mt-2 text-[15px]">{{ __('home.services.dev_body') }}</p></div></article>
<article class="card reveal rounded-3xl overflow-hidden panel">
<img src="https://images.unsplash.com/photo-1503551723145-6c040742065b-v2?auto=format&fit=crop&w=800&h=500&q=80" alt="Strategy maps pinned on the studio wall in Bali" class="h-56 w-full object-cover"><div class="p-7"><h3 class="text-2xl font-bold">{{ __('home.services.strategy_title') }}</h3><p class="muted mt-2 text-[15px]">{{ __('home.services.strategy_body') }}</p></div></article>
</div>
</section>

{{-- Work: live DB, real projects --}}
@php $segaraProjects = \App\Models\Project::orderBy('created_at','desc')->take(4)->get(); $segaraSetting = \App\Models\SiteSetting::first(); @endphp
<section id="kerja" class="max-w-7xl mx-auto px-5 pb-28">
<div class="flex flex-wrap items-end justify-between gap-6">
<h2 class="reveal text-4xl sm:text-5xl font-bold tracking-tight">{{ __('home.work.heading') }}</h2>
<a href="{{ route('projects.index', ['locale' => app()->getLocale()]) }}" class="rounded-full border border-white/30 px-6 py-3 font-semibold hover:bg-[#2DD4BF] hover:text-black hover:border-[#2DD4BF] transition">{{ __('home.work.view_all') }} <span aria-hidden="true">&rarr;</span></a>
</div>
<p class="mt-3 muted max-w-xl">{{ __('home.work.subtitle') }}</p>
@if($segaraProjects->count())
<div class="mt-10 grid md:grid-cols-3 grid-flow-dense gap-5">
@foreach($segaraProjects as $i => $project)
<a href="{{ route('projects.show', ['locale' => app()->getLocale(), 'project' => $project]) }}" class="card reveal group {{ $i % 3 === 0 ? 'md:col-span-2' : '' }} relative rounded-3xl overflow-hidden {{ $i < 2 ? 'min-h-[360px]' : 'min-h-[300px]' }} flex items-end">@if($project->imageUrl())<img src="{{ $project->imageUrl() }}" alt="{{ $project->name }}" loading="lazy" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-700">@endif<div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div><div class="relative p-7 w-full">@if($project->client_name)<span class="text-xs font-semibold bg-[#2DD4BF] text-black rounded-xl px-3 py-1">{{ $project->client_name }}</span>@endif<h3 class="text-{{ $i % 3 === 0 ? '3xl' : '2xl' }} font-bold mt-3">{{ $project->name }}</h3>@if($project->web_url)<p class="text-xs muted mt-1">{{ parse_url($project->web_url, PHP_URL_HOST) ?? $project->web_url }}</p>@endif</div></a>
@endforeach
</div>
@endif
</section>

{{-- Pricing: real SOW x tier matrix in a solid panel, not glass-on-glass --}}
<section id="harga" class="scroll-mt-28 max-w-7xl mx-auto px-5 pb-28">
<div class="reveal">
<div class="flex flex-wrap items-end justify-between gap-6">
<h2 class="text-4xl sm:text-5xl font-bold tracking-tight">{{ __('home.pricing.heading') }}</h2>
<p class="muted max-w-md">{{ __('home.pricing.subtitle') }}</p>
</div>
</div>
<div class="mt-10 panel rounded-3xl overflow-x-auto reveal">
<table class="w-full min-w-[760px] text-left">
<thead><tr class="border-b border-white/12">
<th class="p-6"></th>
@foreach(__('home.pricing.tiers') as $i => $tier)
<th class="p-6 align-top {{ $i===1 ? 'bg-[#2DD4BF]/12' : '' }}">
@if($i===1)<span class="text-[10px] font-bold bg-[#2DD4BF] text-black rounded-full px-2.5 py-1">{{ __('home.pricing.popular') }}</span>@endif
<p class="mt-3 text-xl font-bold">{{ $tier['name'] }}</p>
<p class="text-xs muted mt-1">{{ $tier['desc'] }}</p>
</th>
@endforeach
</tr></thead>
<tbody>
@foreach(__('home.pricing.sow') as $sow)
<tr class="border-b border-white/12 last:border-0">
<td class="p-6"><p class="font-bold">{{ $sow['name'] }}</p><p class="text-xs muted mt-1 max-w-[26ch]">{{ $sow['desc'] }}</p></td>
@foreach($sow['prices'] as $i => $price)
<td class="p-6 {{ $i===1 ? 'bg-[#2DD4BF]/12' : '' }}"><span class="font-bold text-lg {{ $i===1 ? 'text-[#2DD4BF]' : '' }}">{{ $price }}</span></td>
@endforeach
</tr>
@endforeach
</tbody>
</table>
</div>
<div class="mt-14 grid lg:grid-cols-12 gap-8">
<div class="lg:col-span-4 reveal"><h3 class="text-3xl font-bold tracking-tight">{{ __('home.pricing.care_heading') }}</h3><p class="mt-3 muted">{{ __('home.pricing.care_body') }}</p></div>
<div class="lg:col-span-8 grid sm:grid-cols-3 gap-4">
@foreach(__('home.pricing.care') as $i => $plan)
<article class="card reveal rounded-3xl p-6 {{ $i===1 ? 'bg-[#2DD4BF] text-black' : 'panel' }}">
<h4 class="font-bold">{{ $plan['name'] }}</h4>
<p class="mt-3"><span class="text-2xl font-bold {{ $i===1 ? '' : 'text-[#2DD4BF]' }}">{{ $plan['price'] }}</span><span class="text-xs opacity-75">{{ $plan['unit'] }}</span></p>
<p class="mt-3 text-sm {{ $i===1 ? 'opacity-75' : 'muted' }}">{{ $plan['desc'] }}</p>
</article>
@endforeach
</div>
</div>
<div class="mt-12 pt-6 border-t border-white/12 flex flex-wrap items-center justify-between gap-5 reveal">
<p class="text-xs muted max-w-2xl">{{ __('home.pricing.note') }}</p>
<a href="#hubungi" class="btn-main bg-[#2DD4BF] text-black font-bold rounded-full px-7 py-3.5">{{ __('home.pricing.cta') }} <span aria-hidden="true">&rarr;</span></a>
</div>
</section>

{{-- Field notes: live DB, latest published posts. Panels on the night ground, first card
     carries the sea-glass fill so the section has one focal point (levers). No image cards:
     the work grid above already owns that composition (RHYTHM 2). --}}
@php $segaraPosts = \App\Models\Post::published()->forLocale()->with('category')->orderByDesc('published_at')->take(6)->get(); @endphp
<section id="catatan" class="max-w-7xl mx-auto px-5 pb-28">
<div class="flex flex-wrap items-end justify-between gap-6">
<div>
<h2 class="reveal text-4xl sm:text-5xl font-bold tracking-tight">{{ __('home.blog.heading') }}</h2>
<p class="mt-3 muted max-w-md">{{ __('home.blog.subtitle') }}</p>
</div>
<a href="{{ route('posts.index', ['locale' => app()->getLocale()]) }}" class="rounded-full border border-white/30 px-6 py-3 font-semibold hover:bg-[#2DD4BF] hover:text-black hover:border-[#2DD4BF] transition">{{ __('layout.nav.blog') }} <span aria-hidden="true">&rarr;</span></a>
</div>
@if($segaraPosts->count())
<div class="mt-10 grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
@foreach($segaraPosts as $post)
<a href="{{ route('posts.show', ['locale' => app()->getLocale(), 'slug' => $post->slug]) }}" class="card reveal group flex flex-col rounded-3xl p-7 {{ $loop->first ? 'bg-[#2DD4BF] text-black' : 'panel' }}">
@if($post->category)<p class="text-xs font-semibold uppercase tracking-[0.16em] {{ $loop->first ? 'text-black/70' : 'text-[#2DD4BF]' }}">{{ $post->category->name }}</p>@endif
<h3 class="mt-3 text-2xl font-bold leading-snug">{{ $post->title }}</h3>
<p class="mt-3 text-[15px] leading-relaxed {{ $loop->first ? 'text-black/75' : 'muted' }}">{{ $post->excerpt(20) }}</p>
<p class="mt-auto pt-6 text-xs uppercase tracking-[0.14em] {{ $loop->first ? 'text-black/60' : 'muted' }}">@if($post->published_at){{ $post->published_at->format('j M Y') }} &middot; @endif{{ __('posts.card.reading_time', ['minutes' => $post->readingTime()]) }}</p>
</a>
@endforeach
</div>
@else
<p class="mt-8 muted">{{ __('home.blog.empty') }}</p>
@endif
<a href="{{ route('posts.index', ['locale' => app()->getLocale()]) }}" class="btn-main reveal mt-10 flex w-full items-center justify-center gap-3 rounded-full bg-[#2DD4BF] text-black font-bold px-8 py-4">{{ __('home.blog.view_all') }} <span aria-hidden="true">&rarr;</span></a>
</section>

{{-- Sectors: chips, radius .75rem so the pill stays a status/CTA signal --}}
<section class="border-y border-white/12 bg-white/[0.03] py-20 px-5">
<div class="max-w-7xl mx-auto">
<h2 class="reveal text-3xl sm:text-4xl font-bold tracking-tight">{{ __('home.sectors.heading') }}</h2>
<div class="mt-8 flex flex-wrap gap-3">
<span class="reveal rounded-xl border border-white/20 px-5 py-2 text-sm">{{ __('home.sectors.hospitality') }}</span>
<span class="reveal rounded-xl border border-white/20 px-5 py-2 text-sm">{{ __('home.sectors.wellness') }}</span>
<span class="reveal rounded-xl border border-white/20 px-5 py-2 text-sm">{{ __('home.sectors.sustainability') }}</span>
<span class="reveal rounded-xl border border-white/20 px-5 py-2 text-sm">{{ __('home.sectors.culture') }}</span>
<span class="reveal rounded-xl border border-white/20 px-5 py-2 text-sm">{{ __('home.sectors.lifestyle') }}</span>
<span class="reveal rounded-xl border border-white/20 px-5 py-2 text-sm">{{ __('home.sectors.social_impact') }}</span>
<span class="reveal rounded-xl border border-white/20 px-5 py-2 text-sm">{{ __('home.sectors.education') }}</span>
<span class="reveal rounded-xl border border-white/20 px-5 py-2 text-sm">{{ __('home.sectors.technology') }}</span>
<span class="reveal rounded-xl bg-[#2DD4BF] text-black px-5 py-2 text-sm font-bold">{{ __('home.sectors.more') }}</span>
</div></div>
</section>

{{-- Contact + footer --}}
<footer id="hubungi" class="max-w-7xl mx-auto px-5 py-24 text-center">
<h2 class="mt-4 font-bold tracking-tight text-[clamp(2.4rem,6vw,4.8rem)] leading-none">{{ __('home.contact.heading') }}</h2>
<p class="mt-4 muted max-w-xl mx-auto">{{ __('home.contact.subtitle') }}</p>
<div class="mt-4 text-sm muted">@if($segaraSetting)<p><a href="mailto:{{ $segaraSetting->email }}" class="underline">{{ $segaraSetting->email }}</a> · {{ $segaraSetting->phone_display }} · {{ $segaraSetting->address }}</p>@else<p>{{ __('contact.reach_out_body') }} · {{ __('contact.studio_value') }}</p>@endif</div>
<div class="mt-8 flex flex-wrap justify-center gap-3"><a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" class="btn-main bg-[#2DD4BF] text-black font-bold rounded-full px-8 py-4">{{ __('home.hero.cta_contact') }}</a><a href="{{ route('projects.index', ['locale' => app()->getLocale()]) }}" class="rounded-2xl border border-white/35 px-8 py-4 hover:bg-white/10">{{ __('home.hero.cta_work') }}</a></div>
<p class="mt-10 text-xs muted">{{ __('layout.footer.copyright', ['year' => date('Y')]) }} · {!! __('layout.footer.made_with', ['soul' => __('layout.footer.made_with_soul')]) !!}</p>
</footer>
<script>
const io=new IntersectionObserver(es=>es.forEach(e=>e.isIntersecting&&e.target.classList.add('in')),{threshold:.15});
document.querySelectorAll('.reveal').forEach(el=>io.observe(el));
(function(){const t=document.getElementById('navToggle'),m=document.getElementById('mobileNav'),s=document.getElementById('siteNav');if(t&&m){const set=o=>{m.classList.toggle('open',o);t.setAttribute('aria-expanded',o?'true':'false');if(s)s.classList.toggle('nav-open',o);const i=t.querySelector('i');if(i){i.classList.toggle('ph-list',!o);i.classList.toggle('ph-x',o);}document.documentElement.style.overflow=o?'hidden':'';};t.addEventListener('click',()=>set(!m.classList.contains('open')));m.querySelectorAll('a').forEach(a=>a.addEventListener('click',()=>set(false)));document.addEventListener('keydown',e=>{if(e.key==='Escape')set(false)});window.addEventListener('resize',()=>{if(window.innerWidth>=768)set(false)});}if(s){const on=()=>s.classList.toggle('scrolled',window.scrollY>24);on();window.addEventListener('scroll',on,{passive:true});}})();
</script>
</body>
</html>
