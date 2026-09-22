<!DOCTYPE html>
{{-- CONCEPT 1: "SAWAH DIGITAL" v5: digital-agency studio, logo colour as the base.
  Copy source: lang/en + lang/id (home, layout, contact). Uses __() so EN/ID stay in sync.
  Direction: DESIGN.md, dial ENERGY 2 / RHYTHM 2 / MOTION 2.
  Palette: brand orange #F45B0E, the logo colour, is the base and the ink.
  #F45B0E is 3.18:1 on paper, so it is a large-text, fill and stroke colour only.
  Small accent text uses brandDeep #C9440B (4.68:1 on paper). Never white on brand
  (3.31:1 fails): on a brand fill the text is ink #171512 (5.51:1).
  The logo is drawn as a masked fill in --ink, so it inherits the brand in the mark. --}}
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ __('layout.meta.home.title') }} | Concept: Sawah Digital</title>
<meta name="description" content="{{ __('layout.meta.home.description') }}">
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<script src="https://unpkg.com/@phosphor-icons/web"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
:root{--paper:#FDFAF7;--ink:#171512;--brand:#F45B0E;--brand-deep:#C9440B;--brand-ink:#8F2F06;--peach:#FDE7DA;--muted:#5C5651;--hair:#E7E0DA}
body{font-family:'Outfit',sans-serif;background:var(--paper);color:var(--ink)}
.muted{color:var(--muted)}
.brand-text{color:var(--brand-deep)}
/* A faint grain over a warm paper ground is a stock feel, not a studio feel (R-24). */
.grid-lines{background-image:linear-gradient(to right,rgba(23,21,18,.045) 1px,transparent 1px),linear-gradient(to bottom,rgba(23,21,18,.045) 1px,transparent 1px);background-size:88px 88px}
.reveal{opacity:0;transform:translateY(26px);transition:opacity .8s cubic-bezier(.32,.72,0,1),transform .8s cubic-bezier(.32,.72,0,1)}
.reveal.in{opacity:1;transform:none}
/* Hairline cards on the paper ground. Hover is a brand border and a lift, never a
   cursor-following glow (R-13). */
.card{transition:border-color .35s ease,transform .35s ease,box-shadow .35s ease}
.card:hover{border-color:var(--brand);transform:translateY(-3px);box-shadow:0 20px 44px -28px rgba(23,21,18,.5)}
::selection{background:var(--brand);color:var(--ink)}
/* Glass dose cap: the floating nav and its mobile panel only (R-10). */
#siteNavBar{transition:background .45s ease,box-shadow .45s ease,backdrop-filter .45s ease}
#siteNav.scrolled #siteNavBar,#siteNav.nav-open #siteNavBar{background:rgba(253,250,247,.96);backdrop-filter:blur(16px);box-shadow:0 18px 50px -28px rgba(23,21,18,.55)}
#mobileNav{display:none}#mobileNav.open{display:flex}
/* The mark is a masked fill, so it takes the brand colour instead of being a fixed bitmap.
   That keeps the logo legible on both the paper and the ink grounds. */
.brand-logo{--logo-c:var(--brand);position:relative;display:block;overflow:hidden;aspect-ratio:1829/480;width:auto;height:2.5rem}
.brand-logo::after{content:"";position:absolute;left:-2.4046%;top:-59.5833%;width:104.9754%;height:225%;background-color:var(--logo-c);-webkit-mask:url("{{ asset('assets/images/Logo_Landscape.webp') }}") center/100% 100% no-repeat;mask:url("{{ asset('assets/images/Logo_Landscape.webp') }}") center/100% 100% no-repeat}
@media(prefers-reduced-motion:reduce){.reveal{opacity:1;transform:none}}
</style>
</head>
<body class="antialiased overflow-x-clip w-full max-w-full">

<div id="siteNav" class="fixed top-4 left-1/2 -translate-x-1/2 z-[60] w-[94%] max-w-3xl md:max-w-5xl">
<nav id="siteNavBar" class="relative flex items-center justify-between gap-2 rounded-3xl md:rounded-full border border-[#171512]/10 bg-[#FDFAF7]/85 backdrop-blur-xl pl-4 pr-2 py-2 shadow-[0_12px_40px_-20px_rgba(23,21,18,.45)]" aria-label="Primary">
<a href="{{ url('/') }}" class="brand-logo shrink-0" role="img" aria-label="The Idea Grove Studio"></a>
<div class="hidden md:flex absolute left-1/2 -translate-x-1/2 items-center gap-1">
<a href="#layanan" class="text-sm font-medium px-3 py-1.5 rounded-full hover:bg-[#F45B0E]/15 hover:text-[#C9440B] transition">{{ __('home.services.heading') }}</a>
<a href="#kerja" class="text-sm font-medium px-3 py-1.5 rounded-full hover:bg-[#F45B0E]/15 hover:text-[#C9440B] transition">{{ __('layout.nav.work') }}</a>
<a href="#catatan" class="text-sm font-medium px-3 py-1.5 rounded-full hover:bg-[#F45B0E]/15 hover:text-[#C9440B] transition">{{ __('layout.nav.blog') }}</a>
<a href="#tim" class="text-sm font-medium px-3 py-1.5 rounded-full hover:bg-[#F45B0E]/15 hover:text-[#C9440B] transition">{{ __('layout.nav.team') }}</a>
<a href="#harga" class="text-sm font-medium px-3 py-1.5 rounded-full hover:bg-[#F45B0E]/15 hover:text-[#C9440B] transition">{{ __('layout.nav.pricing') }}</a>
</div>
<div class="flex items-center gap-2">
<a href="#hubungi" class="hidden sm:flex text-sm font-semibold px-3 py-1.5 rounded-full bg-[#F45B0E] text-[#171512] hover:bg-[#171512] hover:text-[#FDFAF7] transition-all duration-500 items-center gap-2">{{ __('layout.nav.contact') }} <span class="w-6 h-6 rounded-full bg-[#171512]/15 flex items-center justify-center"><i class="ph ph-arrow-up-right text-sm"></i></span></a>
<button type="button" id="navToggle" class="md:hidden w-10 h-10 rounded-full bg-[#F45B0E] text-[#171512] flex items-center justify-center" aria-expanded="false" aria-controls="mobileNav" aria-label="{{ __('layout.nav.toggle_menu') }}"><i class="ph ph-list text-lg"></i></button>
</div>
</nav>
</div>
<div id="mobileNav" class="fixed inset-0 z-[55] md:hidden flex-col justify-center gap-2 px-6 bg-[#FDFAF7]/98 backdrop-blur-2xl">
<a href="#layanan" class="block px-5 py-4 rounded-2xl text-2xl font-bold hover:bg-[#F45B0E]/15 transition">{{ __('home.services.heading') }}</a>
<a href="#kerja" class="block px-5 py-4 rounded-2xl text-2xl font-bold hover:bg-[#F45B0E]/15 transition">{{ __('layout.nav.work') }}</a>
<a href="#catatan" class="block px-5 py-4 rounded-2xl text-2xl font-bold hover:bg-[#F45B0E]/15 transition">{{ __('layout.nav.blog') }}</a>
<a href="#tim" class="block px-5 py-4 rounded-2xl text-2xl font-bold hover:bg-[#F45B0E]/15 transition">{{ __('layout.nav.team') }}</a>
<a href="#harga" class="block px-5 py-4 rounded-2xl text-2xl font-bold hover:bg-[#F45B0E]/15 transition">{{ __('layout.nav.pricing') }}</a>
<a href="#hubungi" class="mt-2 flex items-center justify-center gap-2 rounded-2xl bg-[#F45B0E] text-[#171512] px-5 py-4 text-lg font-bold transition">{{ __('layout.nav.contact') }} <i class="ph ph-arrow-up-right"></i></a>
</div>

<header class="relative min-h-[100dvh] flex items-center pt-28 pb-16 px-5 sm:px-10 grid-lines">
<div class="max-w-7xl mx-auto grid lg:grid-cols-12 gap-12 items-center w-full">
<div class="lg:col-span-7 reveal in">
<p class="flex items-center gap-3 text-[11px] font-semibold uppercase tracking-[0.2em] brand-text"><span class="w-8 h-px bg-[#F45B0E]"></span>{{ __('home.hero.badge') }}</p>
<h1 class="mt-6 font-extrabold leading-[1.02] tracking-tight text-[clamp(2.6rem,5.4vw,5rem)] max-w-3xl">
{!! __('home.hero.heading', ['considered' => '<span class="text-[#F45B0E]">'.__('home.hero.heading_em').'</span>']) !!}
</h1>
<p class="mt-6 text-lg muted max-w-[52ch] leading-relaxed">{{ __('home.hero.subtitle') }}</p>
<div class="mt-9 flex flex-wrap items-center gap-4">
<a href="#kerja" class="group inline-flex items-center gap-3 rounded-full bg-[#F45B0E] text-[#171512] pl-7 pr-2 py-2 font-bold hover:bg-[#171512] hover:text-[#FDFAF7] transition-all duration-500 active:scale-[0.98]">{{ __('home.hero.cta_work') }} <span class="w-10 h-10 rounded-full bg-[#171512]/15 flex items-center justify-center group-hover:translate-x-1 transition-transform"><i class="ph ph-arrow-down-right text-lg"></i></span></a>
<a href="#hubungi" class="font-semibold underline underline-offset-8 decoration-[#C9440B]/50 hover:decoration-[#C9440B] transition">{{ __('home.hero.cta_contact') }}</a>
</div>
{{-- R-23/R-38: the studio has two people and no released photography, so the row is the real
     roster as initials. No stock faces, and no invented teammates. --}}
<div class="mt-10 flex items-center gap-4">
<div class="flex -space-x-3" aria-hidden="true">
@foreach(__('home.team.members') as $i => $member)
<span class="w-11 h-11 rounded-full border-[3px] border-[#FDFAF7] grid place-items-center font-bold text-xs {{ $i === 0 ? 'bg-[#F45B0E] text-[#171512]' : 'bg-[#171512] text-[#FDFAF7]' }}">{{ $member['initials'] }}</span>
@endforeach
</div>
<p class="text-sm"><span class="font-bold">{{ __('home.hero.disciplines_value') }}</span> <span class="muted">&middot; {{ __('home.hero.engagements_value') }}</span></p>
</div>
</div>
<div class="lg:col-span-5 relative reveal in">
<div class="rounded-[2rem] border border-[#171512]/15 bg-white p-3 shadow-[0_30px_70px_-40px_rgba(23,21,18,.5)]">
<div class="rounded-[1.6rem] overflow-hidden">
<img src="https://images.unsplash.com/photo-1765648580725-1d31acc6f048?auto=format&fit=crop&w=800&h=1000&q=80" alt="Outdoor cafe workspace with a laptop on the table" class="w-full aspect-[4/5] object-cover">
</div>
<div class="flex items-center justify-between px-4 py-4">
<p class="text-xs font-semibold uppercase tracking-[0.16em] brand-text">{{ __('home.hero.studio_label') }}</p>
<p class="text-xs muted">{{ __('home.hero.studio_value') }}</p>
</div>
</div>
<div class="absolute -bottom-6 -left-4 rounded-2xl bg-[#171512] text-[#FDFAF7] px-6 py-4 shadow-xl">
<p class="text-[11px] uppercase tracking-[0.16em] text-[#A79E97]">{{ __('home.hero.engagements_label') }}</p>
<p class="font-bold text-xl text-[#FF7A33]">{{ __('home.hero.engagements_value') }}</p>
</div>
<div class="absolute -top-5 -right-3 rounded-full bg-[#F45B0E] text-[#171512] px-5 py-2.5 text-sm font-bold shadow-lg">{{ __('home.hero.badge') }}</div>
</div>
</div>
</header>

{{-- Disciplines ticker: the web services the studio sells, in the client's own language. --}}
<div class="border-y border-[#171512]/10 bg-[#171512] text-[#FDFAF7] py-4 overflow-hidden" aria-hidden="true">
<div class="marquee flex whitespace-nowrap w-max font-semibold tracking-wide">@for($i=0;$i<8;$i++)<span>@foreach(__('home.hero.services_marquee') as $service)<span>{{ $service }} <span class="text-[#F45B0E]">/</span></span> @endforeach</span>@endfor</div>
</div>

{{-- Ethos: sticky left column against staggered right cards (RHYTHM 2). The featured card
     is an ink panel so the sequence has one hard stop. --}}
<section class="max-w-7xl mx-auto px-5 sm:px-10 py-32 grid lg:grid-cols-12 gap-12">
<div class="lg:col-span-4"><div class="lg:sticky lg:top-32 reveal">
<h2 class="text-4xl sm:text-5xl font-extrabold tracking-tight leading-[1.05]">{!! __('home.ethos.heading') !!}</h2>
<p class="mt-5 muted leading-relaxed max-w-[38ch]">{{ __('home.ethos.body') }}</p>
<img src="https://images.unsplash.com/photo-1769485016814-943270cdb5db?auto=format&fit=crop&w=600&h=400&q=80" alt="Woman carrying canang sari offerings to a Balinese temple" class="mt-8 rounded-2xl object-cover aspect-[3/2] w-full">
</div></div>
<div class="lg:col-span-8 space-y-6">
<article class="card reveal rounded-3xl border border-[#171512]/10 bg-white p-8 sm:p-10 grid sm:grid-cols-[auto_1fr_auto] gap-6 items-center">
<span class="w-14 h-14 rounded-2xl bg-[#FDE7DA] text-[#8F2F06] flex items-center justify-center"><i class="ph ph-ear text-3xl"></i></span>
<div><h3 class="text-2xl font-bold mt-1">{{ __('home.ethos.research_title') }}</h3><p class="muted mt-2 max-w-[52ch]">{{ __('home.ethos.research_body') }}</p></div>
<img src="https://images.unsplash.com/photo-1620275765334-4ed948bb4502?auto=format&fit=crop&w=300&h=300&q=80" alt="Field notes from a client visit in Bali" class="w-24 h-24 rounded-2xl object-cover hidden sm:block">
</article>
<article class="card reveal rounded-3xl border border-[#171512]/10 bg-white p-8 sm:p-10 grid sm:grid-cols-[auto_1fr_auto] gap-6 items-center lg:ml-12">
<span class="w-14 h-14 rounded-2xl bg-[#FDE7DA] text-[#8F2F06] flex items-center justify-center"><i class="ph ph-pen-nib text-3xl"></i></span>
<div><h3 class="text-2xl font-bold mt-1">{{ __('home.ethos.design_title') }}</h3><p class="muted mt-2 max-w-[52ch]">{{ __('home.ethos.design_body') }}</p></div>
<img src="https://images.unsplash.com/photo-1583321500900-82807e458f3c?auto=format&fit=crop&w=300&h=300&q=80" alt="Designers and engineers around one table in Bali" class="w-24 h-24 rounded-2xl object-cover hidden sm:block">
</article>
<article class="card reveal rounded-3xl bg-[#171512] text-[#F7F1EC] p-8 sm:p-10 grid sm:grid-cols-[auto_1fr_auto] gap-6 items-center lg:ml-24">
<span class="w-14 h-14 rounded-2xl bg-[#F45B0E] text-[#171512] flex items-center justify-center"><i class="ph ph-hand-heart text-3xl"></i></span>
<div><h3 class="text-2xl font-bold mt-1">{{ __('home.ethos.care_title') }}</h3><p class="text-[#A79E97] mt-2 max-w-[52ch]">{{ __('home.ethos.care_body') }}</p></div>
</article>
</div>
</section>

{{-- Services: live copy, 4 items. Icons are content-relevant glyphs, one brand-filled featured. --}}
<section id="layanan" class="scroll-mt-28 border-y border-[#171512]/10 bg-[#171512]/[0.02] px-5 sm:px-10 py-28">
<div class="max-w-7xl mx-auto">
<div class="flex flex-wrap items-end justify-between gap-6 reveal">
<h2 class="text-4xl sm:text-5xl font-extrabold tracking-tight">{{ __('home.services.heading') }}</h2>
<p class="max-w-sm muted">{{ __('home.services.subtitle') }}</p>
</div>
<div class="mt-12 grid grid-cols-1 md:grid-cols-2 grid-flow-dense gap-5">
<article class="card reveal rounded-3xl border border-[#171512]/10 bg-white p-8">
<span class="w-12 h-12 rounded-2xl bg-[#FDE7DA] text-[#8F2F06] flex items-center justify-center"><i class="ph ph-fingerprint text-2xl"></i></span>
<h3 class="mt-4 text-2xl font-bold">{{ __('home.services.brand_title') }}</h3><p class="mt-2 muted">{{ __('home.services.brand_body') }}</p>
<img src="https://images.unsplash.com/photo-1611241893603-3c359704e0ee?auto=format&fit=crop&w=800&h=400&q=80" alt="Brand identity sketching on a tablet at the Bali studio" class="mt-6 rounded-2xl aspect-[2/1] w-full object-cover">
</article>
<article class="card reveal rounded-3xl border border-[#171512]/10 bg-white p-8">
<span class="w-12 h-12 rounded-2xl bg-[#FDE7DA] text-[#8F2F06] flex items-center justify-center"><i class="ph ph-layout text-2xl"></i></span>
<h3 class="mt-4 text-2xl font-bold">{{ __('home.services.web_title') }}</h3><p class="mt-2 muted">{{ __('home.services.web_body') }}</p>
<img src="https://images.unsplash.com/photo-1522542550221-31fd19575a2d?auto=format&fit=crop&w=800&h=400&q=80" alt="Website wireframe sketches for a Bali client build" class="mt-6 rounded-2xl aspect-[2/1] w-full object-cover">
</article>
<article class="card reveal rounded-3xl border border-[#171512]/10 bg-white p-8">
<span class="w-12 h-12 rounded-2xl bg-[#FDE7DA] text-[#8F2F06] flex items-center justify-center"><i class="ph ph-code text-2xl"></i></span>
<h3 class="mt-4 text-2xl font-bold">{{ __('home.services.dev_title') }}</h3><p class="mt-2 muted">{{ __('home.services.dev_body') }}</p>
<img src="https://images.unsplash.com/photo-1542831371-29b0f74f9713?auto=format&fit=crop&w=800&h=400&q=80" alt="Laravel developer shipping a performant build from Bali" class="mt-6 rounded-2xl aspect-[2/1] w-full object-cover">
</article>
<article class="card reveal rounded-3xl bg-[#171512] text-[#F7F1EC] p-8">
<span class="w-12 h-12 rounded-2xl bg-[#F45B0E] text-[#171512] flex items-center justify-center"><i class="ph ph-compass text-2xl"></i></span>
<h3 class="mt-4 text-2xl font-bold">{{ __('home.services.strategy_title') }}</h3><p class="mt-2 text-[#A79E97]">{{ __('home.services.strategy_body') }}</p>
<img src="https://images.unsplash.com/photo-1503551723145-6c040742065b-v2?auto=format&fit=crop&w=800&h=400&q=80" alt="Strategy maps pinned on the studio wall in Bali" class="mt-6 rounded-2xl aspect-[2/1] w-full object-cover">
</article>
</div>
</div>
</section>

{{-- Work: live DB, real projects. Staggered column offsets, no full-bleed mosaic. --}}
@php $conceptProjects = \App\Models\Project::orderBy('created_at','desc')->take(6)->get(); @endphp
<section id="kerja" class="scroll-mt-28 max-w-7xl mx-auto px-5 sm:px-10 py-32">
<div class="flex flex-wrap items-end justify-between gap-6 reveal">
<h2 class="text-4xl sm:text-5xl font-extrabold tracking-tight">{{ __('home.work.heading') }}</h2>
<a href="{{ route('projects.index', ['locale' => app()->getLocale()]) }}" class="rounded-full border border-[#171512]/20 px-6 py-3 font-semibold hover:border-[#F45B0E] hover:text-[#C9440B] transition">{{ __('home.work.view_all') }} <span aria-hidden="true">&rarr;</span></a>
</div>
<p class="mt-4 muted max-w-xl">{{ __('home.work.subtitle') }}</p>
@if($conceptProjects->count())
<div class="mt-14 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-10">
@foreach($conceptProjects as $i => $project)
<a href="{{ route('projects.show', ['locale' => app()->getLocale(), 'project' => $project]) }}" class="card reveal group block {{ [1 => 'lg:mt-16', 3 => 'lg:mt-16', 4 => 'lg:-mt-8'][$i] ?? '' }}">
<div class="rounded-3xl overflow-hidden border border-[#171512]/10 bg-white">
@if($project->imageUrl())
<img src="{{ $project->imageUrl() }}" alt="{{ $project->name }}" loading="lazy" class="w-full aspect-[4/3] object-cover group-hover:scale-[1.04] transition-transform duration-700">
@else
<div class="w-full aspect-[4/3] bg-[#FDE7DA] grid place-items-center font-bold text-[#8F2F06]">{{ $project->name }}</div>
@endif
</div>
<div class="mt-4 flex items-baseline justify-between gap-3">
<h3 class="text-xl font-bold group-hover:text-[#C9440B] transition">{{ $project->name }}</h3>
@if($project->client_name)<p class="text-xs uppercase tracking-[0.14em] muted shrink-0">{{ $project->client_name }}</p>@endif
</div>
</a>
@endforeach
</div>
@else
<p class="mt-12 muted">{{ __('home.work.loading') }} {{ __('home.work.loading_sub') }}</p>
@endif
</section>

{{-- Pricing: real SOW x tier matrix. Professional is featured because it is the complete
     first build the studio recommends, not because it is the middle column. --}}
{{-- Pricing, rebuilt around what the studio delivers rather than a bare price grid.
     Order: tiers (what shape) -> includes (what is always in it) -> project types (what it
     costs) -> care -> why us. Each block answers the next question a buyer asks, and the
     "every build includes" list is the persuasion, because it is the part competitors quote
     back as extras. The project-type matrix is now the last, densest step instead of the
     opening move. --}}
<section id="harga" class="scroll-mt-28 border-y border-[#171512]/10 bg-[#171512]/[0.02] px-5 sm:px-10 py-28">
<div class="max-w-7xl mx-auto">
<div class="flex flex-wrap items-end justify-between gap-6 reveal">
<div><h2 class="text-4xl sm:text-5xl font-extrabold tracking-tight max-w-xl leading-[1.05]">{{ __('home.pricing.heading') }}</h2></div>
<p class="max-w-sm muted">{{ __('home.pricing.subtitle') }}</p>
</div>

{{-- Step 1: the three shapes of engagement. Each card leads with a number, then who it is for. --}}
<div class="mt-12 grid md:grid-cols-3 gap-5 items-stretch">
@foreach(__('home.pricing.tiers') as $i => $tier)
<article class="reveal flex flex-col h-full rounded-3xl p-8 {{ $i === 1 ? 'bg-[#171512] text-[#F7F1EC]' : 'border border-[#171512]/10 bg-white' }}">
<div class="flex items-center justify-between gap-3">
<h3 class="text-2xl font-extrabold tracking-tight">{{ $tier['name'] }}</h3>
@if($i === 1)<span class="rounded-full bg-[#F45B0E] text-[#171512] text-[10px] font-bold uppercase tracking-[0.12em] px-3 py-1.5">{{ __('home.pricing.popular') }}</span>@endif
</div>
<p class="mt-2 text-sm {{ $i === 1 ? 'text-[#A79E97]' : 'muted' }}">{{ $tier['desc'] }}</p>
<p class="mt-7 text-[11px] font-semibold uppercase tracking-[0.16em] {{ $i === 1 ? 'text-[#FF7A33]' : 'brand-text' }}">{{ __('home.pricing.tier_price_value') }}</p>
<p class="mt-1 text-3xl font-extrabold tracking-tight {{ $i === 1 ? 'text-[#FF7A33]' : '' }}">{{ $tier['from'] }}</p>
<div class="mt-auto pt-7">
<p class="text-[11px] font-semibold uppercase tracking-[0.16em] {{ $i === 1 ? 'text-[#A79E97]' : 'muted' }}">{{ __('home.pricing.tier_best_for') }}</p>
<p class="mt-1.5 text-sm font-semibold">{{ $tier['best_for'] }}</p>
</div>
</article>
@endforeach
</div>

{{-- Step 2: what every build ships with. This is the strongest claim on the page, so it gets
     the brand field and its own headline. --}}
<div class="mt-6 reveal rounded-[2rem] bg-[#F45B0E] text-[#171512] px-8 sm:px-12 py-12">
<div class="flex flex-wrap items-end justify-between gap-6">
<div>
<p class="text-[11px] font-bold uppercase tracking-[0.2em]">{{ __('home.pricing.section_label') }}</p>
<h3 class="mt-3 text-3xl sm:text-4xl font-extrabold tracking-tight">{{ __('home.pricing.includes_heading') }}</h3>
</div>
<p class="max-w-sm">{{ __('home.pricing.includes_body') }}</p>
</div>
<ul class="mt-10 grid sm:grid-cols-2 lg:grid-cols-3 gap-x-10 gap-y-8">
@foreach(__('home.pricing.includes') as $item)
<li class="flex items-start gap-4">
<span class="w-11 h-11 rounded-2xl bg-[#171512] text-[#F45B0E] grid place-items-center shrink-0" aria-hidden="true"><i class="ph {{ $item['icon'] }} text-xl"></i></span>
<div>
<h4 class="font-bold">{{ $item['title'] }}</h4>
<p class="mt-1 text-sm text-[#3A1D05]">{{ $item['desc'] }}</p>
</div>
</li>
@endforeach
</ul>
<p class="mt-10 pt-8 border-t border-[#171512]/25 text-sm font-semibold">{{ __('home.pricing.tier_footnote') }}</p>
</div>

{{-- Step 3: the project-type matrix. Dense and scannable, for buyers who already know what
     they want and only need the number. --}}
<div class="mt-16 reveal">
<h3 class="text-2xl font-extrabold tracking-tight">{{ __('home.pricing.tier_price_label') }}</h3>
<div class="mt-6 rounded-[2rem] border border-[#171512]/10 bg-white p-2 overflow-x-auto">
<table class="w-full min-w-[760px] text-left border-collapse overflow-hidden rounded-[1.6rem]">
<thead><tr class="bg-[#FDFAF7] border-b border-[#171512]/10">
<th class="p-6"></th>
@foreach(__('home.pricing.tiers') as $i => $tier)
<th class="p-6 align-top {{ $i===1 ? 'bg-[#FDE7DA]' : '' }}">
<p class="text-xl font-bold">{{ $tier['name'] }}</p>
<p class="text-xs muted mt-1">{{ $tier['desc'] }}</p>
</th>
@endforeach
</tr></thead>
<tbody>
@foreach(__('home.pricing.sow') as $sow)
<tr class="border-b border-[#171512]/10 last:border-0">
<td class="p-6"><p class="font-bold">{{ $sow['name'] }}</p><p class="text-xs muted mt-1 max-w-[26ch]">{{ $sow['desc'] }}</p></td>
@foreach($sow['prices'] as $i => $price)
<td class="p-6 {{ $i===1 ? 'bg-[#FDE7DA]' : '' }}"><span class="text-xl font-bold {{ $i===1 ? 'text-[#8F2F06]' : '' }}">{{ $price }}</span></td>
@endforeach
</tr>
@endforeach
</tbody>
</table>
</div>
</div>

{{-- Step 4: care plans, so the relationship after launch is priced and visible. --}}
<div class="mt-16 grid lg:grid-cols-12 gap-10">
<div class="lg:col-span-4 reveal"><h3 class="text-3xl font-extrabold tracking-tight">{{ __('home.pricing.care_heading') }}</h3><p class="mt-3 muted">{{ __('home.pricing.care_body') }}</p></div>
<div class="lg:col-span-8 grid sm:grid-cols-3 gap-5">
@foreach(__('home.pricing.care') as $plan)
<article class="card reveal rounded-3xl border border-[#171512]/10 bg-white p-7">
<h4 class="font-bold text-lg">{{ $plan['name'] }}</h4>
<p class="mt-3"><span class="text-2xl font-extrabold brand-text">{{ $plan['price'] }}</span><span class="text-xs muted">{{ $plan['unit'] }}</span></p>
<p class="mt-3 text-sm muted">{{ $plan['desc'] }}</p>
</article>
@endforeach
</div>
</div>

{{-- Step 5: why the studio, as four reasons, then the close. --}}
<div class="mt-16 grid lg:grid-cols-12 gap-10">
<div class="lg:col-span-4 reveal"><h3 class="text-3xl font-extrabold tracking-tight">{{ __('home.pricing.partner_heading') }}</h3><p class="mt-3 muted">{{ __('home.pricing.partner_body') }}</p></div>
<div class="lg:col-span-8 grid sm:grid-cols-2 gap-5">
@foreach(__('home.pricing.partner') as $item)
<article class="card reveal rounded-3xl border border-[#171512]/10 bg-white p-7">
<span class="w-11 h-11 rounded-2xl bg-[#FDE7DA] text-[#8F2F06] grid place-items-center" aria-hidden="true"><i class="ph {{ $item['icon'] }} text-xl"></i></span>
<h4 class="mt-4 font-bold">{{ $item['title'] }}</h4>
<p class="mt-2 text-sm muted">{{ $item['desc'] }}</p>
</article>
@endforeach
</div>
</div>

<div class="mt-14 pt-8 border-t border-[#171512]/10 flex flex-wrap items-center justify-between gap-5 reveal">
<p class="text-xs muted max-w-2xl">{{ __('home.pricing.note') }}</p>
<a href="#hubungi" class="rounded-full bg-[#F45B0E] text-[#171512] font-bold px-7 py-3.5 hover:bg-[#171512] hover:text-[#FDFAF7] transition">{{ __('home.pricing.cta') }}</a>
</div>
</div>
</section>

{{-- Sectors: ruled list, not chips --}}
<section class="max-w-7xl mx-auto px-5 sm:px-10 py-24">
<h2 class="reveal text-3xl sm:text-4xl font-extrabold tracking-tight">{{ __('home.sectors.heading') }}</h2>
<ul class="mt-10 grid grid-cols-2 sm:grid-cols-3 gap-x-8 gap-y-4">
<li class="reveal border-t border-[#171512]/15 pt-4 text-lg font-medium">{{ __('home.sectors.hospitality') }}</li>
<li class="reveal border-t border-[#171512]/15 pt-4 text-lg font-medium">{{ __('home.sectors.wellness') }}</li>
<li class="reveal border-t border-[#171512]/15 pt-4 text-lg font-medium">{{ __('home.sectors.sustainability') }}</li>
<li class="reveal border-t border-[#171512]/15 pt-4 text-lg font-medium">{{ __('home.sectors.culture') }}</li>
<li class="reveal border-t border-[#171512]/15 pt-4 text-lg font-medium">{{ __('home.sectors.lifestyle') }}</li>
<li class="reveal border-t border-[#171512]/15 pt-4 text-lg font-medium">{{ __('home.sectors.social_impact') }}</li>
<li class="reveal border-t border-[#171512]/15 pt-4 text-lg font-medium">{{ __('home.sectors.education') }}</li>
<li class="reveal border-t border-[#171512]/15 pt-4 text-lg font-medium">{{ __('home.sectors.technology') }}</li>
<li class="reveal border-t border-[#171512]/15 pt-4 text-lg font-medium brand-text">{{ __('home.sectors.more') }}</li>
</ul>
</section>

{{-- Field notes: live DB, latest published posts for this locale. Flat white cards on the
     paper ground, so the composition differs from the ruled sectors list above it (RHYTHM 2).
     Text-led on purpose: the work section already owns the image grid. --}}
@php $sawahPosts = \App\Models\Post::published()->forLocale()->with('category')->orderByDesc('published_at')->take(6)->get(); @endphp
<section id="catatan" class="scroll-mt-28 max-w-7xl mx-auto px-5 sm:px-10 py-28">
<div class="flex flex-wrap items-end justify-between gap-6 reveal">
<div>
<p class="text-[11px] font-semibold uppercase tracking-[0.2em] brand-text">{{ __('home.blog.section_label') }}</p>
<h2 class="mt-4 text-4xl sm:text-5xl font-extrabold tracking-tight">{{ __('home.blog.heading') }}</h2>
</div>
<a href="{{ route('posts.index', ['locale' => app()->getLocale()]) }}" class="rounded-full border border-[#171512]/20 px-6 py-3 font-semibold hover:border-[#F45B0E] hover:text-[#C9440B] transition">{{ __('layout.nav.blog') }} <span aria-hidden="true">&rarr;</span></a>
</div>
<p class="mt-4 muted max-w-xl">{{ __('home.blog.subtitle') }}</p>
@if($sawahPosts->count())
<div class="mt-14 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
@foreach($sawahPosts as $post)
<a href="{{ route('posts.show', ['locale' => app()->getLocale(), 'slug' => $post->slug]) }}" class="card reveal group flex flex-col rounded-3xl border border-[#171512]/10 bg-white p-7">
@if($post->category)<p class="text-[11px] font-semibold uppercase tracking-[0.16em] brand-text">{{ $post->category->name }}</p>@endif
<h3 class="mt-3 text-2xl font-bold leading-snug group-hover:text-[#C9440B] transition">{{ $post->title }}</h3>
<p class="mt-3 muted text-[15px] leading-relaxed">{{ $post->excerpt(20) }}</p>
<p class="mt-auto pt-6 text-xs uppercase tracking-[0.14em] muted">@if($post->published_at){{ $post->published_at->format('j M Y') }} &middot; @endif{{ __('posts.card.reading_time', ['minutes' => $post->readingTime()]) }}</p>
</a>
@endforeach
</div>
@else
<p class="mt-12 muted">{{ __('home.blog.empty') }}</p>
@endif
<a href="{{ route('posts.index', ['locale' => app()->getLocale()]) }}" class="reveal mt-12 flex w-full items-center justify-center gap-3 rounded-full bg-[#F45B0E] text-[#171512] font-bold px-8 py-4 hover:bg-[#171512] hover:text-[#FDFAF7] transition-all duration-500">{{ __('home.blog.view_all') }} <i class="ph ph-arrow-right" aria-hidden="true"></i></a>
</section>

{{-- Team: the studio is two people, so this is two cards with a real offset rather than a
     carousel, a fake crew grid, or a "meet the team" page that only has three names on it. --}}
<section id="tim" class="scroll-mt-28 border-t border-[#171512]/10 px-5 sm:px-10 py-28">
<div class="max-w-7xl mx-auto">
<div class="flex flex-wrap items-end justify-between gap-6 reveal">
<div>
<p class="text-[11px] font-semibold uppercase tracking-[0.2em] brand-text">{{ __('home.team.section_label') }}</p>
<h2 class="mt-4 text-4xl sm:text-5xl font-extrabold tracking-tight">{{ __('home.team.heading') }}</h2>
</div>
<p class="max-w-sm muted">{{ __('home.team.subtitle') }}</p>
</div>
<div class="mt-14 grid lg:grid-cols-2 gap-6 items-stretch">
@foreach(__('home.team.members') as $i => $member)
{{-- items-stretch plus h-full keeps the two cards the same height even though the bios run to
     different lengths. No top offset on the second card: that pushed its avatar and name 24px
     below the first card's and broke the row alignment. The slack sits at the bottom instead,
     where mt-auto pins the LinkedIn link. --}}
<article class="card reveal flex flex-col h-full rounded-3xl border border-[#171512]/10 bg-white p-8 sm:p-10">
{{-- items-center centres the role + name block against the avatar, so the two cards read as the
     same shape. items-start left the 54px text block hanging off an 80px avatar. --}}
<div class="flex items-center gap-6">
<span class="w-20 h-20 rounded-3xl grid place-items-center font-extrabold text-2xl shrink-0 {{ $i === 0 ? 'bg-[#F45B0E] text-[#171512]' : 'bg-[#171512] text-[#FDFAF7]' }}" aria-hidden="true">{{ $member['initials'] }}</span>
<div>
<p class="text-[11px] font-semibold uppercase tracking-[0.16em] brand-text">{{ $member['role'] }}</p>
<h3 class="mt-2 text-2xl font-bold">{{ $member['name'] }}</h3>
</div>
</div>
<p class="mt-6 muted leading-relaxed">{{ $member['bio'] }}</p>
<ul class="mt-6 flex flex-wrap gap-2">
@foreach($member['focus'] as $skill)
<li class="rounded-full border border-[#171512]/15 px-3.5 py-1.5 text-xs font-semibold">{{ $skill }}</li>
@endforeach
</ul>
<a href="{{ $member['linkedin'] }}" target="_blank" rel="noopener" class="mt-auto pt-7 inline-flex items-center gap-2 text-sm font-semibold hover:text-[#C9440B] transition"><i class="ph ph-linkedin-logo text-base" aria-hidden="true"></i> <span class="underline underline-offset-8 decoration-[#C9440B]/50">LinkedIn</span> <span aria-hidden="true">&#8599;</span></a>
</article>
@endforeach
</div>
</div>
</section>

{{-- Contact + footer. On the brand fill the text is ink: white on #F45B0E is 3.31:1 and fails. --}}
<footer id="hubungi" class="scroll-mt-28 bg-[#F45B0E] text-[#171512] px-5 sm:px-10 pt-24 pb-10 relative overflow-hidden">
<img src="https://images.unsplash.com/photo-1552272492-3053fbacbf4b?auto=format&fit=crop&w=1600&h=500&q=80" alt="" aria-hidden="true" class="absolute inset-0 w-full h-full object-cover opacity-[0.14] mix-blend-luminosity">
<div class="relative max-w-7xl mx-auto">
<h2 class="font-extrabold tracking-tight leading-[1.0] text-[clamp(2.8rem,7vw,6rem)] max-w-4xl">{{ __('home.contact.heading') }}</h2>
<p class="mt-5 text-lg max-w-xl">{{ __('home.contact.subtitle') }}</p>
<div class="mt-8 flex flex-wrap gap-4">
<a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" class="rounded-full bg-[#171512] text-[#FDFAF7] font-bold px-8 py-4 hover:bg-[#FDFAF7] hover:text-[#171512] transition active:scale-[0.98]">{{ __('home.hero.cta_contact') }}</a>
<a href="{{ route('projects.index', ['locale' => app()->getLocale()]) }}" class="rounded-full border-2 border-[#171512]/40 font-bold px-8 py-4 hover:bg-[#171512]/10 transition">{{ __('home.hero.cta_work') }}</a>
</div>
@php $conceptSetting = \App\Models\SiteSetting::first(); $conceptSocials = \App\Models\SocialLink::orderBy('sort_order')->get(); @endphp
<div class="mt-8 flex flex-wrap gap-x-8 gap-y-2 text-sm">
@if($conceptSetting)<p><span class="text-[11px] font-semibold uppercase tracking-[0.14em]">Email: </span><a href="mailto:{{ $conceptSetting->email }}" class="underline">{{ $conceptSetting->email }}</a></p>
<p><span class="text-[11px] font-semibold uppercase tracking-[0.14em]">WA: </span><a href="https://wa.me/{{ preg_replace('/\D/','',$conceptSetting->phone) }}" class="underline">{{ $conceptSetting->phone_display }}</a></p>
<p><span class="text-[11px] font-semibold uppercase tracking-[0.14em]">Studio: </span>{{ $conceptSetting->address }}</p>@endif
@foreach($conceptSocials as $s)<p><a href="{{ $s->url }}" target="_blank" rel="noopener" class="underline">{{ $s->platform }} <span aria-hidden="true">&#8599;</span></a></p>@endforeach
</div>
<div class="mt-10 pt-8 border-t border-[#171512]/25 flex flex-wrap justify-between gap-4 text-sm">
<p>{{ __('layout.footer.copyright', ['year' => date('Y')]) }}</p>
<p>{!! __('layout.footer.made_with', ['soul' => '<span class="italic">'.__('layout.footer.made_with_soul').'</span>']) !!}</p>
</div>
</div>
</footer>
<script>
const io=new IntersectionObserver(es=>es.forEach(e=>e.isIntersecting&&e.target.classList.add('in')),{threshold:.15});
document.querySelectorAll('.reveal').forEach(el=>io.observe(el));
(function(){const t=document.getElementById('navToggle'),m=document.getElementById('mobileNav'),s=document.getElementById('siteNav');if(t&&m){const set=o=>{m.classList.toggle('open',o);t.setAttribute('aria-expanded',o?'true':'false');if(s)s.classList.toggle('nav-open',o);const i=t.querySelector('i');if(i){i.classList.toggle('ph-list',!o);i.classList.toggle('ph-x',o);}document.documentElement.style.overflow=o?'hidden':'';};t.addEventListener('click',()=>set(!m.classList.contains('open')));m.querySelectorAll('a').forEach(a=>a.addEventListener('click',()=>set(false)));document.addEventListener('keydown',e=>{if(e.key==='Escape')set(false)});window.addEventListener('resize',()=>{if(window.innerWidth>=768)set(false)});}if(s){const on=()=>s.classList.toggle('scrolled',window.scrollY>24);on();window.addEventListener('scroll',on,{passive:true});}})();
</script>
</body>
</html>
