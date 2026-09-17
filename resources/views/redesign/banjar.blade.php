<!DOCTYPE html>
{{-- CONCEPT 3: "BANJAR" v4: live site copy, gotong-royong communal energy.
  Copy source: lang/en + lang/id via __(). EN/ID stay in sync.
  Direction: DESIGN.md, dial ENERGY 3 / RHYTHM 3 / MOTION 2. --}}
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ __('layout.meta.home.title') }} | Concept: Banjar</title>
<meta name="description" content="{{ __('layout.meta.home.description') }}">
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<script src="https://unpkg.com/@phosphor-icons/web"></script>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,400;12..96,600;12..96,700;12..96,800&display=swap" rel="stylesheet">
<style>
/* Palette: cream #FFF9EF + ink #22281F cores, magenta #D92662 + marigold #FFC531 accents.
   Muted text is a token, not an opacity: ink/50 on cream is 2.9:1 and fails WCAG AA. */
:root{--cream:#FFF9EF;--ink:#22281F;--magenta:#D92662;--marigold:#FFC531;--muted:#5A5F58;--muted-ink:#9DA69B}
body{font-family:'Bricolage Grotesque',sans-serif;background:var(--cream);color:var(--ink)}
.muted{color:var(--muted)}
.on-ink .muted{color:var(--muted-ink)}
.reveal{opacity:0;transform:translateY(26px) rotate(.4deg);transition:opacity .8s cubic-bezier(.32,.72,0,1),transform .8s cubic-bezier(.32,.72,0,1)}
.reveal.in{opacity:1;transform:none}
/* Radius scale, not one pill for everything: tickets 1.4rem, chips .9rem, status badges pill. */
.ticket{background:#fff;border:1.5px dashed rgba(34,40,31,.24);border-radius:1.4rem}
.ticket-feat{background:var(--ink);color:var(--cream);border:1.5px solid var(--ink)}
.sticker{box-shadow:3px 3px 0 var(--ink)}
.polaroid{background:#fff;padding:.7rem .7rem 2.2rem;box-shadow:0 18px 40px -18px rgba(34,40,31,.4)}
.avatar-ph{background:var(--marigold);color:var(--ink)}
@media(prefers-reduced-motion:reduce){.reveal{opacity:1;transform:none}}
::selection{background:var(--magenta);color:#fff}
/* Glass dose cap: the scrolled nav only, never nav + cards + modals together (R-10). */
#siteNav{transition:background .45s ease,box-shadow .45s ease,backdrop-filter .45s ease}
#siteNav.scrolled,#siteNav.nav-open{background:rgba(255,249,239,.94);backdrop-filter:blur(14px);box-shadow:0 14px 40px -28px rgba(34,40,31,.55)}
#mobileNav{display:none}#mobileNav.open{display:flex}
.brand-logo{--logo-c:var(--ink);position:relative;display:block;overflow:hidden;aspect-ratio:1829/480;width:auto;height:2.5rem}
.brand-logo::after{content:"";position:absolute;left:-2.4046%;top:-59.5833%;width:104.9754%;height:225%;background-color:var(--logo-c);-webkit-mask:url("{{ asset('assets/images/Logo_Landscape.webp') }}") center/100% 100% no-repeat;mask:url("{{ asset('assets/images/Logo_Landscape.webp') }}") center/100% 100% no-repeat}
#siteNav.scrolled .brand-logo,.nav-open .brand-logo{--logo-c:var(--magenta)}
</style>
</head>
<body class="antialiased overflow-x-clip">
<a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-[100] focus:rounded-lg focus:bg-[#22281F] focus:px-4 focus:py-2 focus:text-sm focus:text-white">{{ __('layout.nav.skip_to_content') }}</a>

<div id="siteNav" class="sticky top-0 z-[60]">
<nav class="max-w-7xl mx-auto px-5 sm:px-8 py-4" aria-label="Primary">
<div class="flex items-center justify-between gap-3">
<a href="{{ url('/') }}" class="brand-logo" role="img" aria-label="The Idea Grove Studio"></a>
<div class="hidden md:flex gap-7 text-[15px] font-medium"><a href="#layanan" class="hover:text-[#D92662]">{{ __('home.services.heading') }}</a><a href="#kerja" class="hover:text-[#D92662]">{{ __('layout.nav.work') }}</a><a href="#harga" class="hover:text-[#D92662]">{{ __('layout.nav.pricing') }}</a><a href="#krama" class="hover:text-[#D92662]">{{ __('contact.reach_out') }}</a></div>
<div class="flex items-center gap-2">
<a href="#gabung" class="sticker bg-[#D92662] text-white text-sm font-bold rounded-full px-6 py-2.5 hover:bg-[#22281F] transition hidden sm:inline-block">{{ __('home.hero.cta_contact') }}</a>
<button type="button" id="navToggle" class="md:hidden sticker bg-white w-11 h-11 rounded-full flex items-center justify-center" aria-expanded="false" aria-controls="mobileNav" aria-label="{{ __('layout.nav.toggle_menu') }}"><i class="ph ph-list text-xl"></i></button>
</div>
</div>
</nav>
</div>
<div id="mobileNav" class="fixed inset-0 z-[55] md:hidden flex-col justify-center gap-2 px-6 bg-[#FFF9EF]/98 backdrop-blur-2xl">
<a href="#layanan" class="block px-5 py-4 rounded-2xl text-2xl font-extrabold hover:bg-[#D92662]/10 transition">{{ __('home.services.heading') }}</a>
<a href="#kerja" class="block px-5 py-4 rounded-2xl text-2xl font-extrabold hover:bg-[#D92662]/10 transition">{{ __('layout.nav.work') }}</a>
<a href="#harga" class="block px-5 py-4 rounded-2xl text-2xl font-extrabold hover:bg-[#D92662]/10 transition">{{ __('layout.nav.pricing') }}</a>
<a href="#krama" class="block px-5 py-4 rounded-2xl text-2xl font-extrabold hover:bg-[#D92662]/10 transition">{{ __('contact.reach_out') }}</a>
<a href="#gabung" class="mt-2 block text-center sticker bg-[#D92662] text-white text-lg font-extrabold rounded-2xl px-5 py-4 transition">{{ __('home.hero.cta_contact') }}</a>
</div>

<main id="main">
<header class="max-w-7xl mx-auto px-5 sm:px-8 grid lg:grid-cols-2 gap-10 items-center pt-8 pb-20">
<div class="reveal in">
<h1 class="mt-4 font-extrabold tracking-tight leading-[0.98] text-[clamp(2.6rem,6vw,5rem)]">{!! __('home.hero.heading', ['considered' => '<span class="italic text-[#D92662]">'.__('home.hero.heading_em').'</span>']) !!}</h1>
<p class="mt-5 text-lg muted max-w-[44ch]">{{ __('home.hero.subtitle') }}</p>
<div class="mt-7 flex flex-wrap gap-3">
<a href="#kerja" class="sticker bg-[#22281F] text-white font-bold rounded-full px-7 py-3.5 hover:bg-[#D92662] transition">{{ __('home.hero.cta_work') }} <span aria-hidden="true">&#8595;</span></a>
<a href="#gabung" class="rounded-2xl border-2 border-[#22281F]/20 px-7 py-3.5 font-bold hover:border-[#D92662] hover:text-[#D92662] transition">{{ __('home.hero.cta_contact') }}</a>
</div>
{{-- R-23/R-38: the studio's own team photography is not released yet, so portraits are
     initial-based placeholders. They are never passed off as real staff. --}}
<div class="mt-8 flex items-center gap-4">
<div class="flex -space-x-3" aria-hidden="true">
<span class="avatar-ph w-11 h-11 rounded-full border-[3px] border-[#FFF9EF] grid place-items-center font-extrabold text-sm">IG</span>
<span class="avatar-ph w-11 h-11 rounded-full border-[3px] border-[#FFF9EF] grid place-items-center font-extrabold text-sm">RS</span>
<span class="avatar-ph w-11 h-11 rounded-full border-[3px] border-[#FFF9EF] grid place-items-center font-extrabold text-sm">DP</span>
<span class="avatar-ph w-11 h-11 rounded-full border-[3px] border-[#FFF9EF] grid place-items-center font-extrabold text-sm">AY</span>
</div>
<p class="text-sm"><span class="font-bold">{{ __('home.hero.disciplines_value') }}</span> <span class="muted">· {{ __('home.hero.engagements_value') }}</span></p>
</div>
</div>
<div class="reveal in relative">
<div class="polaroid rotate-2 rounded-lg">
<div class="rounded w-full aspect-[4/3.4] grid place-items-center bg-[#22281F]/8 border border-dashed border-[#22281F]/25">
<p class="text-xs font-medium muted text-center px-6">[STUDIO PHOTO]</p>
</div>
<p class="text-xs mt-3 muted">{{ __('home.hero.studio_value') }} · {{ __('home.hero.badge') }}</p>
</div>
<div class="absolute -bottom-5 -left-4 sticker bg-[#FFC531] text-[#22281F] rounded-2xl px-5 py-3 -rotate-3"><p class="text-[11px] font-medium">{{ __('home.hero.engagements_label') }}</p><p class="font-extrabold">{{ __('home.hero.engagements_value') }}</p></div>
<div class="absolute -top-4 -right-2 sticker bg-white rounded-full px-5 py-2.5 rotate-3 text-sm font-bold">{{ __('home.ethos.care_title') }}</div>
</div>
</header>

{{-- Ethos: asymmetric 4/8 split with a featured dark ticket --}}
<section class="max-w-7xl mx-auto px-5 sm:px-8 pb-20 grid lg:grid-cols-12 gap-10">
<div class="lg:col-span-4 reveal"><h2 class="text-4xl sm:text-5xl font-extrabold tracking-tight">{!! __('home.ethos.heading') !!}</h2></div>
<div class="lg:col-span-8 reveal"><p class="text-lg muted leading-relaxed max-w-2xl">{{ __('home.ethos.body') }}</p>
<div class="mt-8 grid sm:grid-cols-3 gap-5">
<div class="ticket p-6"><i class="ph ph-ear text-3xl text-[#D92662]"></i><h3 class="font-bold mt-3">{{ __('home.ethos.research_title') }}</h3><p class="text-sm muted mt-2">{{ __('home.ethos.research_body') }}</p></div>
<div class="ticket p-6"><i class="ph ph-pen-nib text-3xl text-[#D92662]"></i><h3 class="font-bold mt-3">{{ __('home.ethos.design_title') }}</h3><p class="text-sm muted mt-2">{{ __('home.ethos.design_body') }}</p></div>
<div class="ticket ticket-feat on-ink p-6"><i class="ph ph-hand-heart text-3xl text-[#FFC531]"></i><h3 class="font-bold mt-3">{{ __('home.ethos.care_title') }}</h3><p class="text-sm muted mt-2">{{ __('home.ethos.care_body') }}</p></div>
</div></div>
</section>

{{-- Services: numbered tickets, one dark featured, no repeated icon set --}}
<section id="layanan" class="max-w-7xl mx-auto px-5 sm:px-8 pb-24">
<div class="flex flex-wrap items-end justify-between gap-6 reveal">
<h2 class="text-4xl sm:text-5xl font-extrabold tracking-tight">{{ __('home.services.heading') }}</h2>
<p class="max-w-sm muted">{{ __('home.services.subtitle') }}</p>
</div>
<div class="mt-10 grid sm:grid-cols-2 gap-5">
<article class="reveal ticket p-8"><h3 class="text-2xl font-extrabold">{{ __('home.services.brand_title') }}</h3><p class="mt-2 muted">{{ __('home.services.brand_body') }}</p><img src="https://images.unsplash.com/photo-1611241893603-3c359704e0ee?auto=format&fit=crop&w=800&h=400&q=80" alt="Brand identity sketching on a tablet" class="mt-6 rounded-2xl aspect-[2/1] w-full object-cover"></article>
<article class="reveal ticket p-8"><h3 class="text-2xl font-extrabold">{{ __('home.services.web_title') }}</h3><p class="mt-2 muted">{{ __('home.services.web_body') }}</p><img src="https://images.unsplash.com/photo-1522542550221-31fd19575a2d?auto=format&fit=crop&w=800&h=400&q=80" alt="Website wireframe sketches for a client build" class="mt-6 rounded-2xl aspect-[2/1] w-full object-cover"></article>
<article class="reveal ticket p-8"><h3 class="text-2xl font-extrabold">{{ __('home.services.dev_title') }}</h3><p class="mt-2 muted">{{ __('home.services.dev_body') }}</p><img src="https://images.unsplash.com/photo-1542831371-29b0f74f9713?auto=format&fit=crop&w=800&h=400&q=80" alt="Laravel developer shipping a performant build" class="mt-6 rounded-2xl aspect-[2/1] w-full object-cover"></article>
<article class="reveal ticket ticket-feat on-ink p-8"><h3 class="text-2xl font-extrabold">{{ __('home.services.strategy_title') }}</h3><p class="mt-2 muted">{{ __('home.services.strategy_body') }}</p><img src="https://images.unsplash.com/photo-1503551723145-6c040742065b-v2?auto=format&fit=crop&w=800&h=400&q=80" alt="Strategy maps pinned on a studio wall" class="mt-6 rounded-2xl aspect-[2/1] w-full object-cover"></article>
</div>
</section>

{{-- Work: live DB, all projects, masonry --}}
@php $banjarProjects = \App\Models\Project::orderBy('created_at','desc')->get(); $banjarSetting = \App\Models\SiteSetting::first(); @endphp
<section id="kerja" class="max-w-7xl mx-auto px-5 sm:px-8 pb-24">
<div class="flex flex-wrap items-end justify-between gap-6">
<h2 class="reveal text-4xl sm:text-5xl font-extrabold tracking-tight">{{ __('home.work.heading') }}</h2>
<a href="{{ route('projects.index', ['locale' => app()->getLocale()]) }}" class="sticker bg-[#22281F] text-white text-sm font-bold rounded-full px-6 py-3 hover:bg-[#D92662] transition">{{ __('home.work.view_all') }}</a>
</div>
<p class="mt-3 muted max-w-xl">{{ __('home.work.subtitle') }}</p>
@if($banjarProjects->count())
<div class="mt-10 columns-1 sm:columns-2 lg:columns-3 gap-5 [&>a]:mb-5">
@foreach($banjarProjects as $project)
<a href="{{ route('projects.show', ['locale' => app()->getLocale(), 'project' => $project]) }}" class="reveal group block break-inside-avoid rounded-3xl overflow-hidden relative">@if($project->imageUrl())<img src="{{ $project->imageUrl() }}" alt="{{ $project->name }}" loading="lazy" class="w-full group-hover:scale-105 transition duration-700">@else<div class="w-full aspect-square bg-[#22281F]/10 flex items-center justify-center font-bold">{{ $project->name }}</div>@endif<span class="absolute bottom-4 left-4 {{ $loop->even ? 'bg-[#D92662] text-white' : 'bg-white text-[#22281F]' }} rounded-xl px-4 py-1.5 text-sm font-bold">{{ $project->client_name ?? $project->name }}</span></a>
@endforeach
</div>
@endif
</section>

{{-- Pricing: SOW x tier. Professional carries the featured treatment because it is the
     build the studio recommends for a complete first release, not because it is the middle. --}}
<section id="harga" class="scroll-mt-24 max-w-7xl mx-auto px-5 sm:px-8 pb-24">
<div class="flex flex-wrap items-end justify-between gap-6 reveal">
<div><h2 class="text-4xl sm:text-5xl font-extrabold tracking-tight">{{ __('home.pricing.heading') }}</h2></div>
<p class="max-w-sm muted">{{ __('home.pricing.subtitle') }}</p>
</div>

<div class="mt-10 grid md:grid-cols-[0.9fr_1.15fr_0.9fr] gap-5 items-start">
@foreach(__('home.pricing.tiers') as $i => $tier)
<article class="reveal ticket {{ $i===1 ? 'ticket-feat on-ink md:-mt-4 md:pb-10' : '' }} p-7 relative">
@if($i===1)
<span class="sticker absolute -top-3 right-6 bg-[#FFC531] text-[#22281F] text-[10px] font-bold rounded-full px-3 py-1.5 rotate-2">{{ __('home.pricing.popular') }}</span>
@endif
<h3 class="text-2xl font-extrabold">{{ $tier['name'] }}</h3>
<p class="text-sm muted mt-1">{{ $tier['desc'] }}</p>
<dl class="mt-6 pt-5 border-t {{ $i===1 ? 'border-[#FFF9EF]/25' : 'border-[#22281F]/15' }} space-y-3">
@foreach(__('home.pricing.sow') as $sow)
<div class="flex items-baseline justify-between gap-3">
<dt class="text-sm muted">{{ $sow['name'] }}</dt>
<dd class="font-bold whitespace-nowrap {{ $i===1 ? 'text-[#FFC531]' : 'text-[#D92662]' }}">{{ $sow['prices'][$i] }}</dd>
</div>
@endforeach
</dl>
<a href="#gabung" class="sticker mt-7 inline-block w-full text-center rounded-2xl px-6 py-3 font-bold {{ $i===1 ? 'bg-[#FFC531] text-[#22281F]' : 'bg-[#22281F] text-white hover:bg-[#D92662]' }} transition">{{ __('home.pricing.cta') }}</a>
</article>
@endforeach
</div>

<div class="mt-16 grid lg:grid-cols-12 gap-8">
<div class="lg:col-span-4 reveal"><h3 class="text-3xl font-extrabold tracking-tight">{{ __('home.pricing.care_heading') }}</h3><p class="mt-3 muted">{{ __('home.pricing.care_body') }}</p></div>
<div class="lg:col-span-8 grid sm:grid-cols-3 gap-5">
@foreach(__('home.pricing.care') as $plan)
<article class="reveal ticket p-6">
<h4 class="font-bold">{{ $plan['name'] }}</h4>
<p class="mt-3"><span class="text-2xl font-extrabold text-[#D92662]">{{ $plan['price'] }}</span><span class="text-xs muted">{{ $plan['unit'] }}</span></p>
<p class="mt-3 text-sm muted">{{ $plan['desc'] }}</p>
</article>
@endforeach
</div>
</div>
<div class="mt-12 pt-8 border-t border-[#22281F]/15 flex flex-wrap items-center justify-between gap-5 reveal">
<p class="text-xs muted max-w-2xl">{{ __('home.pricing.note') }}</p>
<a href="#gabung" class="sticker bg-[#D92662] text-white font-bold rounded-full px-7 py-3.5 hover:bg-[#22281F] transition">{{ __('home.pricing.cta') }}</a>
</div>
</section>

{{-- Sectors: chips, radius .9rem so the pill is reserved for status and CTAs --}}
<section class="bg-[#22281F] text-[#FFF9EF] py-20 px-5 sm:px-8 rounded-[2.5rem] mx-3 sm:mx-6 on-ink">
<div class="max-w-6xl mx-auto">
<h2 class="reveal text-3xl sm:text-4xl font-extrabold tracking-tight">{{ __('home.sectors.heading') }}</h2>
<div class="mt-8 flex flex-wrap gap-3">
<span class="reveal rounded-xl border border-white/25 px-5 py-2 text-sm">{{ __('home.sectors.hospitality') }}</span>
<span class="reveal rounded-xl border border-white/25 px-5 py-2 text-sm">{{ __('home.sectors.wellness') }}</span>
<span class="reveal rounded-xl border border-white/25 px-5 py-2 text-sm">{{ __('home.sectors.sustainability') }}</span>
<span class="reveal rounded-xl border border-white/25 px-5 py-2 text-sm">{{ __('home.sectors.culture') }}</span>
<span class="reveal rounded-xl border border-white/25 px-5 py-2 text-sm">{{ __('home.sectors.lifestyle') }}</span>
<span class="reveal rounded-xl border border-white/25 px-5 py-2 text-sm">{{ __('home.sectors.social_impact') }}</span>
<span class="reveal rounded-xl border border-white/25 px-5 py-2 text-sm">{{ __('home.sectors.education') }}</span>
<span class="reveal rounded-xl border border-white/25 px-5 py-2 text-sm">{{ __('home.sectors.technology') }}</span>
<span class="reveal rounded-xl bg-[#FFC531] text-[#22281F] px-5 py-2 text-sm font-bold">{{ __('home.sectors.more') }}</span>
</div></div>
</section>

{{-- Reach out: title and ethos quote only, no crew grid --}}
<section id="krama" class="max-w-7xl mx-auto px-5 sm:px-8 py-24">
<h2 class="reveal text-4xl sm:text-5xl font-extrabold tracking-tight text-center">{{ __('contact.reach_out') }}</h2>
<blockquote class="reveal mt-14 max-w-3xl mx-auto text-center text-2xl sm:text-3xl font-medium leading-snug">"{{ __('home.ethos.body') }}"</blockquote>
</section>

</main>

<footer id="gabung" class="max-w-7xl mx-auto px-5 sm:px-8 pb-12">
{{-- Text sits at full opacity: white/80 on magenta is 3.5:1 and fails AA for body copy. --}}
<div class="reveal bg-[#D92662] text-white rounded-[2.5rem] px-8 sm:px-14 py-16 relative overflow-hidden">
<img src="https://images.unsplash.com/photo-1782665665126-78e492eecca1?auto=format&fit=crop&w=1400&h=500&q=80" alt="" aria-hidden="true" class="absolute inset-0 w-full h-full object-cover opacity-20 mix-blend-luminosity">
<div class="relative flex flex-wrap items-end justify-between gap-8">
<div><h2 class="font-extrabold tracking-tight leading-[1.0] text-[clamp(2.4rem,5.5vw,4.5rem)]">{{ __('home.contact.heading') }}</h2><p class="mt-4 max-w-md">{{ __('home.contact.subtitle') }}</p></div>
<div class="flex flex-col gap-3 min-w-[280px]"><a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" class="sticker bg-white text-[#22281F] text-center font-extrabold rounded-full px-8 py-4 hover:bg-[#22281F] hover:text-white transition">{{ __('home.hero.cta_contact') }}</a><a href="{{ route('projects.index', ['locale' => app()->getLocale()]) }}" class="text-center rounded-2xl border-2 border-white/70 font-bold px-8 py-3.5 hover:bg-white/10 transition">{{ __('home.hero.cta_work') }}</a></div>
</div>
<div class="relative mt-8 flex flex-wrap gap-x-8 gap-y-2 text-sm">
@if($banjarSetting)<p><a href="mailto:{{ $banjarSetting->email }}" class="underline">{{ $banjarSetting->email }}</a></p><p><a href="https://wa.me/{{ preg_replace('/\D/','',$banjarSetting->phone) }}" class="underline">{{ $banjarSetting->phone_display }}</a></p><p>{{ $banjarSetting->address }}</p>@endif
</div>
<div class="relative mt-8 pt-6 border-t border-white/30 flex flex-wrap justify-between gap-3 text-sm"><p>{{ __('layout.footer.copyright', ['year' => date('Y')]) }}</p><p>{!! __('layout.footer.made_with', ['soul' => '<span class="italic">'.__('layout.footer.made_with_soul').'</span>']) !!}</p></div>
</div>
</footer>
<script>const io=new IntersectionObserver(es=>es.forEach(e=>e.isIntersecting&&e.target.classList.add('in')),{threshold:.12});document.querySelectorAll('.reveal').forEach(el=>io.observe(el));
(function(){const t=document.getElementById('navToggle'),m=document.getElementById('mobileNav'),s=document.getElementById('siteNav');if(t&&m){const set=o=>{m.classList.toggle('open',o);t.setAttribute('aria-expanded',o?'true':'false');if(s)s.classList.toggle('nav-open',o);const i=t.querySelector('i');if(i){i.classList.toggle('ph-list',!o);i.classList.toggle('ph-x',o);}document.documentElement.style.overflow=o?'hidden':'';};t.addEventListener('click',()=>set(!m.classList.contains('open')));m.querySelectorAll('a').forEach(a=>a.addEventListener('click',()=>set(false)));document.addEventListener('keydown',e=>{if(e.key==='Escape')set(false)});window.addEventListener('resize',()=>{if(window.innerWidth>=768)set(false)});}if(s){const on=()=>s.classList.toggle('scrolled',window.scrollY>24);on();window.addEventListener('scroll',on,{passive:true});}})();</script>
</body>
</html>
