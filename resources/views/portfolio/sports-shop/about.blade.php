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
            bone: '#FAFAF8',
            mist: '#F0F0EC',
            ink: '#1A1A1A',
            sage: {
              50: '#E8F0EB',
              100: '#D1E1D6',
              500: '#2D6A4F',
              700: '#1B4332',
              800: '#143328',
              900: '#0D2219',
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
      transform: translateY(30px);
      transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .reveal.visible { opacity: 1; transform: translateY(0); }
    .reveal-delay-1 { transition-delay: 0.08s; }
    .reveal-delay-2 { transition-delay: 0.16s; }
    .reveal-delay-3 { transition-delay: 0.24s; }
    .reveal-delay-4 { transition-delay: 0.32s; }

    .stagger-children .reveal:nth-child(1) { transition-delay: 0s; }
    .stagger-children .reveal:nth-child(2) { transition-delay: 0.08s; }
    .stagger-children .reveal:nth-child(3) { transition-delay: 0.16s; }

    @media (prefers-reduced-motion: reduce) {
      .reveal { opacity: 1; transform: none; transition: none; }
    }
  </style>
</head>
<body class="bg-bone text-ink font-body">

  <!-- Nav -->
  <header class="fixed top-0 left-0 right-0 z-50 bg-bone/80 backdrop-blur-md border-b border-ink/5">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-6 md:px-10 h-16 md:h-18">
      <a href="{{ url('/en/work/sports-shop') }}" class="font-display font-bold text-ink text-lg tracking-tight">STRIDE</a>
      <nav class="hidden md:flex items-center gap-8 text-[13px] font-medium text-ink/50">
        <a href="{{ url('/en/work/sports-shop') }}" class="hover:text-ink transition-colors">Home</a>
        <a href="{{ url('/en/work/sports-shop/products') }}" class="hover:text-ink transition-colors">Products</a>
        <a href="{{ url('/en/work/sports-shop/about') }}" class="text-ink transition-colors">About</a>
        <a href="{{ url('/en/work/sports-shop/contact') }}" class="hover:text-ink transition-colors">Contact</a>
      </nav>
      <div class="flex items-center gap-4">
        <a href="{{ url('/en/work/sports-shop/products') }}" class="hidden sm:inline-flex items-center gap-2 bg-sage-700 text-white text-[13px] font-semibold px-5 py-2.5 rounded-full hover:bg-sage-800 transition-colors">Shop</a>
        <button id="menu-btn" class="md:hidden text-ink" aria-label="Open menu">
          <svg width="22" height="22" viewBox="0 0 22 22" fill="none"><line x1="3" y1="6" x2="19" y2="6" stroke="currentColor" stroke-width="1.5"/><line x1="3" y1="16" x2="19" y2="16" stroke="currentColor" stroke-width="1.5"/></svg>
        </button>
      </div>
    </div>
  </header>

  <div id="mobile-menu" class="fixed inset-0 z-[60] bg-bone hidden flex-col pt-20 px-8">
    <button id="menu-close" class="absolute top-5 right-6 text-ink" aria-label="Close menu">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><line x1="5" y1="5" x2="19" y2="19" stroke="currentColor" stroke-width="1.5"/><line x1="19" y1="5" x2="5" y2="19" stroke="currentColor" stroke-width="1.5"/></svg>
    </button>
    <nav class="flex flex-col gap-6 text-3xl font-display font-semibold text-ink">
      <a href="{{ url('/en/work/sports-shop') }}" class="mobile-link">Home</a>
      <a href="{{ url('/en/work/sports-shop/products') }}" class="mobile-link">Products</a>
      <a href="{{ url('/en/work/sports-shop/about') }}" class="mobile-link">About</a>
      <a href="{{ url('/en/work/sports-shop/contact') }}" class="mobile-link">Contact</a>
    </nav>
  </div>

  <!-- Hero: full-bleed image with bottom-left text -->
  <section class="relative min-h-[75dvh] flex items-end overflow-hidden">
    <img src="https://images.unsplash.com/photo-1517836357463-d25dfeac3438?w=1400&q=80&auto=format&fit=crop" alt="Athletes training at dawn" class="absolute inset-0 w-full h-full object-cover" loading="eager">
    <div class="absolute inset-0 bg-gradient-to-t from-ink/60 via-ink/20 to-transparent"></div>
    <div class="relative z-10 max-w-7xl mx-auto w-full px-6 md:px-10 pb-14 md:pb-20">
      <p class="text-white/50 text-[11px] uppercase tracking-[0.25em] font-medium mb-4 reveal">About STRIDE</p>
      <h1 class="font-display font-bold text-white text-4xl md:text-6xl tracking-tight leading-[1.05] max-w-[18ch] reveal reveal-delay-1">
        We make gear for people who don't stop
      </h1>
    </div>
  </section>

  <!-- Story -->
  <section class="py-24 md:py-36">
    <div class="max-w-7xl mx-auto px-6 md:px-10 grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
      <div class="rounded-2xl overflow-hidden aspect-[4/5] reveal">
        <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=700&q=80&auto=format&fit=crop" alt="Founders running at sunrise" class="w-full h-full object-cover" loading="lazy">
      </div>
      <div>
        <h2 class="font-display font-bold text-ink text-3xl md:text-5xl tracking-tight leading-[1.1] mb-8 reveal">Two runners, one frustration</h2>
        <div class="space-y-4 text-ink/55 leading-relaxed max-w-[48ch]">
          <p class="reveal reveal-delay-1">STRIDE started in 2020 when Kai Nakamura and Priya Sharma got tired of the same broken promise: gear that looks great in ads but falls apart by mile three.</p>
          <p class="reveal reveal-delay-2">They pooled their savings, rented a small workshop in Portland, and started making the shoes they wanted to run in. No investors. No focus groups. Just real athletes testing real prototypes on real roads.</p>
          <p class="reveal reveal-delay-3">Five years later, the workshop is bigger, but the process hasn't changed. Every new design goes through 200+ miles of field testing before it ships. If it doesn't survive the worst conditions we can throw at it, it doesn't carry the STRIDE name.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Values -->
  <section class="py-24 md:py-36 bg-mist">
    <div class="max-w-7xl mx-auto px-6 md:px-10">
      <h2 class="font-display font-bold text-ink text-3xl md:text-5xl tracking-tight leading-[1.1] mb-14 md:mb-20 reveal">What we believe</h2>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 stagger-children">
        <div class="bg-white rounded-2xl p-8 reveal">
          <div class="w-10 h-10 rounded-full bg-sage-50 flex items-center justify-center mb-5">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2D6A4F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
          </div>
          <h3 class="font-display font-semibold text-ink text-lg mb-2">Performance first</h3>
          <p class="text-ink/50 text-sm leading-relaxed">If it doesn't make you faster, stronger, or more comfortable, it doesn't ship. Every design choice serves a function.</p>
        </div>

        <div class="bg-white rounded-2xl p-8 reveal">
          <div class="w-10 h-10 rounded-full bg-sage-50 flex items-center justify-center mb-5">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2D6A4F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          </div>
          <h3 class="font-display font-semibold text-ink text-lg mb-2">Built to last</h3>
          <p class="text-ink/50 text-sm leading-relaxed">We test until things break, then we fix the break. 200+ miles of field testing before any product reaches you.</p>
        </div>

        <div class="bg-white rounded-2xl p-8 reveal">
          <div class="w-10 h-10 rounded-full bg-sage-50 flex items-center justify-center mb-5">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2D6A4F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
          </div>
          <h3 class="font-display font-semibold text-ink text-lg mb-2">Honest pricing</h3>
          <p class="text-ink/50 text-sm leading-relaxed">No artificial scarcity. No markup for marketing. Price reflects materials, construction, and fair margin. That's it.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Team -->
  <section class="py-24 md:py-36">
    <div class="max-w-7xl mx-auto px-6 md:px-10">
      <h2 class="font-display font-bold text-ink text-3xl md:text-5xl tracking-tight leading-[1.1] mb-14 md:mb-20 reveal">The team</h2>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 stagger-children">
        <div class="reveal">
          <div class="rounded-2xl overflow-hidden aspect-[4/3] mb-5">
            <img src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?w=600&q=80&auto=format&fit=crop" alt="Kai Nakamura" class="w-full h-full object-cover" loading="lazy">
          </div>
          <h3 class="font-display font-semibold text-ink text-lg">Kai Nakamura</h3>
          <p class="text-sage-500 text-sm mt-1">Co-founder & Head of Design</p>
          <p class="text-ink/45 text-sm mt-3 max-w-[42ch]">Former competitive runner. 10+ years in footwear design. Obsessed with the intersection of biomechanics and materials science.</p>
        </div>

        <div class="reveal">
          <div class="rounded-2xl overflow-hidden aspect-[4/3] mb-5">
            <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=600&q=80&auto=format&fit=crop" alt="Priya Sharma" class="w-full h-full object-cover" loading="lazy">
          </div>
          <h3 class="font-display font-semibold text-ink text-lg">Priya Sharma</h3>
          <p class="text-sage-500 text-sm mt-1">Co-founder & Head of Operations</p>
          <p class="text-ink/45 text-sm mt-3 max-w-[42ch]">Supply chain nerd. Built the sourcing and manufacturing pipeline from scratch. Believes transparency is a requirement, not a tactic.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Stats -->
  <section class="py-20 md:py-28 bg-sage-700">
    <div class="max-w-7xl mx-auto px-6 md:px-10">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-8 stagger-children">
        <div class="text-center reveal">
          <div class="font-display font-bold text-white text-4xl md:text-5xl">5</div>
          <div class="text-white/40 text-xs mt-2 uppercase tracking-wider">Years running</div>
        </div>
        <div class="text-center reveal">
          <div class="font-display font-bold text-white text-4xl md:text-5xl">48</div>
          <div class="text-white/40 text-xs mt-2 uppercase tracking-wider">Products</div>
        </div>
        <div class="text-center reveal">
          <div class="font-display font-bold text-white text-4xl md:text-5xl">23</div>
          <div class="text-white/40 text-xs mt-2 uppercase tracking-wider">Countries</div>
        </div>
        <div class="text-center reveal">
          <div class="font-display font-bold text-white text-4xl md:text-5xl">12K+</div>
          <div class="text-white/40 text-xs mt-2 uppercase tracking-wider">Athletes</div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="border-t border-ink/8 py-10">
    <div class="max-w-7xl mx-auto px-6 md:px-10 flex flex-col md:flex-row items-center justify-between gap-4">
      <div class="font-display font-bold text-ink text-sm tracking-tight">STRIDE</div>
      <div class="flex items-center gap-6 text-[13px] text-ink/40">
        <a href="{{ url('/en/work/sports-shop') }}" class="hover:text-ink transition-colors">Home</a>
        <a href="{{ url('/en/work/sports-shop/products') }}" class="hover:text-ink transition-colors">Products</a>
        <a href="{{ url('/en/work/sports-shop/about') }}" class="hover:text-ink transition-colors">About</a>
        <a href="{{ url('/en/work/sports-shop/contact') }}" class="hover:text-ink transition-colors">Contact</a>
      </div>
      <div class="text-ink/30 text-xs">&copy; 2025 STRIDE</div>
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
