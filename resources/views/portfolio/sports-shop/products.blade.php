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
    .stagger-children .reveal:nth-child(2) { transition-delay: 0.06s; }
    .stagger-children .reveal:nth-child(3) { transition-delay: 0.12s; }
    .stagger-children .reveal:nth-child(4) { transition-delay: 0.18s; }
    .stagger-children .reveal:nth-child(5) { transition-delay: 0.24s; }
    .stagger-children .reveal:nth-child(6) { transition-delay: 0.3s; }
    .stagger-children .reveal:nth-child(7) { transition-delay: 0.36s; }
    .stagger-children .reveal:nth-child(8) { transition-delay: 0.42s; }

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

    .img-zoom {
      overflow: hidden;
    }
    .img-zoom img {
      transition: transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .img-zoom:hover img {
      transform: scale(1.05);
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

    .product-card {
      position: relative;
      border-radius: 1.25rem;
      background: rgba(255,255,255,0.03);
      border: 1px solid rgba(255,255,255,0.06);
      padding: 2px;
      transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .product-card:hover {
      transform: translateY(-4px);
    }
    .product-card-inner {
      border-radius: calc(1.25rem - 2px);
      background: #111111;
      height: 100%;
      box-shadow: inset 0 1px 0 rgba(255,255,255,0.06);
      overflow: hidden;
    }

    .nav-pill {
      backdrop-filter: blur(20px) saturate(180%);
      -webkit-backdrop-filter: blur(20px) saturate(180%);
      background: rgba(10, 10, 10, 0.7);
      border: 1px solid rgba(255,255,255,0.08);
    }

    /* Filter pills */
    .filter-pill {
      transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .filter-pill:hover {
      background: rgba(255,255,255,0.08);
    }
    .filter-pill.active {
      background: #FF4500;
      color: white;
    }

    @media (prefers-reduced-motion: reduce) {
      .reveal {
        opacity: 1;
        transform: none;
        transition: none;
      }
      .product-card:hover {
        transform: none;
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
        <a href="{{ url('/en/work/sports-shop/products') }}" class="text-white transition-colors duration-300">Products</a>
        <a href="{{ url('/en/work/sports-shop/about') }}" class="hover:text-white transition-colors duration-300">About</a>
        <a href="{{ url('/en/work/sports-shop/contact') }}" class="hover:text-white transition-colors duration-300">Contact</a>
      </div>
      <a href="#" class="btn-flame bg-flame-500 text-white text-[13px] font-semibold px-5 py-2 rounded-full inline-block">
        Cart (0)
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
  <section class="pt-32 pb-16 md:pt-40 md:pb-24 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-[400px] h-[400px] rounded-full bg-flame-500/5 blur-[100px] pointer-events-none"></div>
    <div class="max-w-[1400px] mx-auto px-6 md:px-12">
      <div class="max-w-2xl">
        <span class="inline-block text-[11px] uppercase tracking-[0.2em] text-flame-400 font-medium mb-4 reveal">All Products</span>
        <h1 class="font-display font-bold text-white text-4xl md:text-6xl tracking-tight leading-[1.05] mb-4 reveal reveal-delay-1">
          The full line
        </h1>
        <p class="text-gray-400 text-lg leading-relaxed max-w-[50ch] reveal reveal-delay-2">
          Every piece, tested on real runs, refined through real movement. Filter by category to find what fits your training.
        </p>
      </div>
    </div>
  </section>

  <!-- Filters -->
  <section class="pb-12 md:pb-16">
    <div class="max-w-[1400px] mx-auto px-6 md:px-12">
      <div class="flex flex-wrap gap-3 reveal" x-data="{ active: 'all' }">
        <button @click="active = 'all'" :class="active === 'all' ? 'active' : ''" class="filter-pill px-5 py-2 rounded-full text-[13px] font-medium border border-white/10 text-gray-400">All</button>
        <button @click="active = 'running'" :class="active === 'running' ? 'active' : ''" class="filter-pill px-5 py-2 rounded-full text-[13px] font-medium border border-white/10 text-gray-400">Running</button>
        <button @click="active = 'training'" :class="active === 'training' ? 'active' : ''" class="filter-pill px-5 py-2 rounded-full text-[13px] font-medium border border-white/10 text-gray-400">Training</button>
        <button @click="active = 'lifestyle'" :class="active === 'lifestyle' ? 'active' : ''" class="filter-pill px-5 py-2 rounded-full text-[13px] font-medium border border-white/10 text-gray-400">Lifestyle</button>
        <button @click="active = 'recovery'" :class="active === 'recovery' ? 'active' : ''" class="filter-pill px-5 py-2 rounded-full text-[13px] font-medium border border-white/10 text-gray-400">Recovery</button>
      </div>
    </div>
  </section>

  <!-- Products Grid -->
  <section class="pb-24 md:pb-36">
    <div class="max-w-[1400px] mx-auto px-6 md:px-12">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 stagger-children" x-data="{ active: 'all' }">
        <!-- Product 1 -->
        <div class="product-card reveal" :class="active !== 'all' && active !== 'running' ? 'hidden' : ''">
          <div class="product-card-inner">
            <div class="aspect-square overflow-hidden rounded-t-[calc(1.25rem-2px)] img-zoom">
              <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400&q=80&auto=format&fit=crop" alt="Aero Runner" class="w-full h-full object-cover" loading="lazy">
            </div>
            <div class="p-5">
              <div class="text-[11px] uppercase tracking-[0.15em] text-gray-600 mb-1">Running</div>
              <h3 class="font-display font-semibold text-white text-sm mb-1">Aero Runner</h3>
              <p class="text-gray-500 text-xs mb-3">Lightweight racer with carbon plate</p>
              <div class="flex items-center justify-between">
                <span class="font-display font-bold text-white">$145</span>
                <span class="text-flame-400 text-xs font-medium">New</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Product 2 -->
        <div class="product-card reveal" :class="active !== 'all' && active !== 'training' ? 'hidden' : ''">
          <div class="product-card-inner">
            <div class="aspect-square overflow-hidden rounded-t-[calc(1.25rem-2px)] img-zoom">
              <img src="https://images.unsplash.com/photo-1556906781-9a412961c28c?w=400&q=80&auto=format&fit=crop" alt="Training Pro" class="w-full h-full object-cover" loading="lazy">
            </div>
            <div class="p-5">
              <div class="text-[11px] uppercase tracking-[0.15em] text-gray-600 mb-1">Training</div>
              <h3 class="font-display font-semibold text-white text-sm mb-1">Training Pro</h3>
              <p class="text-gray-500 text-xs mb-3">Stable base for heavy lifts</p>
              <div class="flex items-center justify-between">
                <span class="font-display font-bold text-white">$120</span>
                <span class="text-gray-600 text-xs">In stock</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Product 3 -->
        <div class="product-card reveal" :class="active !== 'all' && active !== 'recovery' ? 'hidden' : ''">
          <div class="product-card-inner">
            <div class="aspect-square overflow-hidden rounded-t-[calc(1.25rem-2px)] img-zoom">
              <img src="https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=400&q=80&auto=format&fit=crop" alt="Recovery Slide" class="w-full h-full object-cover" loading="lazy">
            </div>
            <div class="p-5">
              <div class="text-[11px] uppercase tracking-[0.15em] text-gray-600 mb-1">Recovery</div>
              <h3 class="font-display font-semibold text-white text-sm mb-1">Recovery Slide</h3>
              <p class="text-gray-500 text-xs mb-3">Post-run cushion and support</p>
              <div class="flex items-center justify-between">
                <span class="font-display font-bold text-white">$65</span>
                <span class="text-gray-600 text-xs">In stock</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Product 4 -->
        <div class="product-card reveal" :class="active !== 'all' && active !== 'running' ? 'hidden' : ''">
          <div class="product-card-inner">
            <div class="aspect-square overflow-hidden rounded-t-[calc(1.25rem-2px)] img-zoom">
              <img src="https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?w=400&q=80&auto=format&fit=crop" alt="Endurance X" class="w-full h-full object-cover" loading="lazy">
            </div>
            <div class="p-5">
              <div class="text-[11px] uppercase tracking-[0.15em] text-gray-600 mb-1">Running</div>
              <h3 class="font-display font-semibold text-white text-sm mb-1">Endurance X</h3>
              <p class="text-gray-500 text-xs mb-3">Max cushion for long distances</p>
              <div class="flex items-center justify-between">
                <span class="font-display font-bold text-white">$165</span>
                <span class="text-flame-400 text-xs font-medium">Limited</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Product 5 -->
        <div class="product-card reveal" :class="active !== 'all' && active !== 'lifestyle' ? 'hidden' : ''">
          <div class="product-card-inner">
            <div class="aspect-square overflow-hidden rounded-t-[calc(1.25rem-2px)] img-zoom">
              <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=400&q=80&auto=format&fit=crop" alt="Everyday Tee" class="w-full h-full object-cover" loading="lazy">
            </div>
            <div class="p-5">
              <div class="text-[11px] uppercase tracking-[0.15em] text-gray-600 mb-1">Lifestyle</div>
              <h3 class="font-display font-semibold text-white text-sm mb-1">Everyday Tee</h3>
              <p class="text-gray-500 text-xs mb-3">Merino blend, gym to street</p>
              <div class="flex items-center justify-between">
                <span class="font-display font-bold text-white">$48</span>
                <span class="text-gray-600 text-xs">In stock</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Product 6 -->
        <div class="product-card reveal" :class="active !== 'all' && active !== 'training' ? 'hidden' : ''">
          <div class="product-card-inner">
            <div class="aspect-square overflow-hidden rounded-t-[calc(1.25rem-2px)] img-zoom">
              <img src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=400&q=80&auto=format&fit=crop" alt="Lift Short" class="w-full h-full object-cover" loading="lazy">
            </div>
            <div class="p-5">
              <div class="text-[11px] uppercase tracking-[0.15em] text-gray-600 mb-1">Training</div>
              <h3 class="font-display font-semibold text-white text-sm mb-1">Lift Short</h3>
              <p class="text-gray-500 text-xs mb-3">4-way stretch, built to squat</p>
              <div class="flex items-center justify-between">
                <span class="font-display font-bold text-white">$55</span>
                <span class="text-gray-600 text-xs">In stock</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Product 7 -->
        <div class="product-card reveal" :class="active !== 'all' && active !== 'running' ? 'hidden' : ''">
          <div class="product-card-inner">
            <div class="aspect-square overflow-hidden rounded-t-[calc(1.25rem-2px)] img-zoom">
              <img src="https://images.unsplash.com/photo-1556906781-9a412961c28c?w=400&q=80&auto=format&fit=crop&sat=-100" alt="Stride Sock" class="w-full h-full object-cover" loading="lazy">
            </div>
            <div class="p-5">
              <div class="text-[11px] uppercase tracking-[0.15em] text-gray-600 mb-1">Running</div>
              <h3 class="font-display font-semibold text-white text-sm mb-1">Stride Sock</h3>
              <p class="text-gray-500 text-xs mb-3">Cushioned tabi, zero blisters</p>
              <div class="flex items-center justify-between">
                <span class="font-display font-bold text-white">$18</span>
                <span class="text-gray-600 text-xs">3-pack</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Product 8 -->
        <div class="product-card reveal" :class="active !== 'all' && active !== 'lifestyle' ? 'hidden' : ''">
          <div class="product-card-inner">
            <div class="aspect-square overflow-hidden rounded-t-[calc(1.25rem-2px)] img-zoom">
              <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?w=400&q=80&auto=format&fit=crop" alt="Wind Shell" class="w-full h-full object-cover" loading="lazy">
            </div>
            <div class="p-5">
              <div class="text-[11px] uppercase tracking-[0.15em] text-gray-600 mb-1">Lifestyle</div>
              <h3 class="font-display font-semibold text-white text-sm mb-1">Wind Shell</h3>
              <p class="text-gray-500 text-xs mb-3">Packable windbreaker, 85g</p>
              <div class="flex items-center justify-between">
                <span class="font-display font-bold text-white">$95</span>
                <span class="text-gray-600 text-xs">In stock</span>
              </div>
            </div>
          </div>
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
  </script>

</body>
</html>
