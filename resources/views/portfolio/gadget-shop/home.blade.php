<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'PULSE | Premium Tech Devices' }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            display: ['Inter', 'sans-serif'],
            body: ['Inter', 'sans-serif'],
            mono: ['JetBrains Mono', 'monospace'],
          },
          colors: {
            frost: '#F8FAFC',
            mist: '#F1F5F9',
            steel: {
              50: '#EFF6FF',
              100: '#DBEAFE',
              200: '#BFDBFE',
              300: '#93C5FD',
              400: '#60A5FA',
              500: '#3B82F6',
              600: '#2563EB',
              700: '#1D4ED8',
              800: '#1E40AF',
            },
          },
        },
      },
    }
  </script>
  <style>
    body { font-family: 'Inter', sans-serif; }
    .font-display { font-family: 'Inter', sans-serif; }
    .font-mono { font-family: 'JetBrains Mono', monospace; }

    /* Scroll reveal */
    .reveal {
      opacity: 0;
      transform: translateY(30px);
      transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1),
                  transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .reveal.visible {
      opacity: 1;
      transform: translateY(0);
    }
    .reveal-delay-1 { transition-delay: 0.08s; }
    .reveal-delay-2 { transition-delay: 0.16s; }
    .reveal-delay-3 { transition-delay: 0.24s; }
    .reveal-delay-4 { transition-delay: 0.32s; }

    .stagger-children .reveal:nth-child(1) { transition-delay: 0s; }
    .stagger-children .reveal:nth-child(2) { transition-delay: 0.06s; }
    .stagger-children .reveal:nth-child(3) { transition-delay: 0.12s; }
    .stagger-children .reveal:nth-child(4) { transition-delay: 0.18s; }

    /* Image hover */
    .img-lift { overflow: hidden; }
    .img-lift img {
      transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .img-lift:hover img { transform: scale(1.04); }

    /* Product card lift */
    .product-row {
      transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .product-row:hover { transform: translateY(-3px); }

    @media (prefers-reduced-motion: reduce) {
      .reveal { opacity: 1; transform: none; transition: none; }
      .product-row:hover { transform: none; }
    }
  </style>
</head>
<body class="bg-white text-slate-900 font-body">

  <!-- Nav -->
  <header class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-200/60">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-6 md:px-10 h-16 md:h-18">
      <a href="{{ url('/en/work/gadget-shop') }}" class="font-display font-bold text-slate-900 text-lg tracking-tight">PULSE</a>
      <nav class="hidden md:flex items-center gap-8 text-[13px] font-medium text-slate-400">
        <a href="{{ url('/en/work/gadget-shop') }}" class="text-slate-900 transition-colors">Home</a>
        <a href="{{ url('/en/work/gadget-shop/products') }}" class="hover:text-slate-900 transition-colors">Products</a>
        <a href="{{ url('/en/work/gadget-shop/about') }}" class="hover:text-slate-900 transition-colors">About</a>
        <a href="{{ url('/en/work/gadget-shop/contact') }}" class="hover:text-slate-900 transition-colors">Contact</a>
      </nav>
      <div class="flex items-center gap-4">
        <a href="{{ url('/en/work/gadget-shop/products') }}" class="hidden sm:inline-flex items-center gap-2 bg-steel-600 text-white text-[13px] font-semibold px-5 py-2.5 rounded-full hover:bg-steel-700 transition-colors">
          Shop
        </a>
        <button id="menu-btn" class="md:hidden text-slate-900" aria-label="Open menu">
          <svg width="22" height="22" viewBox="0 0 22 22" fill="none"><line x1="3" y1="6" x2="19" y2="6" stroke="currentColor" stroke-width="1.5"/><line x1="3" y1="16" x2="19" y2="16" stroke="currentColor" stroke-width="1.5"/></svg>
        </button>
      </div>
    </div>
  </header>

  <!-- Mobile menu -->
  <div id="mobile-menu" class="fixed inset-0 z-[60] bg-white hidden flex-col pt-20 px-8">
    <button id="menu-close" class="absolute top-5 right-6 text-slate-900" aria-label="Close menu">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><line x1="5" y1="5" x2="19" y2="19" stroke="currentColor" stroke-width="1.5"/><line x1="19" y1="5" x2="5" y2="19" stroke="currentColor" stroke-width="1.5"/></svg>
    </button>
    <nav class="flex flex-col gap-6 text-3xl font-display font-semibold text-slate-900">
      <a href="{{ url('/en/work/gadget-shop') }}" class="mobile-link">Home</a>
      <a href="{{ url('/en/work/gadget-shop/products') }}" class="mobile-link">Products</a>
      <a href="{{ url('/en/work/gadget-shop/about') }}" class="mobile-link">About</a>
      <a href="{{ url('/en/work/gadget-shop/contact') }}" class="mobile-link">Contact</a>
    </nav>
  </div>

  <!-- Hero: asymmetric split -->
  <section class="pt-28 pb-16 md:pt-32 md:pb-24 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-steel-50 rounded-full blur-[120px] opacity-60 -z-10"></div>
    <div class="max-w-7xl mx-auto px-6 md:px-10 grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
      <div class="lg:col-span-5">
        <h1 class="font-display font-bold text-slate-900 text-[clamp(2.5rem,6vw,4.5rem)] leading-[1.05] tracking-tight reveal">
          Technology that fits your life
        </h1>
        <p class="text-slate-500 text-lg mt-5 max-w-[42ch] leading-relaxed reveal reveal-delay-1">
          Curated devices from the brands you trust. Smartphones, tablets, laptops, and more.
        </p>
        <div class="flex flex-wrap gap-4 mt-8 reveal reveal-delay-2">
          <a href="{{ url('/en/work/gadget-shop/products') }}" class="inline-flex items-center gap-2 bg-steel-600 text-white font-semibold px-7 py-3.5 rounded-full text-sm hover:bg-steel-700 transition-colors">
            Shop All
            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M2 6h8M7 3l3 3-3 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
          <a href="#categories" class="inline-flex items-center gap-2 border border-slate-200 text-slate-700 font-medium px-7 py-3.5 rounded-full text-sm hover:bg-slate-50 transition-colors">
            Browse Categories
          </a>
        </div>
      </div>
      <div class="lg:col-span-7 relative reveal reveal-delay-1">
        <div class="rounded-2xl overflow-hidden aspect-[16/11] img-lift">
          <img src="https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=1200&q=80&auto=format&fit=crop" alt="Modern laptop on a clean desk setup" class="w-full h-full object-cover" loading="eager">
        </div>
        <div class="absolute bottom-4 left-4 bg-white/90 backdrop-blur-sm rounded-xl px-4 py-3 shadow-sm">
          <div class="font-mono font-bold text-slate-900 text-lg">500+</div>
          <div class="text-slate-400 text-[11px] uppercase tracking-[0.15em]">devices in stock</div>
        </div>
      </div>
    </div>
  </section>

  <!-- Trust bar -->
  <section class="border-y border-slate-200/60 py-5">
    <div class="max-w-7xl mx-auto px-6 md:px-10 flex flex-wrap items-center justify-center gap-x-10 gap-y-3 text-[11px] uppercase tracking-[0.2em] text-slate-400 font-medium">
      <span>Apple</span>
      <span class="hidden sm:inline">&middot;</span>
      <span>Samsung</span>
      <span class="hidden sm:inline">&middot;</span>
      <span>Google</span>
      <span class="hidden sm:inline">&middot;</span>
      <span>Sony</span>
      <span class="hidden sm:inline">&middot;</span>
      <span>OnePlus</span>
    </div>
  </section>

  <!-- Categories: asymmetric bento -->
  <section id="categories" class="py-24 md:py-36">
    <div class="max-w-7xl mx-auto px-6 md:px-10">
      <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-14 md:mb-20">
        <div>
          <h2 class="font-display font-bold text-slate-900 text-3xl md:text-5xl tracking-tight leading-[1.1] reveal">Categories</h2>
          <p class="text-slate-500 mt-3 text-base max-w-[40ch] reveal reveal-delay-1">Find the device that matches how you work and play.</p>
        </div>
        <a href="{{ url('/en/work/gadget-shop/products') }}" class="text-steel-600 text-sm font-medium flex items-center gap-1.5 hover:text-steel-700 transition-colors reveal reveal-delay-1">
          View all
          <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M3 11L11 3M11 3H5M11 3v6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>

      <!-- Asymmetric bento: 1 tall left + 2 stacked right -->
      <div class="grid grid-cols-1 md:grid-cols-12 gap-4 stagger-children">
        <!-- Tall card: Smartphones -->
        <a href="{{ url('/en/work/gadget-shop/products') }}" class="md:col-span-5 group relative rounded-2xl overflow-hidden aspect-[3/4] md:aspect-auto md:row-span-2 reveal">
          <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=800&q=80&auto=format&fit=crop" alt="Smartphone collection" class="w-full h-full object-cover img-lift" loading="lazy">
          <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent"></div>
          <div class="absolute bottom-0 left-0 p-8">
            <span class="text-white/50 text-[10px] uppercase tracking-[0.2em]">01</span>
            <h3 class="font-display font-bold text-white text-2xl mt-1">Smartphones</h3>
            <p class="text-white/60 text-sm mt-1 max-w-[25ch]">Flagships and foldables from every major brand.</p>
          </div>
        </a>

        <!-- Top right: Laptops -->
        <a href="{{ url('/en/work/gadget-shop/products') }}" class="md:col-span-7 group relative rounded-2xl overflow-hidden aspect-[16/9] reveal">
          <img src="https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=900&q=80&auto=format&fit=crop" alt="Laptop collection" class="w-full h-full object-cover img-lift" loading="lazy">
          <div class="absolute inset-0 bg-gradient-to-r from-slate-900/40 via-transparent to-transparent"></div>
          <div class="absolute bottom-0 left-0 p-8">
            <span class="text-white/50 text-[10px] uppercase tracking-[0.2em]">02</span>
            <h3 class="font-display font-bold text-white text-2xl mt-1">Laptops</h3>
            <p class="text-white/60 text-sm mt-1 max-w-[25ch]">Performance machines for creators and professionals.</p>
          </div>
        </a>

        <!-- Bottom right: Tablets -->
        <a href="{{ url('/en/work/gadget-shop/products') }}" class="md:col-span-7 group relative rounded-2xl overflow-hidden aspect-[16/9] reveal">
          <img src="https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?w=900&q=80&auto=format&fit=crop" alt="Tablet collection" class="w-full h-full object-cover img-lift" loading="lazy">
          <div class="absolute inset-0 bg-gradient-to-r from-slate-900/40 via-transparent to-transparent"></div>
          <div class="absolute bottom-0 left-0 p-8">
            <span class="text-white/50 text-[10px] uppercase tracking-[0.2em]">03</span>
            <h3 class="font-display font-bold text-white text-2xl mt-1">Tablets</h3>
            <p class="text-white/60 text-sm mt-1 max-w-[25ch]">Portable power for work, art, and entertainment.</p>
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- Featured: alternating product rows -->
  <section class="py-24 md:py-36 bg-mist">
    <div class="max-w-7xl mx-auto px-6 md:px-10">
      <h2 class="font-display font-bold text-slate-900 text-3xl md:text-5xl tracking-tight leading-[1.1] mb-14 md:mb-20 reveal">Featured</h2>

      <div class="space-y-8">
        <!-- Row 1: image left, specs right -->
        <div class="product-row grid grid-cols-1 md:grid-cols-2 gap-6 items-center reveal">
          <div class="rounded-2xl overflow-hidden aspect-[4/3] img-lift">
            <img src="https://images.unsplash.com/photo-1610945415295-d9bbf067e59c?w=700&q=80&auto=format&fit=crop" alt="Galaxy S26 Ultra" class="w-full h-full object-cover" loading="lazy">
          </div>
          <div class="md:pl-8">
            <span class="text-steel-600 text-[11px] uppercase tracking-[0.18em] font-medium">Smartphones</span>
            <h3 class="font-display font-bold text-slate-900 text-2xl md:text-3xl mt-2">Galaxy S26 Ultra</h3>
            <p class="text-slate-500 mt-3 max-w-[40ch] leading-relaxed">Titanium frame. 200MP camera system. S Pen included. The phone that does everything.</p>
            <div class="flex items-center gap-4 mt-6">
              <span class="font-display font-bold text-slate-900 text-xl">$1,299</span>
            </div>
            <a href="{{ url('/en/work/gadget-shop/products') }}" class="inline-flex items-center gap-1.5 text-steel-600 text-sm font-medium mt-4 hover:text-steel-700 transition-colors">
              Learn more
              <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M3 11L11 3M11 3H5M11 3v6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
          </div>
        </div>

        <!-- Row 2: specs left, image right -->
        <div class="product-row grid grid-cols-1 md:grid-cols-2 gap-6 items-center reveal">
          <div class="order-2 md:order-1 md:pr-8">
            <span class="text-steel-600 text-[11px] uppercase tracking-[0.18em] font-medium">Laptops</span>
            <h3 class="font-display font-bold text-slate-900 text-2xl md:text-3xl mt-2">MacBook Pro M5</h3>
            <p class="text-slate-500 mt-3 max-w-[40ch] leading-relaxed">M5 Pro chip. 22-hour battery. The most advanced MacBook ever built for pro workflows.</p>
            <div class="flex items-center gap-4 mt-6">
              <span class="font-display font-bold text-slate-900 text-xl">$2,499</span>
            </div>
            <a href="{{ url('/en/work/gadget-shop/products') }}" class="inline-flex items-center gap-1.5 text-steel-600 text-sm font-medium mt-4 hover:text-steel-700 transition-colors">
              Learn more
              <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M3 11L11 3M11 3H5M11 3v6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
          </div>
          <div class="order-1 md:order-2 rounded-2xl overflow-hidden aspect-[4/3] img-lift">
            <img src="https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=700&q=80&auto=format&fit=crop" alt="MacBook Pro M5" class="w-full h-full object-cover" loading="lazy">
          </div>
        </div>

        <!-- Row 3: image left, specs right -->
        <div class="product-row grid grid-cols-1 md:grid-cols-2 gap-6 items-center reveal">
          <div class="rounded-2xl overflow-hidden aspect-[4/3] img-lift">
            <img src="https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?w=700&q=80&auto=format&fit=crop" alt="iPad Air M4" class="w-full h-full object-cover" loading="lazy">
          </div>
          <div class="md:pl-8">
            <span class="text-steel-600 text-[11px] uppercase tracking-[0.18em] font-medium">Tablets</span>
            <h3 class="font-display font-bold text-slate-900 text-2xl md:text-3xl mt-2">iPad Air M4</h3>
            <p class="text-slate-500 mt-3 max-w-[40ch] leading-relaxed">M4 performance in a thin, light design. Liquid Retina display. Apple Pencil Pro ready.</p>
            <div class="flex items-center gap-4 mt-6">
              <span class="font-display font-bold text-slate-900 text-xl">$799</span>
            </div>
            <a href="{{ url('/en/work/gadget-shop/products') }}" class="inline-flex items-center gap-1.5 text-steel-600 text-sm font-medium mt-4 hover:text-steel-700 transition-colors">
              Learn more
              <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M3 11L11 3M11 3H5M11 3v6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Why Choose Us: 2x2 bento -->
  <section class="py-24 md:py-36">
    <div class="max-w-7xl mx-auto px-6 md:px-10">
      <h2 class="font-display font-bold text-slate-900 text-3xl md:text-5xl tracking-tight leading-[1.1] mb-14 md:mb-20 reveal">Why PULSE</h2>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 stagger-children">
        <!-- Cell 1: stat -->
        <div class="bg-steel-50 rounded-2xl p-8 md:p-10 reveal">
          <div class="font-mono font-bold text-steel-600 text-5xl md:text-6xl">24h</div>
          <h3 class="font-display font-bold text-slate-900 text-lg mt-3">Fast delivery on all orders</h3>
          <p class="text-slate-500 text-sm mt-2 max-w-[30ch]">Same-day dispatch for orders placed before 2pm.</p>
        </div>

        <!-- Cell 2: authentic -->
        <div class="bg-white border border-slate-200 rounded-2xl p-8 md:p-10 reveal">
          <div class="w-10 h-10 rounded-full bg-steel-100 flex items-center justify-center mb-4">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M6 9l2.5 2.5L12.5 6" stroke="#2563EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
          <h3 class="font-display font-bold text-slate-900 text-lg">Certified authentic</h3>
          <p class="text-slate-500 text-sm mt-2 max-w-[30ch]">Every device sourced directly from authorized distributors.</p>
        </div>

        <!-- Cell 3: warranty -->
        <div class="bg-white border border-slate-200 rounded-2xl p-8 md:p-10 reveal">
          <div class="w-10 h-10 rounded-full bg-steel-100 flex items-center justify-center mb-4">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M9 1.5L2.25 5.25v4.5c0 4.125 2.963 7.988 6.75 8.75 3.787-.762 6.75-4.625 6.75-8.75v-4.5L9 1.5z" stroke="#2563EB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
          <h3 class="font-display font-bold text-slate-900 text-lg">2-year warranty</h3>
          <p class="text-slate-500 text-sm mt-2 max-w-[30ch]">Extended coverage on all devices, no questions asked.</p>
        </div>

        <!-- Cell 4: stat -->
        <div class="bg-steel-50 rounded-2xl p-8 md:p-10 reveal">
          <div class="font-mono font-bold text-steel-600 text-5xl md:text-6xl">50K+</div>
          <h3 class="font-display font-bold text-slate-900 text-lg mt-3">Happy customers</h3>
          <p class="text-slate-500 text-sm mt-2 max-w-[30ch]">Trusted by tech enthusiasts across 30+ countries.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="py-24 md:py-36 bg-mist">
    <div class="max-w-7xl mx-auto px-6 md:px-10">
      <h2 class="font-display font-bold text-slate-900 text-3xl md:text-5xl tracking-tight leading-[1.1] mb-14 md:mb-20 reveal">What people say</h2>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 stagger-children">
        <div class="border border-slate-200 rounded-2xl p-6 bg-white reveal">
          <div class="flex gap-0.5 mb-4">
            @for ($i = 0; $i < 5; $i++)
              <svg width="16" height="16" viewBox="0 0 16 16" fill="#2563EB"><path d="M8 1.5l1.76 3.57 3.94.57-2.85 2.78.67 3.93L8 10.42l-3.52 1.93.67-3.93L2.3 5.64l3.94-.57L8 1.5z"/></svg>
            @endfor
          </div>
          <blockquote class="text-slate-700 text-sm leading-relaxed">"Ordered a MacBook Pro on Monday, arrived Tuesday. Packaging was immaculate. This is how tech shopping should feel."</blockquote>
          <div class="mt-5 pt-4 border-t border-slate-100">
            <div class="font-medium text-slate-900 text-sm">Sarah K.</div>
            <div class="text-slate-400 text-xs">Designer, Berlin</div>
          </div>
        </div>

        <div class="border border-slate-200 rounded-2xl p-6 bg-white reveal">
          <div class="flex gap-0.5 mb-4">
            @for ($i = 0; $i < 5; $i++)
              <svg width="16" height="16" viewBox="0 0 16 16" fill="#2563EB"><path d="M8 1.5l1.76 3.57 3.94.57-2.85 2.78.67 3.93L8 10.42l-3.52 1.93.67-3.93L2.3 5.64l3.94-.57L8 1.5z"/></svg>
            @endfor
          </div>
          <blockquote class="text-slate-700 text-sm leading-relaxed">"The Galaxy S26 Ultra I bought here was $200 less than retail. Genuine product, perfect condition. Will buy again."</blockquote>
          <div class="mt-5 pt-4 border-t border-slate-100">
            <div class="font-medium text-slate-900 text-sm">James R.</div>
            <div class="text-slate-400 text-xs">Engineer, London</div>
          </div>
        </div>

        <div class="border border-slate-200 rounded-2xl p-6 bg-white reveal">
          <div class="flex gap-0.5 mb-4">
            @for ($i = 0; $i < 5; $i++)
              <svg width="16" height="16" viewBox="0 0 16 16" fill="#2563EB"><path d="M8 1.5l1.76 3.57 3.94.57-2.85 2.78.67 3.93L8 10.42l-3.52 1.93.67-3.93L2.3 5.64l3.94-.57L8 1.5z"/></svg>
            @endfor
          </div>
          <blockquote class="text-slate-700 text-sm leading-relaxed">"Their support team helped me pick the right iPad for illustration work. Genuine expertise, not just sales talk."</blockquote>
          <div class="mt-5 pt-4 border-t border-slate-100">
            <div class="font-medium text-slate-900 text-sm">Mia L.</div>
            <div class="text-slate-400 text-xs">Illustrator, Tokyo</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="py-24 md:py-36 bg-slate-950 text-white">
    <div class="max-w-3xl mx-auto px-6 md:px-10 text-center">
      <h2 class="font-display font-bold text-white text-3xl md:text-5xl tracking-tight leading-[1.1] mb-5 reveal">Ready to upgrade?</h2>
      <p class="text-white/50 text-lg max-w-[40ch] mx-auto mb-10 reveal reveal-delay-1">Browse our full collection of premium devices at competitive prices.</p>
      <div class="flex flex-wrap justify-center gap-4 reveal reveal-delay-2">
        <a href="{{ url('/en/work/gadget-shop/products') }}" class="inline-flex items-center gap-2 bg-white text-slate-950 font-semibold px-8 py-3.5 rounded-full text-sm hover:bg-white/90 transition-colors">
          Shop All
          <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M2 6h8M7 3l3 3-3 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="border-t border-slate-200/60 py-10">
    <div class="max-w-7xl mx-auto px-6 md:px-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
      <div>
        <div class="font-display font-bold text-slate-900 text-sm tracking-tight">PULSE</div>
        <p class="text-slate-400 text-xs mt-2 max-w-[25ch]">Premium tech devices, curated for people who care about quality.</p>
      </div>
      <div>
        <div class="text-[11px] uppercase tracking-[0.15em] text-slate-400 font-medium mb-3">Shop</div>
        <div class="flex flex-col gap-2 text-sm text-slate-500">
          <a href="{{ url('/en/work/gadget-shop/products') }}" class="hover:text-slate-900 transition-colors">All Products</a>
          <a href="{{ url('/en/work/gadget-shop/products') }}" class="hover:text-slate-900 transition-colors">Smartphones</a>
          <a href="{{ url('/en/work/gadget-shop/products') }}" class="hover:text-slate-900 transition-colors">Laptops</a>
          <a href="{{ url('/en/work/gadget-shop/products') }}" class="hover:text-slate-900 transition-colors">Tablets</a>
        </div>
      </div>
      <div>
        <div class="text-[11px] uppercase tracking-[0.15em] text-slate-400 font-medium mb-3">Company</div>
        <div class="flex flex-col gap-2 text-sm text-slate-500">
          <a href="{{ url('/en/work/gadget-shop/about') }}" class="hover:text-slate-900 transition-colors">About</a>
          <a href="{{ url('/en/work/gadget-shop/contact') }}" class="hover:text-slate-900 transition-colors">Contact</a>
          <a href="#" class="hover:text-slate-900 transition-colors">Careers</a>
        </div>
      </div>
      <div>
        <div class="text-[11px] uppercase tracking-[0.15em] text-slate-400 font-medium mb-3">Support</div>
        <div class="flex flex-col gap-2 text-sm text-slate-500">
          <a href="#" class="hover:text-slate-900 transition-colors">Help Center</a>
          <a href="#" class="hover:text-slate-900 transition-colors">Shipping Info</a>
          <a href="#" class="hover:text-slate-900 transition-colors">Returns</a>
        </div>
      </div>
    </div>
    <div class="max-w-7xl mx-auto px-6 md:px-10 mt-8 pt-6 border-t border-slate-200/60 flex flex-col sm:flex-row items-center justify-between gap-4">
      <div class="text-slate-300 text-xs">&copy; 2025 PULSE</div>
      <div class="flex items-center gap-4">
        <a href="#" class="text-slate-400 hover:text-slate-600 transition-colors text-xs">Instagram</a>
        <a href="#" class="text-slate-400 hover:text-slate-600 transition-colors text-xs">Twitter</a>
        <a href="#" class="text-slate-400 hover:text-slate-600 transition-colors text-xs">YouTube</a>
      </div>
    </div>
  </footer>

  <script>
    const obs = new IntersectionObserver((entries) => {
      entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); obs.unobserve(e.target); } });
    }, { threshold: 0.12, rootMargin: '0px 0px -30px 0px' });
    document.querySelectorAll('.reveal').forEach(el => obs.observe(el));

    const menuBtn = document.getElementById('menu-btn');
    const menuClose = document.getElementById('menu-close');
    const mobileMenu = document.getElementById('mobile-menu');
    menuBtn.addEventListener('click', () => { mobileMenu.classList.remove('hidden'); mobileMenu.classList.add('flex'); });
    menuClose.addEventListener('click', () => { mobileMenu.classList.add('hidden'); mobileMenu.classList.remove('flex'); });
    mobileMenu.querySelectorAll('.mobile-link').forEach(l => l.addEventListener('click', () => { mobileMenu.classList.add('hidden'); mobileMenu.classList.remove('flex'); }));
  </script>

</body>
</html>
