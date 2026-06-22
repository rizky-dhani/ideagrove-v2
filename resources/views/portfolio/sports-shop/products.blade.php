<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'STRIDE | All Products' }}</title>
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

    .stagger-children .reveal:nth-child(1) { transition-delay: 0s; }
    .stagger-children .reveal:nth-child(2) { transition-delay: 0.05s; }
    .stagger-children .reveal:nth-child(3) { transition-delay: 0.1s; }
    .stagger-children .reveal:nth-child(4) { transition-delay: 0.15s; }
    .stagger-children .reveal:nth-child(5) { transition-delay: 0.2s; }
    .stagger-children .reveal:nth-child(6) { transition-delay: 0.25s; }
    .stagger-children .reveal:nth-child(7) { transition-delay: 0.3s; }
    .stagger-children .reveal:nth-child(8) { transition-delay: 0.35s; }

    .img-lift { overflow: hidden; }
    .img-lift img { transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1); }
    .img-lift:hover img { transform: scale(1.04); }

    .filter-btn {
      transition: all 0.25s ease;
    }
    .filter-btn:hover {
      background: #1A1A1A;
      color: white;
    }
    .filter-btn.active {
      background: #1B4332;
      color: white;
      border-color: #1B4332;
    }

    .product-card {
      transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .product-card:hover {
      transform: translateY(-4px);
    }

    @media (prefers-reduced-motion: reduce) {
      .reveal { opacity: 1; transform: none; transition: none; }
      .product-card:hover { transform: none; }
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
        <a href="{{ url('/en/work/sports-shop/products') }}" class="text-ink transition-colors">Products</a>
        <a href="{{ url('/en/work/sports-shop/about') }}" class="hover:text-ink transition-colors">About</a>
        <a href="{{ url('/en/work/sports-shop/contact') }}" class="hover:text-ink transition-colors">Contact</a>
      </nav>
      <div class="flex items-center gap-4">
        <span class="text-[13px] text-ink/40 font-medium">Cart (0)</span>
        <button id="menu-btn" class="md:hidden text-ink" aria-label="Open menu">
          <svg width="22" height="22" viewBox="0 0 22 22" fill="none"><line x1="3" y1="6" x2="19" y2="6" stroke="currentColor" stroke-width="1.5"/><line x1="3" y1="16" x2="19" y2="16" stroke="currentColor" stroke-width="1.5"/></svg>
        </button>
      </div>
    </div>
  </header>

  <!-- Mobile menu -->
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

  <!-- Header -->
  <section class="pt-28 pb-10 md:pt-36 md:pb-14">
    <div class="max-w-7xl mx-auto px-6 md:px-10">
      <h1 class="font-display font-bold text-ink text-4xl md:text-6xl tracking-tight leading-[1.05] reveal">All Products</h1>
      <p class="text-ink/45 text-lg mt-3 max-w-[45ch] reveal reveal-delay-1">Every piece, tested on real runs, refined through real movement.</p>
    </div>
  </section>

  <!-- Filters -->
  <section class="pb-10 md:pb-14">
    <div class="max-w-7xl mx-auto px-6 md:px-10">
      <div class="flex flex-wrap gap-2.5 reveal" x-data="{ active: 'all' }">
        <button @click="active = 'all'" :class="active === 'all' ? 'active' : ''" class="filter-btn px-4 py-2 rounded-full text-[13px] font-medium border border-ink/10 text-ink/50">All</button>
        <button @click="active = 'running'" :class="active === 'running' ? 'active' : ''" class="filter-btn px-4 py-2 rounded-full text-[13px] font-medium border border-ink/10 text-ink/50">Running</button>
        <button @click="active = 'training'" :class="active === 'training' ? 'active' : ''" class="filter-btn px-4 py-2 rounded-full text-[13px] font-medium border border-ink/10 text-ink/50">Training</button>
        <button @click="active = 'lifestyle'" :class="active === 'lifestyle' ? 'active' : ''" class="filter-btn px-4 py-2 rounded-full text-[13px] font-medium border border-ink/10 text-ink/50">Lifestyle</button>
        <button @click="active = 'recovery'" :class="active === 'recovery' ? 'active' : ''" class="filter-btn px-4 py-2 rounded-full text-[13px] font-medium border border-ink/10 text-ink/50">Recovery</button>
      </div>
    </div>
  </section>

  <!-- Products -->
  <section class="pb-24 md:pb-36">
    <div class="max-w-7xl mx-auto px-6 md:px-10">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 stagger-children" x-data="{ active: 'all' }">

        <div class="product-card reveal" :class="active !== 'all' && active !== 'running' ? 'hidden' : ''">
          <div class="rounded-2xl overflow-hidden bg-mist">
            <div class="aspect-square img-lift">
              <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=500&q=80&auto=format&fit=crop" alt="Aero Runner" class="w-full h-full object-cover" loading="lazy">
            </div>
          </div>
          <div class="mt-4">
            <div class="text-[11px] uppercase tracking-[0.15em] text-ink/35 font-medium">Running</div>
            <h3 class="font-display font-semibold text-ink text-sm mt-1">Aero Runner</h3>
            <p class="text-ink/40 text-xs mt-1">Carbon plate racer</p>
            <div class="flex items-center gap-3 mt-2">
              <span class="font-display font-bold text-ink">$145</span>
              <span class="text-sage-500 text-[11px] font-medium bg-sage-50 px-2 py-0.5 rounded-full">New</span>
            </div>
          </div>
        </div>

        <div class="product-card reveal" :class="active !== 'all' && active !== 'training' ? 'hidden' : ''">
          <div class="rounded-2xl overflow-hidden bg-mist">
            <div class="aspect-square img-lift">
              <img src="https://images.unsplash.com/photo-1556906781-9a412961c28c?w=500&q=80&auto=format&fit=crop" alt="Training Pro" class="w-full h-full object-cover" loading="lazy">
            </div>
          </div>
          <div class="mt-4">
            <div class="text-[11px] uppercase tracking-[0.15em] text-ink/35 font-medium">Training</div>
            <h3 class="font-display font-semibold text-ink text-sm mt-1">Training Pro</h3>
            <p class="text-ink/40 text-xs mt-1">Stable base for lifts</p>
            <div class="mt-2">
              <span class="font-display font-bold text-ink">$120</span>
            </div>
          </div>
        </div>

        <div class="product-card reveal" :class="active !== 'all' && active !== 'recovery' ? 'hidden' : ''">
          <div class="rounded-2xl overflow-hidden bg-mist">
            <div class="aspect-square img-lift">
              <img src="https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=500&q=80&auto=format&fit=crop" alt="Recovery Slide" class="w-full h-full object-cover" loading="lazy">
            </div>
          </div>
          <div class="mt-4">
            <div class="text-[11px] uppercase tracking-[0.15em] text-ink/35 font-medium">Recovery</div>
            <h3 class="font-display font-semibold text-ink text-sm mt-1">Recovery Slide</h3>
            <p class="text-ink/40 text-xs mt-1">Post-run cushion</p>
            <div class="mt-2">
              <span class="font-display font-bold text-ink">$65</span>
            </div>
          </div>
        </div>

        <div class="product-card reveal" :class="active !== 'all' && active !== 'running' ? 'hidden' : ''">
          <div class="rounded-2xl overflow-hidden bg-mist">
            <div class="aspect-square img-lift">
              <img src="https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?w=500&q=80&auto=format&fit=crop" alt="Endurance X" class="w-full h-full object-cover" loading="lazy">
            </div>
          </div>
          <div class="mt-4">
            <div class="text-[11px] uppercase tracking-[0.15em] text-ink/35 font-medium">Running</div>
            <h3 class="font-display font-semibold text-ink text-sm mt-1">Endurance X</h3>
            <p class="text-ink/40 text-xs mt-1">Max cushion, long distance</p>
            <div class="flex items-center gap-3 mt-2">
              <span class="font-display font-bold text-ink">$165</span>
              <span class="text-sage-500 text-[11px] font-medium bg-sage-50 px-2 py-0.5 rounded-full">Limited</span>
            </div>
          </div>
        </div>

        <div class="product-card reveal" :class="active !== 'all' && active !== 'lifestyle' ? 'hidden' : ''">
          <div class="rounded-2xl overflow-hidden bg-mist">
            <div class="aspect-square img-lift">
              <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=500&q=80&auto=format&fit=crop" alt="Everyday Tee" class="w-full h-full object-cover" loading="lazy">
            </div>
          </div>
          <div class="mt-4">
            <div class="text-[11px] uppercase tracking-[0.15em] text-ink/35 font-medium">Lifestyle</div>
            <h3 class="font-display font-semibold text-ink text-sm mt-1">Everyday Tee</h3>
            <p class="text-ink/40 text-xs mt-1">Merino blend</p>
            <div class="mt-2">
              <span class="font-display font-bold text-ink">$48</span>
            </div>
          </div>
        </div>

        <div class="product-card reveal" :class="active !== 'all' && active !== 'training' ? 'hidden' : ''">
          <div class="rounded-2xl overflow-hidden bg-mist">
            <div class="aspect-square img-lift">
              <img src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=500&q=80&auto=format&fit=crop" alt="Lift Short" class="w-full h-full object-cover" loading="lazy">
            </div>
          </div>
          <div class="mt-4">
            <div class="text-[11px] uppercase tracking-[0.15em] text-ink/35 font-medium">Training</div>
            <h3 class="font-display font-semibold text-ink text-sm mt-1">Lift Short</h3>
            <p class="text-ink/40 text-xs mt-1">4-way stretch, squat-proof</p>
            <div class="mt-2">
              <span class="font-display font-bold text-ink">$55</span>
            </div>
          </div>
        </div>

        <div class="product-card reveal" :class="active !== 'all' && active !== 'running' ? 'hidden' : ''">
          <div class="rounded-2xl overflow-hidden bg-mist">
            <div class="aspect-square img-lift">
              <img src="https://images.unsplash.com/photo-1586350977771-b3b0abd50c87?w=500&q=80&auto=format&fit=crop" alt="Stride Sock 3-pack" class="w-full h-full object-cover" loading="lazy">
            </div>
          </div>
          <div class="mt-4">
            <div class="text-[11px] uppercase tracking-[0.15em] text-ink/35 font-medium">Running</div>
            <h3 class="font-display font-semibold text-ink text-sm mt-1">Stride Sock</h3>
            <p class="text-ink/40 text-xs mt-1">Cushioned tabi, 3-pack</p>
            <div class="mt-2">
              <span class="font-display font-bold text-ink">$18</span>
            </div>
          </div>
        </div>

        <div class="product-card reveal" :class="active !== 'all' && active !== 'lifestyle' ? 'hidden' : ''">
          <div class="rounded-2xl overflow-hidden bg-mist">
            <div class="aspect-square img-lift">
              <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?w=500&q=80&auto=format&fit=crop" alt="Wind Shell" class="w-full h-full object-cover" loading="lazy">
            </div>
          </div>
          <div class="mt-4">
            <div class="text-[11px] uppercase tracking-[0.15em] text-ink/35 font-medium">Lifestyle</div>
            <h3 class="font-display font-semibold text-ink text-sm mt-1">Wind Shell</h3>
            <p class="text-ink/40 text-xs mt-1">Packable, 85g</p>
            <div class="mt-2">
              <span class="font-display font-bold text-ink">$95</span>
            </div>
          </div>
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
