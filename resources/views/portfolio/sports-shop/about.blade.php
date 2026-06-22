<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'STRIDE | About' }}</title>
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

    .stagger-children .reveal:nth-child(1) { transition-delay: 0s; }
    .stagger-children .reveal:nth-child(2) { transition-delay: 0.08s; }
    .stagger-children .reveal:nth-child(3) { transition-delay: 0.16s; }
    .stagger-children .reveal:nth-child(4) { transition-delay: 0.24s; }

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

    .btn-ghost {
      transition: all 0.4s cubic-bezier(0.32, 0.72, 0, 1);
    }
    .btn-ghost:hover {
      background: rgba(255,255,255,0.08);
      border-color: rgba(255,255,255,0.3);
    }

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

    .nav-pill {
      backdrop-filter: blur(20px) saturate(180%);
      -webkit-backdrop-filter: blur(20px) saturate(180%);
      background: rgba(10, 10, 10, 0.7);
      border: 1px solid rgba(255,255,255,0.08);
    }

    .value-card {
      position: relative;
      border-radius: 1.25rem;
      background: rgba(255,255,255,0.03);
      border: 1px solid rgba(255,255,255,0.06);
      padding: 2px;
    }
    .value-card-inner {
      border-radius: calc(1.25rem - 2px);
      background: #111111;
      padding: 2rem;
      height: 100%;
      box-shadow: inset 0 1px 0 rgba(255,255,255,0.06);
    }

    @media (prefers-reduced-motion: reduce) {
      .reveal {
        opacity: 1;
        transform: none;
        transition: none;
      }
    }
  </style>
</head>
<body class="bg-surface-950 text-gray-300 font-body grain">

  <!-- Nav -->
  <nav class="fixed top-0 left-0 right-0 z-40 flex justify-center px-4 pt-5 md:pt-6">
    <div class="nav-pill rounded-full px-6 py-3 flex items-center gap-8">
      <a href="{{ url('/en/work/sports-shop') }}" class="font-display font-bold text-white text-sm tracking-wider uppercase">STRIDE</a>
      <div class="hidden md:flex items-center gap-6 text-[13px] text-gray-400">
        <a href="{{ url('/en/work/sports-shop') }}" class="hover:text-white transition-colors duration-300">Home</a>
        <a href="{{ url('/en/work/sports-shop/products') }}" class="hover:text-white transition-colors duration-300">Products</a>
        <a href="{{ url('/en/work/sports-shop/about') }}" class="text-white transition-colors duration-300">About</a>
        <a href="{{ url('/en/work/sports-shop/contact') }}" class="hover:text-white transition-colors duration-300">Contact</a>
      </div>
      <a href="{{ url('/en/work/sports-shop/products') }}" class="btn-flame bg-flame-500 text-white text-[13px] font-semibold px-5 py-2 rounded-full inline-block">
        Shop Now
      </a>
      <button id="menu-btn" class="md:hidden text-white ml-2" aria-label="Toggle menu">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
          <line x1="2" y1="5" x2="18" y2="5" stroke="currentColor" stroke-width="1.5"/>
          <line x1="2" y1="15" x2="18" y2="15" stroke="currentColor" stroke-width="1.5"/>
        </svg>
      </button>
    </div>
  </nav>

  <!-- Mobile menu -->
  <div id="mobile-menu" class="fixed inset-0 z-50 bg-surface-950/95 backdrop-blur-3xl hidden flex-col items-center justify-center gap-8 text-2xl font-display text-white">
    <button id="menu-close" class="absolute top-6 right-6 text-gray-400 hover:text-white transition-colors" aria-label="Close menu">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
        <line x1="4" y1="4" x2="20" y2="20" stroke="currentColor" stroke-width="1.5"/>
        <line x1="20" y1="4" x2="4" y2="20" stroke="currentColor" stroke-width="1.5"/>
      </svg>
    </button>
    <a href="{{ url('/en/work/sports-shop') }}" class="mobile-link hover:text-flame-400 transition-colors">Home</a>
    <a href="{{ url('/en/work/sports-shop/products') }}" class="mobile-link hover:text-flame-400 transition-colors">Products</a>
    <a href="{{ url('/en/work/sports-shop/about') }}" class="mobile-link hover:text-flame-400 transition-colors">About</a>
    <a href="{{ url('/en/work/sports-shop/contact') }}" class="mobile-link hover:text-flame-400 transition-colors">Contact</a>
  </div>

  <!-- Hero -->
  <section class="min-h-[70dvh] flex items-end relative overflow-hidden">
    <div class="absolute inset-0">
      <img
        src="https://images.unsplash.com/photo-1517836357463-d25dfeac3438?w=1400&q=80&auto=format&fit=crop"
        alt="Athletes training together at dawn"
        class="w-full h-full object-cover"
        loading="eager"
      >
      <div class="absolute inset-0 bg-gradient-to-t from-surface-950 via-surface-950/60 to-transparent"></div>
    </div>
    <div class="max-w-[1400px] mx-auto w-full px-6 md:px-12 pb-16 md:pb-24 relative z-10">
      <span class="inline-block text-[11px] uppercase tracking-[0.2em] text-flame-400 font-medium mb-4 reveal">About STRIDE</span>
      <h1 class="font-display font-bold text-white text-4xl md:text-6xl tracking-tight leading-[1.05] max-w-[20ch] reveal reveal-delay-1">
        We make gear<br>for people who<br>don't stop
      </h1>
    </div>
  </section>

  <!-- Story -->
  <section class="py-24 md:py-36">
    <div class="max-w-[1400px] mx-auto px-6 md:px-12 grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
      <!-- Image -->
      <div class="lg:col-span-5 reveal">
        <div class="rounded-[1.5rem] overflow-hidden aspect-[3/4] relative">
          <img
            src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=600&q=80&auto=format&fit=crop"
            alt="Founders running together at sunrise"
            class="w-full h-full object-cover"
            loading="lazy"
          >
          <div class="absolute inset-0 rounded-[1.5rem] ring-1 ring-inset ring-white/10 pointer-events-none"></div>
        </div>
      </div>

      <!-- Text -->
      <div class="lg:col-span-7">
        <h2 class="font-display font-bold text-white text-3xl md:text-5xl tracking-tight leading-[1.1] mb-8 reveal">
          Two runners, one frustration
        </h2>
        <div class="space-y-5 text-gray-400 leading-relaxed max-w-[55ch]">
          <p class="reveal reveal-delay-1">
            STRIDE started in 2020 when Kai Nakamura and Priya Sharma got tired of the same broken promise: gear that looks great in ads but falls apart by mile three.
          </p>
          <p class="reveal reveal-delay-2">
            They pooled their savings, rented a small workshop in Portland, and started making the shoes they wanted to run in. No investors. No focus groups. Just real athletes testing real prototypes on real roads.
          </p>
          <p class="reveal reveal-delay-3">
            Five years later, the workshop is bigger, but the process hasn't changed. Every new design goes through 200+ miles of field testing before it ships. If it doesn't survive the worst conditions we can throw at it, it doesn't carry the STRIDE name.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Values -->
  <section class="py-24 md:py-36 border-t border-white/5">
    <div class="max-w-[1400px] mx-auto px-6 md:px-12">
      <div class="max-w-2xl mb-16 md:mb-20">
        <h2 class="font-display font-bold text-white text-3xl md:text-5xl tracking-tight leading-[1.1] reveal">
          What we believe
        </h2>
        <p class="text-gray-500 mt-4 text-base md:text-lg max-w-[50ch] reveal reveal-delay-1">
          Three principles that guide every decision.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 stagger-children">
        <!-- Value 1 -->
        <div class="value-card reveal">
          <div class="value-card-inner">
            <div class="w-10 h-10 rounded-full bg-flame-500/10 flex items-center justify-center mb-5">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#FF4500" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
            </div>
            <h3 class="font-display font-semibold text-white text-lg mb-2">Performance first</h3>
            <p class="text-gray-500 text-sm leading-relaxed">If it doesn't make you faster, stronger, or more comfortable, it doesn't ship. Every design choice serves a function.</p>
          </div>
        </div>

        <!-- Value 2 -->
        <div class="value-card reveal">
          <div class="value-card-inner">
            <div class="w-10 h-10 rounded-full bg-flame-500/10 flex items-center justify-center mb-5">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#FF4500" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            </div>
            <h3 class="font-display font-semibold text-white text-lg mb-2">Built to last</h3>
            <p class="text-gray-500 text-sm leading-relaxed">We test until things break, then we fix the break. 200+ miles of field testing before any product reaches you.</p>
          </div>
        </div>

        <!-- Value 3 -->
        <div class="value-card reveal">
          <div class="value-card-inner">
            <div class="w-10 h-10 rounded-full bg-flame-500/10 flex items-center justify-center mb-5">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#FF4500" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
            </div>
            <h3 class="font-display font-semibold text-white text-lg mb-2">Honest pricing</h3>
            <p class="text-gray-500 text-sm leading-relaxed">No artificial scarcity. No markup for marketing. Price reflects materials, construction, and fair margin. That's it.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Team -->
  <section class="py-24 md:py-36 border-t border-white/5">
    <div class="max-w-[1400px] mx-auto px-6 md:px-12">
      <div class="max-w-2xl mb-16 md:mb-20">
        <h2 class="font-display font-bold text-white text-3xl md:text-5xl tracking-tight leading-[1.1] reveal">
          The team
        </h2>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 stagger-children">
        <!-- Kai -->
        <div class="reveal">
          <div class="rounded-[1.5rem] overflow-hidden aspect-[4/3] mb-5">
            <img src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?w=600&q=80&auto=format&fit=crop" alt="Kai Nakamura, co-founder" class="w-full h-full object-cover" loading="lazy">
          </div>
          <h3 class="font-display font-semibold text-white text-lg">Kai Nakamura</h3>
          <p class="text-flame-400 text-sm mt-1">Co-founder & Head of Design</p>
          <p class="text-gray-500 text-sm mt-3 max-w-[45ch]">Former competitive runner. 10+ years in footwear design. Obsessed with the intersection of biomechanics and materials science.</p>
        </div>

        <!-- Priya -->
        <div class="reveal">
          <div class="rounded-[1.5rem] overflow-hidden aspect-[4/3] mb-5">
            <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=600&q=80&auto=format&fit=crop" alt="Priya Sharma, co-founder" class="w-full h-full object-cover" loading="lazy">
          </div>
          <h3 class="font-display font-semibold text-white text-lg">Priya Sharma</h3>
          <p class="text-flame-400 text-sm mt-1">Co-founder & Head of Operations</p>
          <p class="text-gray-500 text-sm mt-3 max-w-[45ch]">Supply chain nerd. Built the sourcing and manufacturing pipeline from scratch. Believes transparency isn't a marketing tactic, it's a requirement.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Stats -->
  <section class="py-24 md:py-36 border-t border-white/5">
    <div class="max-w-[1400px] mx-auto px-6 md:px-12">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-8 stagger-children">
        <div class="text-center reveal">
          <div class="font-display font-bold text-white text-4xl md:text-5xl">5</div>
          <div class="text-gray-600 text-xs mt-2 uppercase tracking-wider">Years running</div>
        </div>
        <div class="text-center reveal">
          <div class="font-display font-bold text-white text-4xl md:text-5xl">48</div>
          <div class="text-gray-600 text-xs mt-2 uppercase tracking-wider">Products shipped</div>
        </div>
        <div class="text-center reveal">
          <div class="font-display font-bold text-white text-4xl md:text-5xl">23</div>
          <div class="text-gray-600 text-xs mt-2 uppercase tracking-wider">Countries served</div>
        </div>
        <div class="text-center reveal">
          <div class="font-display font-bold text-white text-4xl md:text-5xl">12K+</div>
          <div class="text-gray-600 text-xs mt-2 uppercase tracking-wider">Athletes</div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="border-t border-white/5 py-10">
    <div class="max-w-[1400px] mx-auto px-6 md:px-12 flex flex-col md:flex-row items-center justify-between gap-4">
      <div class="font-display font-bold text-white text-sm tracking-wider uppercase">STRIDE</div>
      <div class="flex items-center gap-6 text-[13px] text-gray-500">
        <a href="{{ url('/en/work/sports-shop') }}" class="hover:text-white transition-colors">Home</a>
        <a href="{{ url('/en/work/sports-shop/products') }}" class="hover:text-white transition-colors">Products</a>
        <a href="{{ url('/en/work/sports-shop/about') }}" class="hover:text-white transition-colors">About</a>
        <a href="{{ url('/en/work/sports-shop/contact') }}" class="hover:text-white transition-colors">Contact</a>
      </div>
      <div class="text-gray-600 text-xs">&copy; 2025 STRIDE. All rights reserved.</div>
    </div>
  </footer>

  <script>
    const revealObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          revealObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });
    document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

    const menuBtn = document.getElementById('menu-btn');
    const menuClose = document.getElementById('menu-close');
    const mobileMenu = document.getElementById('mobile-menu');
    menuBtn.addEventListener('click', () => { mobileMenu.classList.remove('hidden'); mobileMenu.classList.add('flex'); });
    menuClose.addEventListener('click', () => { mobileMenu.classList.add('hidden'); mobileMenu.classList.remove('flex'); });
    mobileMenu.querySelectorAll('.mobile-link').forEach(link => {
      link.addEventListener('click', () => { mobileMenu.classList.add('hidden'); mobileMenu.classList.remove('flex'); });
    });
  </script>

</body>
</html>
