<!DOCTYPE html>
{{-- CONCEPT 1: "SAWAH DIGITAL" v4: live site copy, tropical rice-terrace design.
  Copy source: lang/en + lang/id (home, layout, work, contact). Uses __() so EN/ID stay in sync.
  Direction: DESIGN.md, dial ENERGY 2 / RHYTHM 2 / MOTION 2.
  Palette: paper #FBF6EC + jungle #123524 cores, terracotta accent.
  Terracotta #E4572E is 3.42:1 on paper, so it is a large-text and fill colour only.
  Small accent text uses #B23A17 (5.55:1). --}}
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
:root{--paper:#FBF6EC;--jungle:#123524;--terra:#E4572E;--terra-ink:#B23A17;--muted:#4A5C4E}
body{font-family:'Outfit',sans-serif;background:var(--paper);color:var(--jungle)}
.muted{color:var(--muted)}
.grain::after{content:"";position:fixed;inset:0;z-index:60;pointer-events:none;opacity:.05;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='140' height='140'%3E%3Cfilter id='n'%3E%3CfeTurbulence baseFrequency='0.9'/%3E%3C/filter%3E%3Crect width='140' height='140' filter='url(%23n)'/%3E%3C/svg%3E")}
.reveal{opacity:0;transform:translateY(28px);transition:opacity .9s cubic-bezier(.32,.72,0,1),transform .9s cubic-bezier(.32,.72,0,1)}
.reveal.in{opacity:1;transform:none}
/* Terrace motif: panels are matted in a paper frame, echoing paddy terracing.
   Solid mat, no frosted inset highlight, so this is not glassmorphism. */
.bezel{background:rgba(18,53,36,.06);border:1px solid rgba(18,53,36,.12);padding:.45rem;border-radius:2rem}
.bezel>.core{border-radius:calc(2rem - .45rem);overflow:hidden;background:#fff;box-shadow:0 24px 60px -24px rgba(18,53,36,.3)}
/* Hover affordance is a border and lift, not a cursor-following glow (R-13). */
.card{transition:border-color .35s ease,transform .35s ease,box-shadow .35s ease}
.card:hover{border-color:rgba(228,87,46,.55);transform:translateY(-3px);box-shadow:0 20px 44px -28px rgba(18,53,36,.45)}
.marquee{animation:slide 26s linear infinite}.marquee>span{padding-right:2.5rem}@keyframes slide{to{transform:translateX(-50%)}}
::selection{background:var(--terra);color:#fff}
/* Glass dose cap: the floating nav and its mobile panel only (R-10). */
#siteNavBar{transition:background .45s ease,box-shadow .45s ease,backdrop-filter .45s ease}
#siteNav.scrolled #siteNavBar,#siteNav.nav-open #siteNavBar{background:rgba(251,246,236,.96);box-shadow:0 18px 50px -24px rgba(18,53,36,.5)}
#mobileNav{display:none}#mobileNav.open{display:flex}
.brand-logo{--logo-c:var(--jungle);position:relative;display:block;overflow:hidden;aspect-ratio:1829/480;width:auto;height:2.5rem}
.brand-logo::after{content:"";position:absolute;left:-2.4046%;top:-59.5833%;width:104.9754%;height:225%;background-color:var(--logo-c);-webkit-mask:url("{{ asset('assets/images/Logo_Landscape.webp') }}") center/100% 100% no-repeat;mask:url("{{ asset('assets/images/Logo_Landscape.webp') }}") center/100% 100% no-repeat}
#siteNav.scrolled .brand-logo,#siteNav.nav-open .brand-logo{--logo-c:var(--terra)}
@media(prefers-reduced-motion:reduce){.reveal{opacity:1;transform:none}.marquee{animation:none}}
</style>
</head>
<body class="grain antialiased overflow-x-clip w-full max-w-full">

<div id="siteNav" class="fixed top-4 left-1/2 -translate-x-1/2 z-[60] w-[94%] max-w-3xl md:max-w-5xl">
<nav id="siteNavBar" class="relative flex items-center justify-between gap-2 rounded-3xl md:rounded-full border border-[#123524]/10 bg-[#FBF6EC]/80 backdrop-blur-xl pl-4 pr-2 py-2 shadow-[0_12px_40px_-16px_rgba(18,53,36,.4)]" aria-label="Primary">
<a href="{{ url('/') }}" class="brand-logo shrink-0" role="img" aria-label="The Idea Grove Studio"></a>
<div class="hidden md:flex absolute left-1/2 -translate-x-1/2 items-center gap-1">
<a href="#layanan" class="text-sm font-medium px-3 py-1.5 rounded-full hover:bg-[#123524]/5 transition">{{ __('home.services.heading') }}</a>
<a href="#kerja" class="text-sm font-medium px-3 py-1.5 rounded-full hover:bg-[#123524]/5 transition">{{ __('layout.nav.work') }}</a>
<a href="#harga" class="text-sm font-medium px-3 py-1.5 rounded-full hover:bg-[#123524]/5 transition">{{ __('layout.nav.pricing') }}</a>
</div>
<div class="flex items-center gap-2">
<a href="#hubungi" class="hidden sm:flex text-sm font-medium px-3 py-1.5 rounded-full bg-[#123524] text-[#FBF6EC] hover:bg-[#E4572E] transition-all duration-500 items-center gap-2">{{ __('layout.nav.contact') }} <span class="w-6 h-6 rounded-full bg-white/15 flex items-center justify-center"><i class="ph ph-arrow-up-right text-sm"></i></span></a>
<button type="button" id="navToggle" class="md:hidden w-10 h-10 rounded-full bg-[#123524] text-[#FBF6EC] flex items-center justify-center" aria-expanded="false" aria-controls="mobileNav" aria-label="{{ __('layout.nav.toggle_menu') }}"><i class="ph ph-list text-lg"></i></button>
</div>
</nav>
</div>
<div id="mobileNav" class="fixed inset-0 z-[55] md:hidden flex-col justify-center gap-2 px-6 bg-[#FBF6EC]/98 backdrop-blur-2xl">
<a href="#layanan" class="block px-5 py-4 rounded-2xl text-2xl font-bold hover:bg-[#123524]/5 transition">{{ __('home.services.heading') }}</a>
<a href="#kerja" class="block px-5 py-4 rounded-2xl text-2xl font-bold hover:bg-[#123524]/5 transition">{{ __('layout.nav.work') }}</a>
<a href="#harga" class="block px-5 py-4 rounded-2xl text-2xl font-bold hover:bg-[#123524]/5 transition">{{ __('layout.nav.pricing') }}</a>
<a href="#hubungi" class="mt-2 flex items-center justify-center gap-2 rounded-2xl bg-[#123524] text-[#FBF6EC] px-5 py-4 text-lg font-bold transition">{{ __('layout.nav.contact') }} <i class="ph ph-arrow-up-right"></i></a>
</div>

<header class="relative min-h-[100dvh] flex items-center pt-24 pb-16 px-5 sm:px-10">
<div class="absolute inset-0 -z-10">
<img src="https://images.unsplash.com/photo-1558005530-a7958896ec60?auto=format&fit=crop&w=1920&h=1080&q=80" alt="Morning mist over Bali rice terraces below a mountain" class="w-full h-full object-cover opacity-20 contrast-125">
{{-- Scrim, not a glow orb: it fades the terrace photo into the paper ground so the H1 stays
     legible (R-25). One gradient, no colour, no blur bloom. --}}
<div class="absolute inset-0" style="background:radial-gradient(90% 70% at 15% 20%, transparent 30%, #FBF6EC 78%)"></div>
</div>
<div class="max-w-7xl mx-auto grid lg:grid-cols-12 gap-10 items-center w-full">
<div class="lg:col-span-7 reveal in">
<h1 class="mt-5 font-extrabold leading-[1.02] tracking-tight text-[clamp(2.6rem,5.4vw,5rem)] max-w-3xl">
{!! __('home.hero.heading', ['considered' => '<span class="inline-block h-[0.72em] w-[1.9em] rounded-full align-middle bg-cover bg-center mx-1 -translate-y-1 border-2 border-[#123524]/10" style="background-image:url(\'https://images.unsplash.com/photo-1778987151432-4402dc6e9bf1?auto=format&fit=crop&w=400&h=160&q=80\')"></span><span class="italic font-medium text-[#E4572E]">'.__('home.hero.heading_em').'</span>']) !!}
</h1>
<p class="mt-5 text-lg muted max-w-[52ch] leading-relaxed">{{ __('home.hero.subtitle') }}</p>
<div class="mt-8 flex flex-wrap items-center gap-4">
<a href="#kerja" class="group inline-flex items-center gap-3 rounded-full bg-[#E4572E] text-white pl-7 pr-2 py-2 font-semibold hover:bg-[#123524] transition-all duration-500 active:scale-[0.98]">{{ __('home.hero.cta_work') }} <span class="w-10 h-10 rounded-full bg-black/15 flex items-center justify-center group-hover:translate-x-1 transition-transform"><i class="ph ph-arrow-down-right text-lg"></i></span></a>
<a href="#hubungi" class="font-semibold underline underline-offset-8 decoration-[#B23A17]/60 hover:decoration-[#B23A17] transition">{{ __('home.hero.cta_contact') }}</a>
</div>
</div>
<div class="lg:col-span-5 relative reveal in">
<div class="bezel rotate-2 hover:rotate-0 transition-transform duration-700"><div class="core">
<img src="https://images.unsplash.com/photo-1765648580725-1d31acc6f048?auto=format&fit=crop&w=800&h=1000&q=80" alt="Outdoor cafe workspace with a laptop on the table" class="w-full aspect-[4/5] object-cover">
<div class="flex items-center justify-between px-5 py-4">
{{-- R-23/R-38: no released team photography, so initials placeholders, not stock faces. --}}
<div class="flex -space-x-3" aria-hidden="true">
<span class="w-10 h-10 rounded-full border-2 border-white bg-[#E4572E] text-white grid place-items-center font-bold text-xs">IG</span>
<span class="w-10 h-10 rounded-full border-2 border-white bg-[#123524] text-[#FBF6EC] grid place-items-center font-bold text-xs">RS</span>
<span class="w-10 h-10 rounded-full border-2 border-white bg-[#E4572E] text-white grid place-items-center font-bold text-xs">DP</span>
</div>
<p class="text-xs muted">{{ __('home.hero.studio_value') }}</p>
</div>
</div></div>
<div class="absolute -bottom-6 -left-6 rounded-2xl bg-[#123524] text-[#FBF6EC] px-5 py-4 shadow-xl -rotate-2">
<p class="text-xs text-[#FBF6EC]/70">{{ __('home.hero.engagements_label') }}</p>
<p class="font-bold text-xl">{{ __('home.hero.engagements_value') }}</p>
</div>
</div>
</div>
<svg class="absolute bottom-0 left-0 w-full h-20 text-[#123524]" viewBox="0 0 1440 80" preserveAspectRatio="none" aria-hidden="true"><path fill="currentColor" opacity="0.08" d="M0,50 C240,20 480,70 720,45 C960,20 1200,60 1440,35 L1440,80 L0,80 Z"/><path fill="currentColor" opacity="0.14" d="M0,62 C260,38 520,78 780,58 C1040,38 1240,70 1440,52 L1440,80 L0,80 Z"/></svg>
</header>

<div class="border-y border-[#123524]/10 bg-[#123524] text-[#FBF6EC] py-4 overflow-hidden" aria-hidden="true">
<div class="marquee flex whitespace-nowrap w-max font-semibold tracking-wide">@for($i=0;$i<12;$i++)<span>{{ __('home.hero.disciplines_value') }} <span class="text-[#FBF6EC]/60">/</span> {{ __('home.hero.engagements_value') }} <span class="text-[#FBF6EC]/60">/</span> {{ __('home.hero.studio_value') }} <span class="text-[#FBF6EC]/60">/</span></span>@endfor</div>
</div>

{{-- Ethos: sticky left column against staggered right cards (RHYTHM 2) --}}
<section class="max-w-7xl mx-auto px-5 sm:px-10 py-32 grid lg:grid-cols-12 gap-12">
<div class="lg:col-span-4"><div class="lg:sticky lg:top-32 reveal">
<h2 class="text-4xl sm:text-5xl font-extrabold tracking-tight leading-[1.05]">{!! __('home.ethos.heading') !!}</h2>
<p class="mt-5 muted leading-relaxed max-w-[38ch]">{{ __('home.ethos.body') }}</p>
<img src="https://images.unsplash.com/photo-1769485016814-943270cdb5db?auto=format&fit=crop&w=600&h=400&q=80" alt="Woman carrying canang sari offerings to a Balinese temple" class="mt-8 rounded-2xl object-cover aspect-[3/2] w-full contrast-125">
</div></div>
<div class="lg:col-span-8 space-y-6">
<article class="card reveal rounded-3xl border border-[#123524]/10 bg-white p-8 sm:p-10 grid sm:grid-cols-[auto_1fr_auto] gap-6 items-center">
<span class="w-14 h-14 rounded-2xl bg-[#E4572E]/12 text-[#B23A17] flex items-center justify-center"><i class="ph ph-ear text-3xl"></i></span>
<div><h3 class="text-2xl font-bold mt-1">{{ __('home.ethos.research_title') }}</h3><p class="muted mt-2 max-w-[52ch]">{{ __('home.ethos.research_body') }}</p></div>
<img src="https://images.unsplash.com/photo-1620275765334-4ed948bb4502?auto=format&fit=crop&w=300&h=300&q=80" alt="Field notes from a client visit in Bali" class="w-24 h-24 rounded-2xl object-cover hidden sm:block">
</article>
<article class="card reveal rounded-3xl border border-[#123524]/10 bg-white p-8 sm:p-10 grid sm:grid-cols-[auto_1fr_auto] gap-6 items-center lg:ml-12">
<span class="w-14 h-14 rounded-2xl bg-[#E4572E]/12 text-[#B23A17] flex items-center justify-center"><i class="ph ph-pen-nib text-3xl"></i></span>
<div><h3 class="text-2xl font-bold mt-1">{{ __('home.ethos.design_title') }}</h3><p class="muted mt-2 max-w-[52ch]">{{ __('home.ethos.design_body') }}</p></div>
<img src="https://images.unsplash.com/photo-1583321500900-82807e458f3c?auto=format&fit=crop&w=300&h=300&q=80" alt="Designers and engineers around one table in Bali" class="w-24 h-24 rounded-2xl object-cover hidden sm:block">
</article>
<article class="card reveal rounded-3xl bg-[#123524] text-[#FBF6EC] p-8 sm:p-10 grid sm:grid-cols-[auto_1fr_auto] gap-6 items-center lg:ml-24">
<span class="w-14 h-14 rounded-2xl bg-[#E4572E] text-white flex items-center justify-center"><i class="ph ph-hand-heart text-3xl"></i></span>
<div><h3 class="text-2xl font-bold mt-1">{{ __('home.ethos.care_title') }}</h3><p class="text-[#FBF6EC]/70 mt-2 max-w-[52ch]">{{ __('home.ethos.care_body') }}</p></div>
</article>
</div>
</section>

{{-- Services: live copy, 4 items. Icons are content-relevant glyphs, one dark featured. --}}
<section id="layanan" class="border-y border-[#123524]/10 bg-white/50 px-5 sm:px-10 py-28">
<div class="max-w-7xl mx-auto">
<div class="flex flex-wrap items-end justify-between gap-6 reveal">
<h2 class="text-4xl sm:text-5xl font-extrabold tracking-tight">{{ __('home.services.heading') }}</h2>
<p class="max-w-sm muted">{{ __('home.services.subtitle') }}</p>
</div>
<div class="mt-12 grid grid-cols-1 md:grid-cols-2 grid-flow-dense gap-5">
<article class="card reveal rounded-3xl border border-[#123524]/10 bg-[#FBF6EC] p-8">
<span class="w-12 h-12 rounded-2xl bg-[#E4572E]/12 text-[#B23A17] flex items-center justify-center"><i class="ph ph-fingerprint text-2xl"></i></span>
<h3 class="mt-4 text-2xl font-bold">{{ __('home.services.brand_title') }}</h3><p class="mt-2 muted">{{ __('home.services.brand_body') }}</p>
<img src="https://images.unsplash.com/photo-1611241893603-3c359704e0ee?auto=format&fit=crop&w=800&h=400&q=80" alt="Brand identity sketching on a tablet at the Bali studio" class="mt-6 rounded-2xl aspect-[2/1] w-full object-cover">
</article>
<article class="card reveal rounded-3xl border border-[#123524]/10 bg-[#FBF6EC] p-8">
<span class="w-12 h-12 rounded-2xl bg-[#E4572E]/12 text-[#B23A17] flex items-center justify-center"><i class="ph ph-layout text-2xl"></i></span>
<h3 class="mt-4 text-2xl font-bold">{{ __('home.services.web_title') }}</h3><p class="mt-2 muted">{{ __('home.services.web_body') }}</p>
<img src="https://images.unsplash.com/photo-1522542550221-31fd19575a2d?auto=format&fit=crop&w=800&h=400&q=80" alt="Website wireframe sketches for a Bali client build" class="mt-6 rounded-2xl aspect-[2/1] w-full object-cover">
</article>
<article class="card reveal rounded-3xl border border-[#123524]/10 bg-[#FBF6EC] p-8">
<span class="w-12 h-12 rounded-2xl bg-[#E4572E]/12 text-[#B23A17] flex items-center justify-center"><i class="ph ph-code text-2xl"></i></span>
<h3 class="mt-4 text-2xl font-bold">{{ __('home.services.dev_title') }}</h3><p class="mt-2 muted">{{ __('home.services.dev_body') }}</p>
<img src="https://images.unsplash.com/photo-1542831371-29b0f74f9713?auto=format&fit=crop&w=800&h=400&q=80" alt="Laravel developer shipping a performant build from Bali" class="mt-6 rounded-2xl aspect-[2/1] w-full object-cover">
</article>
<article class="card reveal rounded-3xl bg-[#123524] text-[#FBF6EC] p-8">
<span class="w-12 h-12 rounded-2xl bg-[#E4572E] text-white flex items-center justify-center"><i class="ph ph-compass text-2xl"></i></span>
<h3 class="mt-4 text-2xl font-bold">{{ __('home.services.strategy_title') }}</h3><p class="mt-2 text-[#FBF6EC]/70">{{ __('home.services.strategy_body') }}</p>
<img src="https://images.unsplash.com/photo-1503551723145-6c040742065b-v2?auto=format&fit=crop&w=800&h=400&q=80" alt="Strategy maps pinned on the studio wall in Bali" class="mt-6 rounded-2xl aspect-[2/1] w-full object-cover">
</article>
</div>
</div>
</section>

{{-- Work: live DB, real projects --}}
@php $conceptProjects = \App\Models\Project::orderBy('created_at','desc')->take(6)->get(); @endphp
<section id="kerja" class="bg-[#123524] text-[#FBF6EC] py-32 px-5 sm:px-10 relative overflow-hidden">
<div class="max-w-7xl mx-auto">
<div class="flex flex-wrap items-end justify-between gap-6 reveal">
<h2 class="text-4xl sm:text-6xl font-extrabold tracking-tight max-w-xl leading-[1.02]">{{ __('home.work.heading') }}</h2>
<a href="{{ route('projects.index', ['locale' => app()->getLocale()]) }}" class="rounded-full border border-white/30 px-6 py-3 font-semibold hover:bg-[#E4572E] hover:border-[#E4572E] transition">{{ __('home.work.view_all') }} <span aria-hidden="true">&rarr;</span></a>
</div>
<p class="mt-4 text-[#FBF6EC]/70 max-w-xl">{{ __('home.work.subtitle') }}</p>
@if($conceptProjects->count())
<div class="mt-12 grid grid-cols-1 md:grid-cols-3 grid-flow-dense gap-5">
@foreach($conceptProjects as $i => $project)
<a href="{{ route('projects.show', ['locale' => app()->getLocale(), 'project' => $project]) }}" class="card reveal group {{ $i % 4 === 0 ? 'md:col-span-2' : '' }} relative rounded-3xl overflow-hidden {{ $i < 2 ? 'min-h-[380px]' : 'min-h-[300px]' }} flex items-end">
@if($project->imageUrl())
<img src="{{ $project->imageUrl() }}" alt="{{ $project->name }}" loading="lazy" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
@else
<div class="absolute inset-0 bg-[#E4572E]/30"></div>
@endif
<div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"></div>
<div class="relative p-8">@if($project->client_name)<p class="text-xs font-semibold text-white/80">{{ $project->client_name }}</p>@endif<h3 class="text-{{ $i % 4 === 0 ? '3xl' : '2xl' }} font-bold mt-2">{{ $project->name }}</h3></div>
</a>
@endforeach
</div>
@else
<p class="mt-12 text-[#FBF6EC]/70">{{ __('home.work.loading') }} {{ __('home.work.loading_sub') }}</p>
@endif
</div>
</section>

{{-- Pricing: real SOW x tier matrix. Professional is featured because it is the complete
     first build the studio recommends, not because it is the middle column. --}}
<section id="harga" class="scroll-mt-28 border-y border-[#123524]/10 bg-white/50 px-5 sm:px-10 py-28">
<div class="max-w-7xl mx-auto">
<div class="flex flex-wrap items-end justify-between gap-6 reveal">
<div><h2 class="text-4xl sm:text-5xl font-extrabold tracking-tight">{{ __('home.pricing.heading') }}</h2></div>
<p class="max-w-sm muted">{{ __('home.pricing.subtitle') }}</p>
</div>
<div class="mt-12 bezel reveal"><div class="core overflow-x-auto">
<table class="w-full min-w-[760px] text-left border-collapse">
<thead><tr class="bg-[#FBF6EC] border-b border-[#123524]/10">
<th class="p-6"></th>
@foreach(__('home.pricing.tiers') as $i => $tier)
<th class="p-6 align-top {{ $i===1 ? 'bg-[#E4572E]/10' : '' }}">
@if($i===1)<span class="text-[10px] font-bold bg-[#B23A17] text-white rounded-full px-2.5 py-1">{{ __('home.pricing.popular') }}</span>@endif
<p class="mt-3 text-xl font-bold">{{ $tier['name'] }}</p>
<p class="text-xs muted mt-1">{{ $tier['desc'] }}</p>
</th>
@endforeach
</tr></thead>
<tbody>
@foreach(__('home.pricing.sow') as $sow)
<tr class="border-b border-[#123524]/10 last:border-0">
<td class="p-6"><p class="font-bold">{{ $sow['name'] }}</p><p class="text-xs muted mt-1 max-w-[26ch]">{{ $sow['desc'] }}</p></td>
@foreach($sow['prices'] as $i => $price)
<td class="p-6 {{ $i===1 ? 'bg-[#E4572E]/10' : '' }}"><span class="text-xl font-bold {{ $i===1 ? 'text-[#B23A17]' : '' }}">{{ $price }}</span></td>
@endforeach
</tr>
@endforeach
</tbody>
</table>
</div></div>
<div class="mt-16 grid lg:grid-cols-12 gap-10">
<div class="lg:col-span-4 reveal"><h3 class="text-3xl font-extrabold tracking-tight">{{ __('home.pricing.care_heading') }}</h3><p class="mt-3 muted">{{ __('home.pricing.care_body') }}</p></div>
<div class="lg:col-span-8 grid sm:grid-cols-3 gap-5">
@foreach(__('home.pricing.care') as $plan)
<article class="card reveal rounded-3xl border border-[#123524]/10 bg-[#FBF6EC] p-7">
<h4 class="font-bold text-lg">{{ $plan['name'] }}</h4>
<p class="mt-3"><span class="text-2xl font-extrabold text-[#B23A17]">{{ $plan['price'] }}</span><span class="text-xs muted">{{ $plan['unit'] }}</span></p>
<p class="mt-3 text-sm muted">{{ $plan['desc'] }}</p>
</article>
@endforeach
</div>
</div>
<div class="mt-12 pt-8 border-t border-[#123524]/10 flex flex-wrap items-center justify-between gap-5 reveal">
<p class="text-xs muted max-w-2xl">{{ __('home.pricing.note') }}</p>
<a href="#hubungi" class="rounded-full bg-[#E4572E] text-white font-bold px-7 py-3.5 hover:bg-[#123524] transition">{{ __('home.pricing.cta') }}</a>
</div>
</div>
</section>

{{-- Sectors: ruled list, not chips --}}
<section class="max-w-7xl mx-auto px-5 sm:px-10 py-24">
<h2 class="reveal text-3xl sm:text-4xl font-extrabold tracking-tight">{{ __('home.sectors.heading') }}</h2>
<ul class="mt-10 grid grid-cols-2 sm:grid-cols-3 gap-x-8 gap-y-4">
<li class="reveal border-t border-[#123524]/15 pt-4 text-lg font-medium">{{ __('home.sectors.hospitality') }}</li>
<li class="reveal border-t border-[#123524]/15 pt-4 text-lg font-medium">{{ __('home.sectors.wellness') }}</li>
<li class="reveal border-t border-[#123524]/15 pt-4 text-lg font-medium">{{ __('home.sectors.sustainability') }}</li>
<li class="reveal border-t border-[#123524]/15 pt-4 text-lg font-medium">{{ __('home.sectors.culture') }}</li>
<li class="reveal border-t border-[#123524]/15 pt-4 text-lg font-medium">{{ __('home.sectors.lifestyle') }}</li>
<li class="reveal border-t border-[#123524]/15 pt-4 text-lg font-medium">{{ __('home.sectors.social_impact') }}</li>
<li class="reveal border-t border-[#123524]/15 pt-4 text-lg font-medium">{{ __('home.sectors.education') }}</li>
<li class="reveal border-t border-[#123524]/15 pt-4 text-lg font-medium">{{ __('home.sectors.technology') }}</li>
<li class="reveal border-t border-[#123524]/15 pt-4 text-lg font-medium italic text-[#B23A17]">{{ __('home.sectors.more') }}</li>
</ul>
</section>

{{-- Contact + footer. Text is full-strength paper: paper/80 on terracotta is 2.9:1 and fails. --}}
<footer id="hubungi" class="bg-[#B23A17] text-white px-5 sm:px-10 pt-24 pb-10 relative overflow-hidden">
<img src="https://images.unsplash.com/photo-1552272492-3053fbacbf4b?auto=format&fit=crop&w=1600&h=500&q=80" alt="" aria-hidden="true" class="absolute inset-0 w-full h-full object-cover opacity-20 mix-blend-luminosity">
<div class="relative max-w-7xl mx-auto">
<h2 class="font-extrabold tracking-tight leading-[1.0] text-[clamp(2.8rem,7vw,6rem)] max-w-4xl">{{ __('home.contact.heading') }}</h2>
<p class="mt-5 text-lg max-w-xl">{{ __('home.contact.subtitle') }}</p>
<div class="mt-8 flex flex-wrap gap-4">
<a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" class="rounded-full bg-white text-[#B23A17] font-bold px-8 py-4 hover:bg-[#123524] hover:text-white transition active:scale-[0.98]">{{ __('home.hero.cta_contact') }}</a>
<a href="{{ route('projects.index', ['locale' => app()->getLocale()]) }}" class="rounded-full border-2 border-white/70 font-bold px-8 py-4 hover:bg-white/10 transition">{{ __('home.hero.cta_work') }}</a>
</div>
@php $conceptSetting = \App\Models\SiteSetting::first(); $conceptSocials = \App\Models\SocialLink::orderBy('sort_order')->get(); @endphp
<div class="mt-8 flex flex-wrap gap-x-8 gap-y-2 text-sm">
@if($conceptSetting)<p><span class="text-[11px] font-medium">Email: </span><a href="mailto:{{ $conceptSetting->email }}" class="underline">{{ $conceptSetting->email }}</a></p>
<p><span class="text-[11px] font-medium">WA: </span><a href="https://wa.me/{{ preg_replace('/\D/','',$conceptSetting->phone) }}" class="underline">{{ $conceptSetting->phone_display }}</a></p>
<p><span class="text-[11px] font-medium">Studio: </span>{{ $conceptSetting->address }}</p>@endif
@foreach($conceptSocials as $s)<p><a href="{{ $s->url }}" target="_blank" rel="noopener" class="underline">{{ $s->platform }} <span aria-hidden="true">&#8599;</span></a></p>@endforeach
</div>
<div class="mt-10 pt-8 border-t border-white/35 flex flex-wrap justify-between gap-4 text-sm">
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
