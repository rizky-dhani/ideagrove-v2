<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'STRIDE | Athletic Performance Gear' }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Clash+Display:wght@400;500;600;700&family=Satoshi:wght@400;500;700&display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            display: ['"Clash Display"', 'sans-serif'],
            body: ['Satoshi', 'sans-serif'],
          },
          colors: {
            surface: {
              950: '#0a0a0a',
              900: '#111111',
              800: '#1a1a1a',
              700: '#242424',
            },
            flame: {
              400: '#FF6B35',
              500: '#FF4500',
              600: '#E03C00',
            },
          },
        },
      },
    }
  </script>
  <style>
    body { font-family: 'Satoshi', sans-serif; }
    .font-display { font-family: 'Clash Display', sans-serif; }

    /* Scroll reveal */
    .reveal {
      opacity: 0;
      transform: translateY(40px);
      transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1),
                  transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .reveal.visible {
      opacity: 1;
      transform: translateY(0);
    }
    .reveal-delay-1 { transition-delay: 0.1s; }
    .reveal-delay-2 { transition-delay: 0.2s; }
    .reveal-delay-3 { transition-delay: 0.3s; }
    .reveal-delay-4 { transition-delay: 0.4s; }

    /* Stagger children */
    .stagger-children .reveal:nth-child(1) { transition-delay: 0s; }
    .stagger-children .reveal:nth-child(2) { transition-delay: 0.08s; }
    .stagger-children .reveal:nth-child(3) { transition-delay: 0.16s; }
    .stagger-children .reveal:nth-child(4) { transition-delay: 0.24s; }
    .stagger-children .reveal:nth-child(5) { transition-delay: 0.32s; }

    /* Button hover physics */
    .btn-flame {
      transition: all 0.4s cubic-bezier(0.32, 0.72, 0, 1);
    }
    .btn-flame:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 30px rgba(255, 69, 0, 0.25);
    }
    .btn-flame:active {
      transform: translateY(0) scale(0.98);
    }

    /* Ghost button */
    .btn-ghost {
      transition: all 0.4s cubic-bezier(0.32, 0.72, 0, 1);
    }
    .btn-ghost:hover {
      background: rgba(255,255,255,0.08);
      border-color: rgba(255,255,255,0.3);
    }

    /* Image hover */
    .img-zoom {
      overflow: hidden;
    }
    .img-zoom img {
      transition: transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .img-zoom:hover img {
      transform: scale(1.05);
    }

    /* Grain overlay */
    .grain::after {
      content: "";
      position: fixed;
      inset: 0;
      z-index: 50;
      pointer-events: none;
      opacity: 0.035;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E");
      background-repeat: repeat;
    }

    /* Product card double-bezel */
    .product-card {
      position: relative;
      border-radius: 1.25rem;
      background: rgba(255,255,255,0.03);
      border: 1px solid rgba(255,255,255,0.06);
      padding: 2px;
    }
    .product-card-inner {
      border-radius: calc(1.25rem - 2px);
      background: #111111;
      height: 100%;
      box-shadow: inset 0 1px 0 rgba(255,255,255,0.06);
      overflow: hidden;
    }

    /* Nav pill */
    .nav-pill {
      backdrop-filter: blur(20px) saturate(180%);
      -webkit-backdrop-filter: blur(20px) saturate(180%);
      background: rgba(10, 10, 10, 0.7);
      border: 1px solid rgba(255,255,255,0.08);
    }

    /* Collection card */
    .collection-card {
      transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .collection-card:hover {
      transform: translateY(-4px);
    }
    .collection-card:hover .collection-overlay {
      opacity: 0.4;
    }

    /* Reduced motion */
    @media (prefers-reduced-motion: reduce) {
      .reveal {
        opacity: 1;
        transform: none;
        transition: none;
      }
      .collection-card:hover {
        transform: none;
      }
    }
  </style>
</head>
<body class="bg-surface-950 text-gray-300 font-body grain">

  <!-- Nav -->
  <nav class="fixed top-0 left-0 right-0 z-40 flex justify-center px-4 pt-5 md:pt-6">
    <div class="nav-pill rounded-full px-6 py-3 flex items-center gap-8">
      <a href="#" class="font-display font-bold text-white text-sm tracking-wider uppercase">STRIDE</a>
      <div class="hidden md:flex items-center gap-6 text-[13px] text-gray-400">
        <a href="#collections" class="hover:text-white transition-colors duration-300">Collections</a>
        <a href="#featured" class="hover:text-white transition-colors duration-300">Featured</a>
        <a href="#story" class="hover:text-white transition-colors duration-300">Our Story</a>
        <a href="#contact" class="hover:text-white transition-colors duration-300">Contact</a>
      </div>
      <a href="#collections" class="btn-flame bg-flame-500 text-white text-[13px] font-semibold px-5 py-2 rounded-full inline-block">
        Shop Now
      </a>
      <!-- Mobile menu button -->
      <button id="menu-btn" class="md:hidden text-white ml-2" aria-label="Toggle menu">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
          <line x1="2" y1="5" x2="18" y2="5" stroke="currentColor" stroke-width="1.5"/>
          <line x1="2" y1="15" x2="18" y2="15" stroke="currentColor" stroke-width="1.5"/>
        </svg>
      </button>
    </div>
  </nav>

  <!-- Mobile menu overlay -->
  <div id="mobile-menu" class="fixed inset-0 z-50 bg-surface-950/95 backdrop-blur-3xl hidden flex-col items-center justify-center gap-8 text-2xl font-display text-white">
    <button id="menu-close" class="absolute top-6 right-6 text-gray-400 hover:text-white transition-colors" aria-label="Close menu">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
        <line x1="4" y1="4" x2="20" y2="20" stroke="currentColor" stroke-width="1.5"/>
        <line x1="20" y1="4" x2="4" y2="20" stroke="currentColor" stroke-width="1.5"/>
      </svg>
    </button>
    <a href="#collections" class="mobile-link hover:text-flame-400 transition-colors">Collections</a>
    <a href="#featured" class="mobile-link hover:text-flame-400 transition-colors">Featured</a>
    <a href="#story" class="mobile-link hover:text-flame-400 transition-colors">Our Story</a>
    <a href="#contact" class="mobile-link hover:text-flame-400 transition-colors">Contact</a>
    <a href="#collections" class="btn-flame bg-flame-500 text-white font-semibold px-8 py-3 rounded-full mt-4 mobile-link">Shop Now</a>
  </div>

  <!-- Hero -->
  <section class="min-h-[100dvh] flex items-center relative overflow-hidden">
    <!-- Background ambient glow -->
    <div class="absolute top-1/4 right-1/4 w-[500px] h-[500px] rounded-full bg-flame-500/5 blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] rounded-full bg-flame-600/3 blur-[100px] pointer-events-none"></div>

    <div class="max-w-[1400px] mx-auto w-full px-6 md:px-12 pt-28 pb-16 md:pt-32 md:pb-24 grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-6 items-center">
      <!-- Text side -->
      <div class="lg:col-span-6 xl:col-span-5">
        <div class="reveal">
          <span class="inline-block text-[11px] uppercase tracking-[0.2em] text-flame-400 font-medium mb-6">Performance Gear</span>
        </div>
        <h1 class="font-display font-bold text-white text-[clamp(2.5rem,6vw,5rem)] leading-[1.05] tracking-tight mb-6 reveal reveal-delay-1">
          Built for<br>the grind
        </h1>
        <p class="text-gray-400 text-lg md:text-xl leading-relaxed max-w-[42ch] mb-10 reveal reveal-delay-2">
          Technical fabrics. Precise cuts. No compromises. Every piece engineered to move with you, not against you.
        </p>
        <div class="flex flex-wrap gap-4 reveal reveal-delay-3">
          <a href="#collections" class="btn-flame bg-flame-500 text-white font-semibold px-7 py-3.5 rounded-full text-sm inline-flex items-center gap-2">
            Shop Collections
            <span class="w-7 h-7 rounded-full bg-white/10 flex items-center justify-center text-xs">
              <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M2 6h8M7 3l3 3-3 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
          </a>
          <a href="#story" class="btn-ghost border border-white/15 text-white font-medium px-7 py-3.5 rounded-full text-sm">
            Our Story
          </a>
        </div>
      </div>

      <!-- Image side -->
      <div class="lg:col-span-6 xl:col-span-7 relative reveal reveal-delay-2">
        <div class="relative rounded-[1.5rem] overflow-hidden aspect-[4/3] lg:aspect-[16/11]">
          <img
            src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=1200&q=80&auto=format&fit=crop"
            alt="Athlete running at sunrise in STRIDE performance gear"
            class="w-full h-full object-cover"
            loading="eager"
          >
          <!-- Inner frame highlight -->
          <div class="absolute inset-0 rounded-[1.5rem] ring-1 ring-inset ring-white/10 pointer-events-none"></div>
        </div>
        <!-- Floating stat card -->
        <div class="absolute -bottom-4 -left-4 md:bottom-8 md:-left-6 bg-surface-800 border border-white/8 rounded-2xl px-5 py-4 shadow-2xl">
          <div class="font-display font-bold text-3xl text-white">12K+</div>
          <div class="text-gray-500 text-xs mt-1">athletes worldwide</div>
        </div>
      </div>
    </div>
  </section>

  <!-- Marquee strip -->
  <div class="border-y border-white/5 py-4 overflow-hidden">
    <div class="flex gap-12 animate-marquee whitespace-nowrap text-[11px] uppercase tracking-[0.25em] text-gray-600 font-medium">
      <span>Running</span><span class="text-flame-500/40">&#x2022;</span>
      <span>Training</span><span class="text-flame-500/40">&#x2022;</span>
      <span>Recovery</span><span class="text-flame-500/40">&#x2022;</span>
      <span>Performance</span><span class="text-flame-500/40">&#x2022;</span>
      <span>Endurance</span><span class="text-flame-500/40">&#x2022;</span>
      <span>Strength</span><span class="text-flame-500/40">&#x2022;</span>
      <span>Running</span><span class="text-flame-500/40">&#x2022;</span>
      <span>Training</span><span class="text-flame-500/40">&#x2022;</span>
      <span>Recovery</span><span class="text-flame-500/40">&#x2022;</span>
      <span>Performance</span><span class="text-flame-500/40">&#x2022;</span>
      <span>Endurance</span><span class="text-flame-500/40">&#x2022;</span>
      <span>Strength</span>
    </div>
  </div>

  <!-- Collections -->
  <section id="collections" class="py-24 md:py-36">
    <div class="max-w-[1400px] mx-auto px-6 md:px-12">
      <div class="max-w-2xl mb-16 md:mb-20">
        <h2 class="font-display font-bold text-white text-3xl md:text-5xl tracking-tight leading-[1.1] reveal">
          Collections
        </h2>
        <p class="text-gray-500 mt-4 text-base md:text-lg max-w-[50ch] reveal reveal-delay-1">
          Three lines, each built for a different kind of movement.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 stagger-children">
        <!-- Running -->
        <a href="#" class="collection-card group relative rounded-[1.5rem] overflow-hidden aspect-[3/4] reveal">
          <img
            src="https://images.unsplash.com/photo-1552674605-db6ffd4facb5?w=600&q=80&auto=format&fit=crop"
            alt="STRIDE Running collection - lightweight performance shoes and apparel"
            class="w-full h-full object-cover"
            loading="lazy"
          >
          <div class="collection-overlay absolute inset-0 bg-black/50 transition-opacity duration-500"></div>
          <div class="absolute inset-0 flex flex-col justify-end p-8">
            <span class="text-flame-400 text-[11px] uppercase tracking-[0.18em] font-medium mb-2">01</span>
            <h3 class="font-display font-bold text-white text-2xl md:text-3xl leading-tight mb-2">Running</h3>
            <p class="text-gray-400 text-sm max-w-[30ch]">Lightweight. Breathable. Built for distance.</p>
          </div>
          <div class="absolute inset-0 rounded-[1.5rem] ring-1 ring-inset ring-white/10 pointer-events-none"></div>
        </a>

        <!-- Training -->
        <a href="#" class="collection-card group relative rounded-[1.5rem] overflow-hidden aspect-[3/4] reveal">
          <img
            src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=600&q=80&auto=format&fit=crop"
            alt="STRIDE Training collection - gym and cross-training gear"
            class="w-full h-full object-cover"
            loading="lazy"
          >
          <div class="collection-overlay absolute inset-0 bg-black/50 transition-opacity duration-500"></div>
          <div class="absolute inset-0 flex flex-col justify-end p-8">
            <span class="text-flame-400 text-[11px] uppercase tracking-[0.18em] font-medium mb-2">02</span>
            <h3 class="font-display font-bold text-white text-2xl md:text-3xl leading-tight mb-2">Training</h3>
            <p class="text-gray-400 text-sm max-w-[30ch]">Durable. Flexible. Built for the gym.</p>
          </div>
          <div class="absolute inset-0 rounded-[1.5rem] ring-1 ring-inset ring-white/10 pointer-events-none"></div>
        </a>

        <!-- Lifestyle -->
        <a href="#" class="collection-card group relative rounded-[1.5rem] overflow-hidden aspect-[3/4] reveal">
          <img
            src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=600&q=80&auto=format&fit=crop"
            alt="STRIDE Lifestyle collection - premium athleisure wear"
            class="w-full h-full object-cover"
            loading="lazy"
          >
          <div class="collection-overlay absolute inset-0 bg-black/50 transition-opacity duration-500"></div>
          <div class="absolute inset-0 flex flex-col justify-end p-8">
            <span class="text-flame-400 text-[11px] uppercase tracking-[0.18em] font-medium mb-2">03</span>
            <h3 class="font-display font-bold text-white text-2xl md:text-3xl leading-tight mb-2">Lifestyle</h3>
            <p class="text-gray-400 text-sm max-w-[30ch]">Clean lines. Everyday wear. No compromise.</p>
          </div>
          <div class="absolute inset-0 rounded-[1.5rem] ring-1 ring-inset ring-white/10 pointer-events-none"></div>
        </a>
      </div>
    </div>
  </section>

  <!-- Featured Products -->
  <section id="featured" class="py-24 md:py-36 border-t border-white/5">
    <div class="max-w-[1400px] mx-auto px-6 md:px-12">
      <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-16 md:mb-20">
        <h2 class="font-display font-bold text-white text-3xl md:text-5xl tracking-tight leading-[1.1] reveal">
          Featured
        </h2>
        <a href="#" class="text-flame-400 text-sm font-medium flex items-center gap-2 hover:text-flame-300 transition-colors reveal reveal-delay-1">
          View all products
          <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M3 11L11 3M11 3H5M11 3v6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>

      <!-- Product grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 stagger-children">
        <!-- Product 1 -->
        <div class="product-card reveal">
          <div class="product-card-inner">
            <div class="aspect-square overflow-hidden rounded-t-[calc(1.25rem-2px)]">
              <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400&q=80&auto=format&fit=crop" alt="Stride Aero Runner in black with flame sole" class="w-full h-full object-cover img-zoom" loading="lazy">
            </div>
            <div class="p-5">
              <div class="text-[11px] uppercase tracking-[0.15em] text-gray-600 mb-1">Running</div>
              <h3 class="font-display font-semibold text-white text-sm mb-1">Aero Runner</h3>
              <div class="flex items-center justify-between">
                <span class="font-display font-bold text-white">$145</span>
                <span class="text-flame-400 text-xs font-medium">New</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Product 2 -->
        <div class="product-card reveal">
          <div class="product-card-inner">
            <div class="aspect-square overflow-hidden rounded-t-[calc(1.25rem-2px)]">
              <img src="https://images.unsplash.com/photo-1556906781-9a412961c28c?w=400&q=80&auto=format&fit=crop" alt="Stride Training Pro in white" class="w-full h-full object-cover img-zoom" loading="lazy">
            </div>
            <div class="p-5">
              <div class="text-[11px] uppercase tracking-[0.15em] text-gray-600 mb-1">Training</div>
              <h3 class="font-display font-semibold text-white text-sm mb-1">Training Pro</h3>
              <div class="flex items-center justify-between">
                <span class="font-display font-bold text-white">$120</span>
                <span class="text-gray-600 text-xs">In stock</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Product 3 -->
        <div class="product-card reveal">
          <div class="product-card-inner">
            <div class="aspect-square overflow-hidden rounded-t-[calc(1.25rem-2px)]">
              <img src="https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=400&q=80&auto=format&fit=crop" alt="Stride Recovery Slide in black" class="w-full h-full object-cover img-zoom" loading="lazy">
            </div>
            <div class="p-5">
              <div class="text-[11px] uppercase tracking-[0.15em] text-gray-600 mb-1">Recovery</div>
              <h3 class="font-display font-semibold text-white text-sm mb-1">Recovery Slide</h3>
              <div class="flex items-center justify-between">
                <span class="font-display font-bold text-white">$65</span>
                <span class="text-gray-600 text-xs">In stock</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Product 4 -->
        <div class="product-card reveal">
          <div class="product-card-inner">
            <div class="aspect-square overflow-hidden rounded-t-[calc(1.25rem-2px)]">
              <img src="https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?w=400&q=80&auto=format&fit=crop" alt="Stride Endurance X in red" class="w-full h-full object-cover img-zoom" loading="lazy">
            </div>
            <div class="p-5">
              <div class="text-[11px] uppercase tracking-[0.15em] text-gray-600 mb-1">Running</div>
              <h3 class="font-display font-semibold text-white text-sm mb-1">Endurance X</h3>
              <div class="flex items-center justify-between">
                <span class="font-display font-bold text-white">$165</span>
                <span class="text-flame-400 text-xs font-medium">Limited</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Story -->
  <section id="story" class="py-24 md:py-36 border-t border-white/5">
    <div class="max-w-[1400px] mx-auto px-6 md:px-12 grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
      <!-- Image -->
      <div class="lg:col-span-5 reveal">
        <div class="rounded-[1.5rem] overflow-hidden aspect-[3/4] relative">
          <img
            src="https://images.unsplash.com/photo-1517836357463-d25dfeac3438?w=600&q=80&auto=format&fit=crop"
            alt="Athletes training in STRIDE gear at dawn"
            class="w-full h-full object-cover"
            loading="lazy"
          >
          <div class="absolute inset-0 rounded-[1.5rem] ring-1 ring-inset ring-white/10 pointer-events-none"></div>
        </div>
      </div>

      <!-- Text -->
      <div class="lg:col-span-7">
        <span class="inline-block text-[11px] uppercase tracking-[0.2em] text-flame-400 font-medium mb-6 reveal">Our story</span>
        <h2 class="font-display font-bold text-white text-3xl md:text-5xl tracking-tight leading-[1.1] mb-8 reveal reveal-delay-1">
          Started in a garage,<br>not a boardroom
        </h2>
        <div class="space-y-5 text-gray-400 leading-relaxed max-w-[55ch]">
          <p class="reveal reveal-delay-2">
            STRIDE began in 2020 when two college runners got tired of choosing between gear that looked good and gear that performed. We started with one shoe, one short, and a stubborn belief that you shouldn't have to pick.
          </p>
          <p class="reveal reveal-delay-3">
            Every fabric is tested on real runs. Every cut is refined through real movement. We don't design for catalogs. We design for the 5AM alarm, the long reps, the last mile when everything hurts and you keep going anyway.
          </p>
        </div>
        <!-- Stats row -->
        <div class="grid grid-cols-3 gap-6 mt-12 pt-8 border-t border-white/5 reveal reveal-delay-4">
          <div>
            <div class="font-display font-bold text-white text-3xl">5</div>
            <div class="text-gray-600 text-xs mt-1">years running</div>
          </div>
          <div>
            <div class="font-display font-bold text-white text-3xl">48</div>
            <div class="text-gray-600 text-xs mt-1">products in line</div>
          </div>
          <div>
            <div class="font-display font-bold text-white text-3xl">23</div>
            <div class="text-gray-600 text-xs mt-1">countries shipped</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonial -->
  <section class="py-24 md:py-36 border-t border-white/5">
    <div class="max-w-[1400px] mx-auto px-6 md:px-12">
      <div class="max-w-3xl mx-auto text-center reveal">
        <svg class="mx-auto mb-8 text-flame-500/20" width="48" height="48" viewBox="0 0 48 48" fill="none">
          <path d="M14 28c-4 0-6-3-6-6s3-6 6-6c-3 0-6-3-6-6h12v18H14zm20 0c-4 0-6-3-6-6s3-6 6-6c-3 0-6-3-6-6h12v18H34z" fill="currentColor"/>
        </svg>
        <blockquote class="font-display text-white text-xl md:text-3xl leading-snug tracking-tight mb-8">
          "I've run three marathons in STRIDE gear. The Aero Runner is the only shoe that feels like it disappears on my foot."
        </blockquote>
        <div class="flex items-center justify-center gap-3">
          <div class="w-10 h-10 rounded-full overflow-hidden">
            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=160&q=80&auto=format&fit=crop" alt="Marcus T." class="w-full h-full object-cover" loading="lazy">
          </div>
          <div class="text-left">
            <div class="text-white text-sm font-medium">Marcus T.</div>
            <div class="text-gray-600 text-xs">Marathon runner, Chicago</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section id="contact" class="py-24 md:py-36 border-t border-white/5">
    <div class="max-w-[1400px] mx-auto px-6 md:px-12 text-center">
      <h2 class="font-display font-bold text-white text-3xl md:text-5xl tracking-tight leading-[1.1] mb-6 reveal">
        Ready to move?
      </h2>
      <p class="text-gray-500 text-lg max-w-[45ch] mx-auto mb-10 reveal reveal-delay-1">
        Join 12,000+ athletes who train in gear that keeps up.
      </p>
      <div class="flex flex-wrap justify-center gap-4 reveal reveal-delay-2">
        <a href="#" class="btn-flame bg-flame-500 text-white font-semibold px-8 py-3.5 rounded-full text-sm inline-flex items-center gap-2">
          Shop All
          <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M2 6h8M7 3l3 3-3 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
        <a href="#" class="btn-ghost border border-white/15 text-white font-medium px-8 py-3.5 rounded-full text-sm">
          Find a Store
        </a>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="border-t border-white/5 py-10">
    <div class="max-w-[1400px] mx-auto px-6 md:px-12 flex flex-col md:flex-row items-center justify-between gap-4">
      <div class="font-display font-bold text-white text-sm tracking-wider uppercase">STRIDE</div>
      <div class="flex items-center gap-6 text-[13px] text-gray-500">
        <a href="#" class="hover:text-white transition-colors">Running</a>
        <a href="#" class="hover:text-white transition-colors">Training</a>
        <a href="#" class="hover:text-white transition-colors">Lifestyle</a>
        <a href="#" class="hover:text-white transition-colors">Support</a>
      </div>
      <div class="text-gray-600 text-xs">&copy; 2025 STRIDE. All rights reserved.</div>
    </div>
  </footer>

  <!-- Script: scroll reveal + mobile menu -->
  <script>
    // IntersectionObserver for scroll reveals
    const revealObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          revealObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });

    document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

    // Mobile menu
    const menuBtn = document.getElementById('menu-btn');
    const menuClose = document.getElementById('menu-close');
    const mobileMenu = document.getElementById('mobile-menu');

    menuBtn.addEventListener('click', () => {
      mobileMenu.classList.remove('hidden');
      mobileMenu.classList.add('flex');
    });

    menuClose.addEventListener('click', () => {
      mobileMenu.classList.add('hidden');
      mobileMenu.classList.remove('flex');
    });

    mobileMenu.querySelectorAll('.mobile-link').forEach(link => {
      link.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
        mobileMenu.classList.remove('flex');
      });
    });

    // Marquee animation via CSS
    const style = document.createElement('style');
    style.textContent = `
      @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
      }
      .animate-marquee {
        animation: marquee 20s linear infinite;
      }
    `;
    document.head.appendChild(style);
  </script>

</body>
</html>
