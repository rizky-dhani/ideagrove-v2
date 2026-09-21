<!DOCTYPE html>
{{-- CONCEPT 3: "BANJAR" v5: digital-agency studio on a dark ground, logo colour as the base.
  Copy source: lang/en + lang/id via __(). EN/ID stay in sync.
  Direction: DESIGN.md, dial ENERGY 3 / RHYTHM 3 / MOTION 2.
  Palette: ground #141210, panel #1E1B19, brand orange #F45B0E (the logo colour) as the field
  and the accent. Brand on ground is 5.65:1 and on panel 5.18:1, so it reads as text.
  On a brand fill the text is ink #171512 (5.51:1) and the muted tone is #3A1D05 (4.68:1).
  White on #F45B0E is 3.31:1 and fails, so it is never used. --}}
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ __('layout.meta.home.title') }} | Concept: Banjar</title>
<meta name="description" content="{{ __('layout.meta.home.description') }}">
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<script src="https://unpkg.com/@phosphor-icons/web"></script>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,400;12..96,600;12..96,700;12..96,800&display=swap" rel="stylesheet">
<style>
:root{--ground:#141210;--panel:#1E1B19;--panel-2:#26221F;--text:#F7F1EC;--muted:#A79E97;--brand:#F45B0E;--brand-bright:#FF7A33;--ink:#171512;--ink-muted:#3A1D05;--hair:#3D3733}
body{font-family:'Bricolage Grotesque',sans-serif;background:var(--ground);color:var(--text)}
.muted{color:var(--muted)}
.on-brand{color:var(--ink)}.on-brand .muted{color:var(--ink-muted)}
.reveal{opacity:0;transform:translateY(24px);transition:opacity .8s cubic-bezier(.32,.72,0,1),transform .8s cubic-bezier(.32,.72,0,1)}
.reveal.in{opacity:1;transform:none}
/* Panels are defined by a hairline and a one-step lift, not by a shadow (R-10 dose cap). */
.panel{background:var(--panel);border:1px solid var(--hair);border-radius:1.6rem}
.panel:hover{border-color:var(--brand)}
/* Ruled rows: the agency index. The number is the only brand-coloured element. */
.row{border-top:1px solid var(--hair);transition:background .35s ease,padding-left .35s ease}
.row:hover{background:rgba(244,91,14,.12);padding-left:1.25rem}
.marquee{animation:slide 30s linear infinite}.marquee>span{padding-right:3rem}
@keyframes slide{to{transform:translateX(-50%)}}
::selection{background:var(--brand);color:var(--ink)}
#siteNav{transition:background .45s ease,box-shadow .45s ease,backdrop-filter .45s ease}
#siteNav.scrolled,#siteNav.nav-open{background:rgba(20,18,16,.9);backdrop-filter:blur(16px);box-shadow:0 14px 40px -28px rgba(0,0,0,.9);border-bottom:1px solid var(--hair)}
#mobileNav{display:none}#mobileNav.open{display:flex}
.brand-logo{--logo-c:var(--brand);position:relative;display:block;overflow:hidden;aspect-ratio:1829/480;width:auto;height:2.5rem}
.brand-logo::after{content:"";position:absolute;left:-2.4046%;top:-59.5833%;width:104.9754%;height:225%;background-color:var(--logo-c);-webkit-mask:url("{{ asset('assets/images/Logo_Landscape.webp') }}") center/100% 100% no-repeat;mask:url("{{ asset('assets/images/Logo_Landscape.webp') }}") center/100% 100% no-repeat}
@media(prefers-reduced-motion:reduce){.reveal{opacity:1;transform:none}.marquee{animation:none}}
</style>
</head>
<body class="antialiased overflow-x-clip">
<a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-[100] focus:rounded-lg focus:bg-[#F45B0E] focus:px-4 focus:py-2 focus:text-sm focus:font-bold focus:text-[#171512]">{{ __('layout.nav.skip_to_content') }}</a>

<div id="siteNav" class="sticky top-0 z-[60]">
<nav class="max-w-7xl mx-auto px-5 sm:px-8 py-4" aria-label="Primary">
<div class="flex items-center justify-between gap-3">
<a href="{{ url('/') }}" class="brand-logo" role="img" aria-label="The Idea Grove Studio"></a>
<div class="hidden md:flex gap-7 text-[15px] font-medium"><a href="#layanan" class="hover:text-[#FF7A33] transition">{{ __('home.services.heading') }}</a><a href="#kerja" class="hover:text-[#FF7A33] transition">{{ __('layout.nav.work') }}</a><a href="#tim" class="hover:text-[#FF7A33] transition">{{ __('layout.nav.team') }}</a><a href="#harga" class="hover:text-[#FF7A33] transition">{{ __('layout.nav.pricing') }}</a><a href="#krama" class="hover:text-[#FF7A33] transition">{{ __('contact.reach_out') }}</a></div>
<div class="flex items-center gap-2">
<a href="#gabung" class="hidden sm:inline-block rounded-full bg-[#F45B0E] text-[#171512] text-sm font-bold px-6 py-2.5 hover:bg-[#FF7A33] transition">{{ __('home.hero.cta_contact') }}</a>
<button type="button" id="navToggle" class="md:hidden w-11 h-11 rounded-full bg-[#F45B0E] text-[#171512] flex items-center justify-center" aria-expanded="false" aria-controls="mobileNav" aria-label="{{ __('layout.nav.toggle_menu') }}"><i class="ph ph-list text-xl"></i></button>
</div>
</div>
</nav>
</div>
<div id="mobileNav" class="fixed inset-0 z-[55] md:hidden flex-col justify-center gap-2 px-6 bg-[#141210]/98 backdrop-blur-2xl">
<a href="#layanan" class="block px-5 py-4 rounded-2xl text-2xl font-extrabold hover:bg-[#F45B0E]/12 transition">{{ __('home.services.heading') }}</a>
<a href="#kerja" class="block px-5 py-4 rounded-2xl text-2xl font-extrabold hover:bg-[#F45B0E]/12 transition">{{ __('layout.nav.work') }}</a>
<a href="#tim" class="block px-5 py-4 rounded-2xl text-2xl font-extrabold hover:bg-[#F45B0E]/12 transition">{{ __('layout.nav.team') }}</a>
<a href="#harga" class="block px-5 py-4 rounded-2xl text-2xl font-extrabold hover:bg-[#F45B0E]/12 transition">{{ __('layout.nav.pricing') }}</a>
<a href="#krama" class="block px-5 py-4 rounded-2xl text-2xl font-extrabold hover:bg-[#F45B0E]/12 transition">{{ __('contact.reach_out') }}</a>
<a href="#gabung" class="mt-2 block text-center rounded-2xl bg-[#F45B0E] text-[#171512] text-lg font-extrabold px-5 py-4 transition">{{ __('home.hero.cta_contact') }}</a>
</div>

<main id="main">
{{-- Hero: asymmetric 7/5 split. The right panel is the brand field, so the accent lands at
     the top of the page instead of only at the bottom. --}}
<header class="max-w-7xl mx-auto px-5 sm:px-8 grid lg:grid-cols-12 gap-10 items-center pt-10 pb-24">
<div class="lg:col-span-7 reveal in">
<p class="flex items-center gap-3 text-[11px] font-bold uppercase tracking-[0.2em] text-[#FF7A33]"><span class="w-8 h-px bg-[#F45B0E]"></span>{{ __('home.hero.badge') }}</p>
<h1 class="mt-6 font-extrabold tracking-tight leading-[0.98] text-[clamp(2.6rem,6vw,5rem)]">{!! __('home.hero.heading', ['considered' => '<span class="text-[#F45B0E]">'.__('home.hero.heading_em').'</span>']) !!}</h1>
<p class="mt-6 text-lg muted max-w-[46ch] leading-relaxed">{{ __('home.hero.subtitle') }}</p>
<div class="mt-8 flex flex-wrap gap-3">
<a href="#kerja" class="rounded-full bg-[#F45B0E] text-[#171512] font-bold px-7 py-3.5 hover:bg-[#FF7A33] transition">{{ __('home.hero.cta_work') }} <span aria-hidden="true">&darr;</span></a>
<a href="#gabung" class="rounded-full border border-[#3D3733] px-7 py-3.5 font-bold hover:border-[#F45B0E] hover:text-[#FF7A33] transition">{{ __('home.hero.cta_contact') }}</a>
</div>
{{-- R-23/R-38: the studio has two people and no released photography, so the row is the real
     roster as initials. No stock faces, and no invented teammates. --}}
<div class="mt-10 flex items-center gap-4">
<div class="flex -space-x-3" aria-hidden="true">
@foreach(__('home.team.members') as $i => $member)
<span class="w-11 h-11 rounded-full border-[3px] border-[#141210] grid place-items-center font-extrabold text-sm {{ $i === 0 ? 'bg-[#F45B0E] text-[#171512]' : 'bg-[#1E1B19] text-[#F7F1EC]' }}">{{ $member['initials'] }}</span>
@endforeach
</div>
<p class="text-sm"><span class="font-bold">{{ __('home.hero.disciplines_value') }}</span> <span class="muted">&middot; {{ __('home.hero.engagements_value') }}</span></p>
</div>
</div>
<div class="lg:col-span-5 relative reveal in">
<div class="on-brand rounded-[2rem] bg-[#F45B0E] p-8">
<p class="text-[11px] font-bold uppercase tracking-[0.18em]">{{ __('home.hero.studio_label') }}</p>
<p class="mt-2 text-3xl font-extrabold leading-tight">{{ __('home.hero.studio_value') }}</p>
<div class="mt-6 pt-6 border-t border-[#171512]/25 grid grid-cols-2 gap-5">
<div><p class="text-[11px] font-bold uppercase tracking-[0.16em]">{{ __('home.hero.disciplines_label') }}</p><p class="mt-1 font-bold">{{ __('home.hero.disciplines_value') }}</p></div>
<div><p class="text-[11px] font-bold uppercase tracking-[0.16em]">{{ __('home.hero.engagements_label') }}</p><p class="mt-1 font-bold">{{ __('home.hero.engagements_value') }}</p></div>
</div>
</div>
<img src="https://images.unsplash.com/photo-1765648580725-1d31acc6f048?auto=format&fit=crop&w=800&h=520&q=80" alt="Outdoor cafe workspace with a laptop on the table" class="mt-5 rounded-[2rem] w-full aspect-[16/10] object-cover border border-[#3D3733]">
</div>
</header>

{{-- Full-bleed brand ticker: the web services the studio sells, and the second and last use
     of the brand field on the page. --}}
<div class="on-brand bg-[#F45B0E] py-5 overflow-hidden" aria-hidden="true">
<div class="marquee flex whitespace-nowrap w-max text-2xl sm:text-3xl font-extrabold tracking-tight">@for($i=0;$i<8;$i++)<span>@foreach(__('home.hero.services_marquee') as $service)<span>{{ $service }} <span class="text-[#3A1D05]">&bull;</span></span> @endforeach</span>@endfor</div>
</div>

{{-- Ethos: asymmetric 4/8 split, three panels, the care panel carries the brand border. --}}
<section class="max-w-7xl mx-auto px-5 sm:px-8 py-24 grid lg:grid-cols-12 gap-10">
<div class="lg:col-span-4 reveal"><h2 class="text-4xl sm:text-5xl font-extrabold tracking-tight leading-[1.05]">{!! __('home.ethos.heading') !!}</h2>
<p class="mt-5 muted leading-relaxed max-w-[38ch]">{{ __('home.ethos.body') }}</p></div>
<div class="lg:col-span-8 reveal grid sm:grid-cols-3 gap-5">
<div class="panel p-6"><i class="ph ph-ear text-3xl text-[#FF7A33]"></i><h3 class="font-bold mt-3 text-lg">{{ __('home.ethos.research_title') }}</h3><p class="text-sm muted mt-2">{{ __('home.ethos.research_body') }}</p></div>
<div class="panel p-6"><i class="ph ph-pen-nib text-3xl text-[#FF7A33]"></i><h3 class="font-bold mt-3 text-lg">{{ __('home.ethos.design_title') }}</h3><p class="text-sm muted mt-2">{{ __('home.ethos.design_body') }}</p></div>
<div class="panel p-6 !border-[#F45B0E]"><i class="ph ph-hand-heart text-3xl text-[#FF7A33]"></i><h3 class="font-bold mt-3 text-lg">{{ __('home.ethos.care_title') }}</h3><p class="text-sm muted mt-2">{{ __('home.ethos.care_body') }}</p></div>
</div>
</section>

{{-- Services: the agency index. A ruled list, not a card grid, so the section reads as a
     different composition from the hero and the ethos (RHYTHM 3). --}}
<section id="layanan" class="scroll-mt-24 border-y border-[#3D3733] bg-[#1E1B19]/40 px-5 sm:px-8 py-24">
<div class="max-w-7xl mx-auto">
<div class="flex flex-wrap items-end justify-between gap-6 reveal">
<h2 class="text-4xl sm:text-5xl font-extrabold tracking-tight">{{ __('home.services.heading') }}</h2>
<p class="max-w-sm muted">{{ __('home.services.subtitle') }}</p>
</div>
<div class="mt-12">
@foreach([
  ['01', 'brand', 'ph-fingerprint'],
  ['02', 'web', 'ph-layout'],
  ['03', 'dev', 'ph-code'],
  ['04', 'strategy', 'ph-compass'],
] as [$num, $key, $icon])
<div class="row reveal group flex items-start gap-6 sm:gap-10 py-8">
<span class="text-sm font-bold text-[#FF7A33] pt-2 tabular-nums shrink-0">{{ $num }}</span>
<i class="ph {{ $icon }} text-2xl text-[#F45B0E] mt-1 shrink-0 hidden sm:block"></i>
<h3 class="text-2xl sm:text-4xl font-extrabold tracking-tight w-full sm:max-w-[16ch] shrink-0">{{ __('home.services.'.$key.'_title') }}</h3>
<p class="muted max-w-[46ch] pt-1">{{ __('home.services.'.$key.'_body') }}</p>
</div>
@endforeach
<div class="border-t border-[#3D3733]"></div>
</div>
</div>
</section>

{{-- Work: live DB, full-bleed edge-to-edge grid, one project spans two columns. --}}
@php $banjarProjects = \App\Models\Project::orderBy('created_at','desc')->get(); $banjarSetting = \App\Models\SiteSetting::first(); @endphp
<section id="kerja" class="scroll-mt-24 py-24">
<div class="max-w-7xl mx-auto px-5 sm:px-8 flex flex-wrap items-end justify-between gap-6">
<h2 class="reveal text-4xl sm:text-5xl font-extrabold tracking-tight">{{ __('home.work.heading') }}</h2>
<a href="{{ route('projects.index', ['locale' => app()->getLocale()]) }}" class="rounded-full border border-[#3D3733] px-6 py-3 text-sm font-bold hover:border-[#F45B0E] hover:text-[#FF7A33] transition">{{ __('home.work.view_all') }}</a>
</div>
<p class="max-w-7xl mx-auto px-5 sm:px-8 mt-4"><span class="muted inline-block max-w-xl">{{ __('home.work.subtitle') }}</span></p>
@if($banjarProjects->count())
<div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-px bg-[#3D3733] border-y border-[#3D3733]">
@foreach($banjarProjects as $project)
<a href="{{ route('projects.show', ['locale' => app()->getLocale(), 'project' => $project]) }}" class="reveal group relative block bg-[#141210] overflow-hidden {{ $loop->first ? 'sm:col-span-2' : '' }}">
@if($project->imageUrl())
<img src="{{ $project->imageUrl() }}" alt="{{ $project->name }}" loading="lazy" class="w-full {{ $loop->first ? 'aspect-[16/9]' : 'aspect-[4/3]' }} object-cover opacity-85 group-hover:opacity-100 group-hover:scale-[1.03] transition duration-700">
@else
<div class="w-full aspect-[4/3] bg-[#1E1B19] grid place-items-center font-extrabold text-[#FF7A33]">{{ $project->name }}</div>
@endif
<div class="absolute inset-0 bg-gradient-to-t from-[#141210] via-[#141210]/20 to-transparent"></div>
<div class="absolute bottom-0 left-0 right-0 p-7 flex items-end justify-between gap-4">
<div>
@if($project->client_name)<p class="text-[11px] font-bold uppercase tracking-[0.16em] text-[#FF7A33]">{{ $project->client_name }}</p>@endif
<h3 class="mt-2 text-xl sm:text-2xl font-extrabold">{{ $project->name }}</h3>
</div>
<span class="w-10 h-10 rounded-full bg-[#F45B0E] text-[#171512] grid place-items-center shrink-0 group-hover:translate-x-1 transition-transform"><i class="ph ph-arrow-up-right"></i></span>
</div>
</a>
@endforeach
</div>
@endif
</section>

{{-- Pricing: SOW x tier. Professional carries the brand fill because it is the build the
     studio recommends for a complete first release, not because it is the middle column. --}}
{{-- Pricing, rebuilt around what the studio delivers rather than a bare price grid.
     Order: tiers (what shape) -> includes (what is always in it) -> project types (what it
     costs) -> care -> why us. The tier cards lead with a number and a "best for" line instead
     of repeating all five project prices three times, and the includes band carries the brand
     field because that list is the strongest claim on the page. --}}
<section id="harga" class="scroll-mt-24 max-w-7xl mx-auto px-5 sm:px-8 py-24">
<div class="flex flex-wrap items-end justify-between gap-6 reveal">
<div><h2 class="text-4xl sm:text-5xl font-extrabold tracking-tight max-w-xl leading-[1.05]">{{ __('home.pricing.heading') }}</h2></div>
<p class="max-w-sm muted">{{ __('home.pricing.subtitle') }}</p>
</div>

{{-- Step 1: the three shapes of engagement. --}}
<div class="mt-12 grid md:grid-cols-3 gap-5 items-stretch auto-rows-fr">
@foreach(__('home.pricing.tiers') as $i => $tier)
<article class="reveal flex flex-col h-full rounded-[1.6rem] p-7 relative {{ $i===1 ? 'on-brand bg-[#F45B0E] border border-[#F45B0E]' : 'panel' }}">
@if($i===1)
<span class="absolute -top-3 right-6 rounded-full bg-[#171512] text-[#F7F1EC] text-[10px] font-bold uppercase tracking-[0.12em] px-3 py-1.5">{{ __('home.pricing.popular') }}</span>
@endif
<h3 class="text-2xl font-extrabold">{{ $tier['name'] }}</h3>
<p class="text-sm muted mt-1">{{ $tier['desc'] }}</p>
<p class="mt-7 text-[11px] font-bold uppercase tracking-[0.16em] {{ $i===1 ? '' : 'text-[#FF7A33]' }}">{{ __('home.pricing.tier_price_value') }}</p>
<p class="mt-1 text-3xl font-extrabold tracking-tight {{ $i===1 ? '' : 'text-[#FF7A33]' }}">{{ $tier['from'] }}</p>
<div class="mt-auto pt-7 border-t {{ $i===1 ? 'border-[#171512]/25' : 'border-[#3D3733]' }}">
<p class="text-[11px] font-bold uppercase tracking-[0.16em] muted">{{ __('home.pricing.tier_best_for') }}</p>
<p class="mt-1.5 text-sm font-bold">{{ $tier['best_for'] }}</p>
</div>
</article>
@endforeach
</div>

{{-- Step 2: what every build ships with. --}}
<div class="mt-6 reveal on-brand rounded-[2rem] bg-[#F45B0E] px-8 sm:px-12 py-12">
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
<p class="mt-10 pt-8 border-t border-[#171512]/25 text-sm font-bold">{{ __('home.pricing.tier_footnote') }}</p>
</div>

{{-- Step 3: the project-type matrix, kept dense for buyers who already know the number they
     need. Uses the ruled-row language of the services index. --}}
<div class="mt-16 reveal">
<h3 class="text-2xl font-extrabold tracking-tight">{{ __('home.pricing.tier_price_label') }}</h3>
<div class="mt-6 panel overflow-x-auto">
<table class="w-full min-w-[720px] text-left border-collapse">
<thead><tr class="border-b border-[#3D3733]">
<th class="p-6"></th>
@foreach(__('home.pricing.tiers') as $i => $tier)
<th class="p-6 align-top">
<p class="text-xl font-extrabold {{ $i===1 ? 'text-[#FF7A33]' : '' }}">{{ $tier['name'] }}</p>
<p class="text-xs muted mt-1">{{ $tier['desc'] }}</p>
</th>
@endforeach
</tr></thead>
<tbody>
@foreach(__('home.pricing.sow') as $sow)
<tr class="border-b border-[#3D3733] last:border-0">
<td class="p-6"><p class="font-bold">{{ $sow['name'] }}</p><p class="text-xs muted mt-1 max-w-[26ch]">{{ $sow['desc'] }}</p></td>
@foreach($sow['prices'] as $i => $price)
<td class="p-6"><span class="text-xl font-bold whitespace-nowrap {{ $i===1 ? 'text-[#FF7A33]' : '' }}">{{ $price }}</span></td>
@endforeach
</tr>
@endforeach
</tbody>
</table>
</div>
</div>

{{-- Step 4: care plans. --}}
<div class="mt-16 grid lg:grid-cols-12 gap-8">
<div class="lg:col-span-4 reveal"><h3 class="text-3xl font-extrabold tracking-tight">{{ __('home.pricing.care_heading') }}</h3><p class="mt-3 muted">{{ __('home.pricing.care_body') }}</p></div>
<div class="lg:col-span-8 grid sm:grid-cols-3 gap-5">
@foreach(__('home.pricing.care') as $plan)
<article class="reveal panel p-6">
<h4 class="font-bold">{{ $plan['name'] }}</h4>
<p class="mt-3"><span class="text-2xl font-extrabold text-[#FF7A33]">{{ $plan['price'] }}</span><span class="text-xs muted">{{ $plan['unit'] }}</span></p>
<p class="mt-3 text-sm muted">{{ $plan['desc'] }}</p>
</article>
@endforeach
</div>
</div>

{{-- Step 5: why the studio, then the close. --}}
<div class="mt-16 grid lg:grid-cols-12 gap-8">
<div class="lg:col-span-4 reveal"><h3 class="text-3xl font-extrabold tracking-tight">{{ __('home.pricing.partner_heading') }}</h3><p class="mt-3 muted">{{ __('home.pricing.partner_body') }}</p></div>
<div class="lg:col-span-8 grid sm:grid-cols-2 gap-5">
@foreach(__('home.pricing.partner') as $item)
<article class="reveal panel p-6">
<span class="w-11 h-11 rounded-2xl bg-[#F45B0E] text-[#171512] grid place-items-center" aria-hidden="true"><i class="ph {{ $item['icon'] }} text-xl"></i></span>
<h4 class="mt-4 font-bold">{{ $item['title'] }}</h4>
<p class="mt-2 text-sm muted">{{ $item['desc'] }}</p>
</article>
@endforeach
</div>
</div>

<div class="mt-14 pt-8 border-t border-[#3D3733] flex flex-wrap items-center justify-between gap-5 reveal">
<p class="text-xs muted max-w-2xl">{{ __('home.pricing.note') }}</p>
<a href="#gabung" class="rounded-full bg-[#F45B0E] text-[#171512] font-bold px-7 py-3.5 hover:bg-[#FF7A33] transition">{{ __('home.pricing.cta') }}</a>
</div>
</section>

{{-- Sectors: ruled chips, a third composition so the page keeps varying (RHYTHM 3). --}}
<section class="border-y border-[#3D3733] bg-[#1E1B19]/40 py-20 px-5 sm:px-8">
<div class="max-w-6xl mx-auto">
<h2 class="reveal text-3xl sm:text-4xl font-extrabold tracking-tight">{{ __('home.sectors.heading') }}</h2>
<div class="mt-8 flex flex-wrap gap-3">
<span class="reveal rounded-full border border-[#3D3733] px-5 py-2 text-sm">{{ __('home.sectors.hospitality') }}</span>
<span class="reveal rounded-full border border-[#3D3733] px-5 py-2 text-sm">{{ __('home.sectors.wellness') }}</span>
<span class="reveal rounded-full border border-[#3D3733] px-5 py-2 text-sm">{{ __('home.sectors.sustainability') }}</span>
<span class="reveal rounded-full border border-[#3D3733] px-5 py-2 text-sm">{{ __('home.sectors.culture') }}</span>
<span class="reveal rounded-full border border-[#3D3733] px-5 py-2 text-sm">{{ __('home.sectors.lifestyle') }}</span>
<span class="reveal rounded-full border border-[#3D3733] px-5 py-2 text-sm">{{ __('home.sectors.social_impact') }}</span>
<span class="reveal rounded-full border border-[#3D3733] px-5 py-2 text-sm">{{ __('home.sectors.education') }}</span>
<span class="reveal rounded-full border border-[#3D3733] px-5 py-2 text-sm">{{ __('home.sectors.technology') }}</span>
<span class="reveal rounded-full bg-[#F45B0E] text-[#171512] px-5 py-2 text-sm font-bold">{{ __('home.sectors.more') }}</span>
</div></div>
</section>

{{-- Team: the studio is two people. Ruled index rows, matching the services composition, so
     the section reads as a roster rather than as a set of profile cards. --}}
<section id="tim" class="scroll-mt-24 border-y border-[#3D3733] bg-[#1E1B19]/40 px-5 sm:px-8 py-24">
<div class="max-w-7xl mx-auto">
<div class="flex flex-wrap items-end justify-between gap-6 reveal">
<div>
<p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#FF7A33]">{{ __('home.team.section_label') }}</p>
<h2 class="mt-4 text-4xl sm:text-5xl font-extrabold tracking-tight">{{ __('home.team.heading') }}</h2>
</div>
<p class="max-w-sm muted">{{ __('home.team.subtitle') }}</p>
</div>
{{-- auto-rows-fr makes both roster rows the same height even though the bios run to different
     lengths, so the ruled index stays even instead of ending ragged. --}}
<div class="mt-12 grid auto-rows-fr">
@foreach(__('home.team.members') as $i => $member)
<article class="row reveal grid lg:grid-cols-12 gap-6 lg:gap-10 py-10">
<div class="lg:col-span-4 flex items-center gap-5">
<span class="w-16 h-16 rounded-2xl grid place-items-center font-extrabold text-xl shrink-0 {{ $i === 0 ? 'bg-[#F45B0E] text-[#171512]' : 'bg-[#1E1B19] text-[#F7F1EC] border border-[#3D3733]' }}" aria-hidden="true">{{ $member['initials'] }}</span>
<div>
<p class="text-[11px] font-bold uppercase tracking-[0.16em] text-[#FF7A33]">{{ $member['role'] }}</p>
<h3 class="mt-2 text-2xl font-extrabold">{{ $member['name'] }}</h3>
<ul class="mt-3 flex flex-wrap gap-2">
@foreach($member['focus'] as $skill)
<li class="rounded-full border border-[#3D3733] px-3 py-1 text-xs font-semibold">{{ $skill }}</li>
@endforeach
</ul>
</div>
</div>
<div class="lg:col-span-8 flex flex-col">
<p class="muted leading-relaxed max-w-[68ch]">{{ $member['bio'] }}</p>
<a href="{{ $member['linkedin'] }}" target="_blank" rel="noopener" class="mt-auto pt-6 inline-flex items-center gap-2 text-sm font-bold text-[#FF7A33] hover:text-[#F45B0E] transition self-start"><i class="ph ph-linkedin-logo text-base" aria-hidden="true"></i> <span class="underline underline-offset-8 decoration-[#F45B0E]/50">LinkedIn</span> <span aria-hidden="true">&#8599;</span></a>
</div>
</article>
@endforeach
<div class="border-t border-[#3D3733]"></div>
</div>
</div>
</section>

{{-- Reach out: title and ethos quote only, no crew grid --}}
<section id="krama" class="scroll-mt-24 max-w-7xl mx-auto px-5 sm:px-8 py-24">
<h2 class="reveal text-4xl sm:text-5xl font-extrabold tracking-tight text-center">{{ __('contact.reach_out') }}</h2>
<blockquote class="reveal mt-14 max-w-3xl mx-auto text-center text-2xl sm:text-3xl font-medium leading-snug">"{{ __('home.ethos.body') }}"</blockquote>
</section>

</main>

<footer id="gabung" class="scroll-mt-24 max-w-7xl mx-auto px-5 sm:px-8 pb-12">
{{-- Text sits as ink on the brand fill: white on #F45B0E is 3.31:1 and fails AA. --}}
<div class="reveal on-brand bg-[#F45B0E] rounded-[2.5rem] px-8 sm:px-14 py-16 relative overflow-hidden">
<img src="https://images.unsplash.com/photo-1782665665126-78e492eecca1?auto=format&fit=crop&w=1400&h=500&q=80" alt="" aria-hidden="true" class="absolute inset-0 w-full h-full object-cover opacity-[0.14] mix-blend-luminosity">
<div class="relative flex flex-wrap items-end justify-between gap-8">
<div><h2 class="font-extrabold tracking-tight leading-[1.0] text-[clamp(2.4rem,5.5vw,4.5rem)]">{{ __('home.contact.heading') }}</h2><p class="mt-4 max-w-md">{{ __('home.contact.subtitle') }}</p></div>
<div class="flex flex-col gap-3 min-w-[280px]"><a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" class="rounded-full bg-[#171512] text-[#F7F1EC] text-center font-extrabold px-8 py-4 hover:bg-[#26221F] transition">{{ __('home.hero.cta_contact') }}</a><a href="{{ route('projects.index', ['locale' => app()->getLocale()]) }}" class="text-center rounded-full border-2 border-[#171512]/40 font-bold px-8 py-3.5 hover:bg-[#171512]/10 transition">{{ __('home.hero.cta_work') }}</a></div>
</div>
<div class="relative mt-8 flex flex-wrap gap-x-8 gap-y-2 text-sm">
@if($banjarSetting)<p><a href="mailto:{{ $banjarSetting->email }}" class="underline">{{ $banjarSetting->email }}</a></p><p><a href="https://wa.me/{{ preg_replace('/\D/','',$banjarSetting->phone) }}" class="underline">{{ $banjarSetting->phone_display }}</a></p><p>{{ $banjarSetting->address }}</p>@endif
</div>
<div class="relative mt-8 pt-6 border-t border-[#171512]/25 flex flex-wrap justify-between gap-3 text-sm"><p>{{ __('layout.footer.copyright', ['year' => date('Y')]) }}</p><p>{!! __('layout.footer.made_with', ['soul' => '<span class="italic">'.__('layout.footer.made_with_soul').'</span>']) !!}</p></div>
</div>
</footer>
<script>const io=new IntersectionObserver(es=>es.forEach(e=>e.isIntersecting&&e.target.classList.add('in')),{threshold:.12});document.querySelectorAll('.reveal').forEach(el=>io.observe(el));
(function(){const t=document.getElementById('navToggle'),m=document.getElementById('mobileNav'),s=document.getElementById('siteNav');if(t&&m){const set=o=>{m.classList.toggle('open',o);t.setAttribute('aria-expanded',o?'true':'false');if(s)s.classList.toggle('nav-open',o);const i=t.querySelector('i');if(i){i.classList.toggle('ph-list',!o);i.classList.toggle('ph-x',o);}document.documentElement.style.overflow=o?'hidden':'';};t.addEventListener('click',()=>set(!m.classList.contains('open')));m.querySelectorAll('a').forEach(a=>a.addEventListener('click',()=>set(false)));document.addEventListener('keydown',e=>{if(e.key==='Escape')set(false)});window.addEventListener('resize',()=>{if(window.innerWidth>=768)set(false)});}if(s){const on=()=>s.classList.toggle('scrolled',window.scrollY>24);on();window.addEventListener('scroll',on,{passive:true});}})();</script>
</body>
</html>
