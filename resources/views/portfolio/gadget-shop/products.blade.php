<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'PULSE | All Products' }}</title>
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

    .stagger-children .reveal:nth-child(1) { transition-delay: 0s; }
    .stagger-children .reveal:nth-child(2) { transition-delay: 0.05s; }
    .stagger-children .reveal:nth-child(3) { transition-delay: 0.1s; }
    .stagger-children .reveal:nth-child(4) { transition-delay: 0.15s; }
    .stagger-children .reveal:nth-child(5) { transition-delay: 0.2s; }
    .stagger-children .reveal:nth-child(6) { transition-delay: 0.25s; }
    .stagger-children .reveal:nth-child(7) { transition-delay: 0.3s; }
    .stagger-children .reveal:nth-child(8) { transition-delay: 0.35s; }
    .stagger-children .reveal:nth-child(9) { transition-delay: 0.4s; }
    .stagger-children .reveal:nth-child(10) { transition-delay: 0.45s; }
    .stagger-children .reveal:nth-child(11) { transition-delay: 0.5s; }
    .stagger-children .reveal:nth-child(12) { transition-delay: 0.55s; }

    .img-lift { overflow: hidden; }
    .img-lift img { transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1); }
    .img-lift:hover img { transform: scale(1.04); }

    .filter-btn { transition: all 0.25s ease; }
    .filter-btn:hover { background: #1E293B; color: white; }
    .filter-btn.active { background: #2563EB; color: white; border-color: #2563EB; }

    .product-card { transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1); }
    .product-card:hover { transform: translateY(-4px); }

    @media (prefers-reduced-motion: reduce) {
      .reveal { opacity: 1; transform: none; transition: none; }
      .product-card:hover { transform: none; }
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
        <a href="{{ url('/en/work/gadget-shop/products') }}" class="text-slate-900 transition-colors">Products</a>
        <a href="{{ url('/en/work/gadget-shop/about') }}" class="hover:text-slate-900 transition-colors">About</a>
        <a href="{{ url('/en/work/gadget-shop/contact') }}" class="hover:text-slate-900 transition-colors">Contact</a>
      </nav>
      <div class="flex items-center gap-4">
        <span class="text-[13px] text-slate-400 font-medium">Cart (0)</span>
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

  <!-- Header -->
  <section class="pt-28 pb-10 md:pt-36 md:pb-14">
    <div class="max-w-7xl mx-auto px-6 md:px-10">
      <h1 class="font-display font-bold text-slate-900 text-4xl md:text-6xl tracking-tight leading-[1.05] reveal">All Products</h1>
      <p class="text-slate-500 text-lg mt-3 max-w-[45ch] reveal reveal-delay-1">Every device, tested and verified. Filter by category to find exactly what you need.</p>
    </div>
  </section>

  <!-- Filters -->
  <section class="pb-10 md:pb-14">
    <div class="max-w-7xl mx-auto px-6 md:px-10">
      <div class="flex flex-wrap gap-2.5 reveal" x-data="{ active: 'all' }">
        <button @click="active = 'all'" :class="active === 'all' ? 'active' : ''" class="filter-btn px-4 py-2 rounded-full text-[13px] font-medium border border-slate-200 text-slate-500">All</button>
        <button @click="active = 'smartphones'" :class="active === 'smartphones' ? 'active' : ''" class="filter-btn px-4 py-2 rounded-full text-[13px] font-medium border border-slate-200 text-slate-500">Smartphones</button>
        <button @click="active = 'tablets'" :class="active === 'tablets' ? 'active' : ''" class="filter-btn px-4 py-2 rounded-full text-[13px] font-medium border border-slate-200 text-slate-500">Tablets</button>
        <button @click="active = 'laptops'" :class="active === 'laptops' ? 'active' : ''" class="filter-btn px-4 py-2 rounded-full text-[13px] font-medium border border-slate-200 text-slate-500">Laptops</button>
        <button @click="active = 'accessories'" :class="active === 'accessories' ? 'active' : ''" class="filter-btn px-4 py-2 rounded-full text-[13px] font-medium border border-slate-200 text-slate-500">Accessories</button>
      </div>
    </div>
  </section>

  <!-- Products -->
  <section class="pb-24 md:pb-36">
    <div class="max-w-7xl mx-auto px-6 md:px-10">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 stagger-children" x-data="{ active: 'all' }">

        <!-- Smartphones -->
        <div class="product-card reveal" :class="active !== 'all' && active !== 'smartphones' ? 'hidden' : ''">
          <div class="rounded-2xl overflow-hidden bg-mist">
            <div class="aspect-[4/3] img-lift">
              <img src="https://images.unsplash.com/photo-1610945415295-d9bbf067e59c?w=500&q=80&auto=format&fit=crop" alt="Galaxy S26 Ultra" class="w-full h-full object-cover" loading="lazy">
            </div>
          </div>
          <div class="mt-4">
            <div class="text-[11px] uppercase tracking-[0.15em] text-slate-400 font-medium">Smartphones</div>
            <h3 class="font-display font-semibold text-slate-900 text-sm mt-1">Galaxy S26 Ultra</h3>
            <p class="text-slate-500 text-xs mt-1">200MP camera, S Pen</p>
            <div class="flex items-center gap-3 mt-2">
              <span class="font-display font-bold text-slate-900">$1,299</span>
              <span class="text-steel-600 text-[11px] font-medium bg-steel-50 px-2 py-0.5 rounded-full">New</span>
            </div>
          </div>
        </div>

        <div class="product-card reveal" :class="active !== 'all' && active !== 'smartphones' ? 'hidden' : ''">
          <div class="rounded-2xl overflow-hidden bg-mist">
            <div class="aspect-[4/3] img-lift">
              <img src="https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=500&q=80&auto=format&fit=crop" alt="iPhone 17 Pro" class="w-full h-full object-cover" loading="lazy">
            </div>
          </div>
          <div class="mt-4">
            <div class="text-[11px] uppercase tracking-[0.15em] text-slate-400 font-medium">Smartphones</div>
            <h3 class="font-display font-semibold text-slate-900 text-sm mt-1">iPhone 17 Pro</h3>
            <p class="text-slate-500 text-xs mt-1">A19 Pro, titanium</p>
            <div class="mt-2">
              <span class="font-display font-bold text-slate-900">$1,199</span>
            </div>
          </div>
        </div>

        <div class="product-card reveal" :class="active !== 'all' && active !== 'smartphones' ? 'hidden' : ''">
          <div class="rounded-2xl overflow-hidden bg-mist">
            <div class="aspect-[4/3] img-lift">
              <img src="https://images.unsplash.com/photo-1598327105666-5b89351aff97?w=500&q=80&auto=format&fit=crop" alt="Pixel 10 Pro" class="w-full h-full object-cover" loading="lazy">
            </div>
          </div>
          <div class="mt-4">
            <div class="text-[11px] uppercase tracking-[0.15em] text-slate-400 font-medium">Smartphones</div>
            <h3 class="font-display font-semibold text-slate-900 text-sm mt-1">Pixel 10 Pro</h3>
            <p class="text-slate-500 text-xs mt-1">Tensor G5, AI camera</p>
            <div class="mt-2">
              <span class="font-display font-bold text-slate-900">$999</span>
            </div>
          </div>
        </div>

        <!-- Tablets -->
        <div class="product-card reveal" :class="active !== 'all' && active !== 'tablets' ? 'hidden' : ''">
          <div class="rounded-2xl overflow-hidden bg-mist">
            <div class="aspect-[4/3] img-lift">
              <img src="https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?w=500&q=80&auto=format&fit=crop" alt="iPad Air M4" class="w-full h-full object-cover" loading="lazy">
            </div>
          </div>
          <div class="mt-4">
            <div class="text-[11px] uppercase tracking-[0.15em] text-slate-400 font-medium">Tablets</div>
            <h3 class="font-display font-semibold text-slate-900 text-sm mt-1">iPad Air M4</h3>
            <p class="text-slate-500 text-xs mt-1">Liquid Retina, Pencil Pro</p>
            <div class="mt-2">
              <span class="font-display font-bold text-slate-900">$799</span>
            </div>
          </div>
        </div>

        <div class="product-card reveal" :class="active !== 'all' && active !== 'tablets' ? 'hidden' : ''">
          <div class="rounded-2xl overflow-hidden bg-mist">
            <div class="aspect-[4/3] img-lift">
              <img src="https://images.unsplash.com/photo-1561154464-82e9adf32764?w=500&q=80&auto=format&fit=crop" alt="Galaxy Tab S10" class="w-full h-full object-cover" loading="lazy">
            </div>
          </div>
          <div class="mt-4">
            <div class="text-[11px] uppercase tracking-[0.15em] text-slate-400 font-medium">Tablets</div>
            <h3 class="font-display font-semibold text-slate-900 text-sm mt-1">Galaxy Tab S10</h3>
            <p class="text-slate-500 text-xs mt-1">Dynamic AMOLED, S Pen</p>
            <div class="mt-2">
              <span class="font-display font-bold text-slate-900">$849</span>
            </div>
          </div>
        </div>

        <div class="product-card reveal" :class="active !== 'all' && active !== 'tablets' ? 'hidden' : ''">
          <div class="rounded-2xl overflow-hidden bg-mist">
            <div class="aspect-[4/3] img-lift">
              <img src="https://images.unsplash.com/photo-1585790050230-5dd28404ccb9?w=500&q=80&auto=format&fit=crop" alt="iPad mini" class="w-full h-full object-cover" loading="lazy">
            </div>
          </div>
          <div class="mt-4">
            <div class="text-[11px] uppercase tracking-[0.15em] text-slate-400 font-medium">Tablets</div>
            <h3 class="font-display font-semibold text-slate-900 text-sm mt-1">iPad mini</h3>
            <p class="text-slate-500 text-xs mt-1">A17 Pro, portable</p>
            <div class="mt-2">
              <span class="font-display font-bold text-slate-900">$499</span>
            </div>
          </div>
        </div>

        <!-- Laptops -->
        <div class="product-card reveal" :class="active !== 'all' && active !== 'laptops' ? 'hidden' : ''">
          <div class="rounded-2xl overflow-hidden bg-mist">
            <div class="aspect-[4/3] img-lift">
              <img src="https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=500&q=80&auto=format&fit=crop" alt="MacBook Pro M5" class="w-full h-full object-cover" loading="lazy">
            </div>
          </div>
          <div class="mt-4">
            <div class="text-[11px] uppercase tracking-[0.15em] text-slate-400 font-medium">Laptops</div>
            <h3 class="font-display font-semibold text-slate-900 text-sm mt-1">MacBook Pro M5</h3>
            <p class="text-slate-500 text-xs mt-1">22h battery, ProMotion</p>
            <div class="flex items-center gap-3 mt-2">
              <span class="font-display font-bold text-slate-900">$2,499</span>
              <span class="text-steel-600 text-[11px] font-medium bg-steel-50 px-2 py-0.5 rounded-full">New</span>
            </div>
          </div>
        </div>

        <div class="product-card reveal" :class="active !== 'all' && active !== 'laptops' ? 'hidden' : ''">
          <div class="rounded-2xl overflow-hidden bg-mist">
            <div class="aspect-[4/3] img-lift">
              <img src="https://images.unsplash.com/photo-1593642632559-0c6d3fc62b89?w=500&q=80&auto=format&fit=crop" alt="ThinkPad X1 Carbon" class="w-full h-full object-cover" loading="lazy">
            </div>
          </div>
          <div class="mt-4">
            <div class="text-[11px] uppercase tracking-[0.15em] text-slate-400 font-medium">Laptops</div>
            <h3 class="font-display font-semibold text-slate-900 text-sm mt-1">ThinkPad X1 Carbon</h3>
            <p class="text-slate-500 text-xs mt-1">Ultra-light, 24h battery</p>
            <div class="mt-2">
              <span class="font-display font-bold text-slate-900">$1,849</span>
            </div>
          </div>
        </div>

        <div class="product-card reveal" :class="active !== 'all' && active !== 'laptops' ? 'hidden' : ''">
          <div class="rounded-2xl overflow-hidden bg-mist">
            <div class="aspect-[4/3] img-lift">
              <img src="https://images.unsplash.com/photo-1625842268584-8f3296236761?w=500&q=80&auto=format&fit=crop" alt="Galaxy Book 5 Pro" class="w-full h-full object-cover" loading="lazy">
            </div>
          </div>
          <div class="mt-4">
            <div class="text-[11px] uppercase tracking-[0.15em] text-slate-400 font-medium">Laptops</div>
            <h3 class="font-display font-semibold text-slate-900 text-sm mt-1">Galaxy Book 5 Pro</h3>
            <p class="text-slate-500 text-xs mt-1">AMOLED, 360 hinge</p>
            <div class="mt-2">
              <span class="font-display font-bold text-slate-900">$1,299</span>
            </div>
          </div>
        </div>

        <!-- Accessories -->
        <div class="product-card reveal" :class="active !== 'all' && active !== 'accessories' ? 'hidden' : ''">
          <div class="rounded-2xl overflow-hidden bg-mist">
            <div class="aspect-[4/3] img-lift">
              <img src="https://images.unsplash.com/photo-1606220588913-b3aacb4d2f46?w=500&q=80&auto=format&fit=crop" alt="AirPods Pro 3" class="w-full h-full object-cover" loading="lazy">
            </div>
          </div>
          <div class="mt-4">
            <div class="text-[11px] uppercase tracking-[0.15em] text-slate-400 font-medium">Accessories</div>
            <h3 class="font-display font-semibold text-slate-900 text-sm mt-1">AirPods Pro 3</h3>
            <p class="text-slate-500 text-xs mt-1">H3 chip, adaptive audio</p>
            <div class="mt-2">
              <span class="font-display font-bold text-slate-900">$249</span>
            </div>
          </div>
        </div>

        <div class="product-card reveal" :class="active !== 'all' && active !== 'accessories' ? 'hidden' : ''">
          <div class="rounded-2xl overflow-hidden bg-mist">
            <div class="aspect-[4/3] img-lift">
              <img src="https://images.unsplash.com/photo-1579586337278-3befd40fd17a?w=500&q=80&auto=format&fit=crop" alt="Apple Watch Ultra 3" class="w-full h-full object-cover" loading="lazy">
            </div>
          </div>
          <div class="mt-4">
            <div class="text-[11px] uppercase tracking-[0.15em] text-slate-400 font-medium">Accessories</div>
            <h3 class="font-display font-semibold text-slate-900 text-sm mt-1">Apple Watch Ultra 3</h3>
            <p class="text-slate-500 text-xs mt-1">Titanium, 72h battery</p>
            <div class="mt-2">
              <span class="font-display font-bold text-slate-900">$799</span>
            </div>
          </div>
        </div>

        <div class="product-card reveal" :class="active !== 'all' && active !== 'accessories' ? 'hidden' : ''">
          <div class="rounded-2xl overflow-hidden bg-mist">
            <div class="aspect-[4/3] img-lift">
              <img src="https://images.unsplash.com/photo-1583394838336-acd977736f90?w=500&q=80&auto=format&fit=crop" alt="Sony WH-1000XM6" class="w-full h-full object-cover" loading="lazy">
            </div>
          </div>
          <div class="mt-4">
            <div class="text-[11px] uppercase tracking-[0.15em] text-slate-400 font-medium">Accessories</div>
            <h3 class="font-display font-semibold text-slate-900 text-sm mt-1">Sony WH-1000XM6</h3>
            <p class="text-slate-500 text-xs mt-1">30h battery, ANC</p>
            <div class="mt-2">
              <span class="font-display font-bold text-slate-900">$349</span>
            </div>
          </div>
        </div>

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
