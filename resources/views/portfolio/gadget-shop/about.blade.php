<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'PULSE | About' }}</title>
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

    .reveal {
      opacity: 0;
      transform: translateY(30px);
      transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .reveal.visible { opacity: 1; transform: translateY(0); }
    .reveal-delay-1 { transition-delay: 0.08s; }
    .reveal-delay-2 { transition-delay: 0.16s; }
    .reveal-delay-3 { transition-delay: 0.24s; }
    .reveal-delay-4 { transition-delay: 0.32s; }

    .stagger-children .reveal:nth-child(1) { transition-delay: 0s; }
    .stagger-children .reveal:nth-child(2) { transition-delay: 0.06s; }
    .stagger-children .reveal:nth-child(3) { transition-delay: 0.12s; }

    .img-lift { overflow: hidden; }
    .img-lift img { transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1); }
    .img-lift:hover img { transform: scale(1.04); }

    @media (prefers-reduced-motion: reduce) {
      .reveal { opacity: 1; transform: none; transition: none; }
    }
  </style>
</head>
<body class="bg-white text-slate-900 font-body">

  <!-- Nav -->
  <header class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-200/60">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-6 md:px-10 h-16 md:h-18">
      <a href="{{ url('/en/work/gadget-shop') }}" class="font-display font-bold text-slate-900 text-lg tracking-tight">PULSE</a>
      <nav class="hidden md:flex items-center gap-8 text-[13px] font-medium text-slate-400">
        <a href="{{ url('/en/work/gadget-shop') }}" class="hover:text-slate-900 transition-colors">Home</a>
        <a href="{{ url('/en/work/gadget-shop/products') }}" class="hover:text-slate-900 transition-colors">Products</a>
        <a href="{{ url('/en/work/gadget-shop/about') }}" class="text-slate-900 transition-colors">About</a>
        <a href="{{ url('/en/work/gadget-shop/contact') }}" class="hover:text-slate-900 transition-colors">Contact</a>
      </nav>
      <div class="flex items-center gap-4">
        <a href="{{ url('/en/work/gadget-shop/products') }}" class="hidden sm:inline-flex items-center gap-2 bg-steel-600 text-white text-[13px] font-semibold px-5 py-2.5 rounded-full hover:bg-steel-700 transition-colors">Shop</a>
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

  <!-- Hero -->
  <section class="relative min-h-[60vh] flex items-end overflow-hidden">
    <img
      src="https://images.unsplash.com/photo-1498049794561-7780e7231661?w=1600&q=80&auto=format&fit=crop"
      alt="Modern tech workspace with devices"
      class="absolute inset-0 w-full h-full object-cover"
      loading="eager"
    >
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-slate-950/20 to-transparent"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-10 pb-16 md:pb-24 pt-48">
      <h1 class="font-display font-bold text-white text-4xl md:text-6xl tracking-tight leading-[1.05] reveal">Our Story</h1>
      <p class="text-white/60 text-lg mt-3 max-w-[45ch] reveal reveal-delay-1">Building the bridge between premium technology and the people who use it.</p>
    </div>
  </section>

  <!-- Story section -->
  <section class="py-24 md:py-36">
    <div class="max-w-7xl mx-auto px-6 md:px-10 grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
      <div class="rounded-2xl overflow-hidden aspect-[4/5] reveal">
        <img src="https://images.unsplash.com/photo-1531297484001-80022131f5a1?w=700&q=80&auto=format&fit=crop" alt="Technology on a desk" class="w-full h-full object-cover" loading="lazy">
      </div>
      <div>
        <p class="text-steel-600 text-[11px] uppercase tracking-[0.2em] font-medium mb-4 reveal">Founded in 2021</p>
        <h2 class="font-display font-bold text-slate-900 text-3xl md:text-5xl tracking-tight leading-[1.1] mb-8 reveal reveal-delay-1">
          Technology should work for you, not the other way around
        </h2>
        <div class="space-y-4 text-slate-500 leading-relaxed max-w-[48ch]">
          <p class="reveal reveal-delay-2">
            PULSE started with a simple frustration: buying tech online felt like a gamble. Counterfeit concerns, unclear warranty policies, and zero post-sale support made every purchase stressful.
          </p>
          <p class="reveal reveal-delay-3">
            We built PULSE to change that. Every device we sell is sourced directly from authorized distributors, tested by our team, and backed by a 2-year warranty. No gray market. No surprises.
          </p>
          <p class="reveal reveal-delay-4">
            Today, we serve customers in 30+ countries, but the process stays the same: verify the product, make it accessible, support the buyer. That is the entire business.
          </p>
        </div>
        <div class="flex gap-10 mt-10 pt-8 border-t border-slate-200/60 reveal reveal-delay-4">
          <div>
            <div class="font-mono font-bold text-slate-900 text-3xl">4</div>
            <div class="text-slate-400 text-xs mt-1">years running</div>
          </div>
          <div>
            <div class="font-mono font-bold text-slate-900 text-3xl">500+</div>
            <div class="text-slate-400 text-xs mt-1">products</div>
          </div>
          <div>
            <div class="font-mono font-bold text-slate-900 text-3xl">30+</div>
            <div class="text-slate-400 text-xs mt-1">countries</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Values -->
  <section class="py-24 md:py-36 bg-mist">
    <div class="max-w-7xl mx-auto px-6 md:px-10">
      <h2 class="font-display font-bold text-slate-900 text-3xl md:text-5xl tracking-tight leading-[1.1] mb-14 md:mb-20 reveal">What we stand for</h2>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 stagger-children">
        <div class="bg-white border border-slate-200 rounded-2xl p-8 reveal">
          <div class="w-10 h-10 rounded-full bg-steel-100 flex items-center justify-center mb-5">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="7.5" stroke="#2563EB" stroke-width="1.5"/><path d="M6 9l2 2 4-4" stroke="#2563EB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
          <h3 class="font-display font-bold text-slate-900 text-lg">Curated Selection</h3>
          <p class="text-slate-500 text-sm mt-3 leading-relaxed">We do not sell everything. We sell the best of everything, hand-picked by our team after testing dozens of alternatives.</p>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl p-8 reveal">
          <div class="w-10 h-10 rounded-full bg-steel-100 flex items-center justify-center mb-5">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M9 1.5L2.25 5.25v4.5c0 4.125 2.963 7.988 6.75 8.75 3.787-.762 6.75-4.625 6.75-8.75v-4.5L9 1.5z" stroke="#2563EB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
          <h3 class="font-display font-bold text-slate-900 text-lg">Authentic Products</h3>
          <p class="text-slate-500 text-sm mt-3 leading-relaxed">Every device comes with proof of authenticity. Direct from authorized channels, never refurbished without disclosure.</p>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl p-8 reveal">
          <div class="w-10 h-10 rounded-full bg-steel-100 flex items-center justify-center mb-5">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M15.75 9a6.75 6.75 0 11-13.5 0 6.75 6.75 0 0113.5 0z" stroke="#2563EB" stroke-width="1.5"/><path d="M9 5.25v3.75l2.25 1.5" stroke="#2563EB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
          <h3 class="font-display font-bold text-slate-900 text-lg">Expert Support</h3>
          <p class="text-slate-500 text-sm mt-3 leading-relaxed">Real people who know tech, available 7 days a week. Pre-sale advice, setup help, and warranty claims handled fast.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="py-24 md:py-36 bg-slate-950 text-white">
    <div class="max-w-3xl mx-auto px-6 md:px-10 text-center">
      <h2 class="font-display font-bold text-white text-3xl md:text-5xl tracking-tight leading-[1.1] mb-5 reveal">Join the PULSE community</h2>
      <p class="text-white/50 text-lg max-w-[40ch] mx-auto mb-10 reveal reveal-delay-1">Get early access to new products and exclusive deals.</p>
      <div class="flex flex-wrap justify-center gap-4 reveal reveal-delay-2">
        <a href="{{ url('/en/work/gadget-shop/products') }}" class="inline-flex items-center gap-2 bg-white text-slate-950 font-semibold px-8 py-3.5 rounded-full text-sm hover:bg-white/90 transition-colors">
          Shop Now
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
