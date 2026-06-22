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
    .img-lift {
      overflow: hidden;
    }
    .img-lift img {
      transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .img-lift:hover img {
      transform: scale(1.04);
    }

    /* Reduced motion */
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
        <a href="{{ url('/en/work/sports-shop') }}" class="text-ink transition-colors">Home</a>
        <a href="{{ url('/en/work/sports-shop/products') }}" class="hover:text-ink transition-colors">Products</a>
        <a href="{{ url('/en/work/sports-shop/about') }}" class="hover:text-ink transition-colors">About</a>
        <a href="{{ url('/en/work/sports-shop/contact') }}" class="hover:text-ink transition-colors">Contact</a>
      </nav>
      <div class="flex items-center gap-4">
        <a href="{{ url('/en/work/sports-shop/products') }}" class="hidden sm:inline-flex items-center gap-2 bg-sage-700 text-white text-[13px] font-semibold px-5 py-2.5 rounded-full hover:bg-sage-800 transition-colors">
          Shop
        </a>
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

  <!-- Hero: centered over full-bleed image -->
  <section class="relative min-h-[100dvh] flex items-center justify-center overflow-hidden">
    <img
      src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=1600&q=80&auto=format&fit=crop"
      alt="Runner mid-stride on an empty road at dawn"
      class="absolute inset-0 w-full h-full object-cover"
      loading="eager"
    >
    <div class="absolute inset-0 bg-gradient-to-b from-ink/30 via-ink/10 to-ink/40"></div>
    <div class="relative z-10 text-center px-6 max-w-3xl">
      <p class="text-white/70 text-[11px] uppercase tracking-[0.25em] font-medium mb-5 reveal">Portland, OR &mdash; Est. 2020</p>
      <h1 class="font-display font-bold text-white text-[clamp(2.5rem,7vw,5.5rem)] leading-[1] tracking-tight mb-6 reveal reveal-delay-1">
        Move without<br>compromise
      </h1>
      <p class="text-white/75 text-lg md:text-xl leading-relaxed max-w-[38ch] mx-auto mb-10 reveal reveal-delay-2">
        Technical gear tested on real roads, refined through real miles. No marketing shortcuts.
      </p>
      <div class="flex flex-wrap justify-center gap-4 reveal reveal-delay-3">
        <a href="{{ url('/en/work/sports-shop/products') }}" class="inline-flex items-center gap-2 bg-white text-ink font-semibold px-7 py-3.5 rounded-full text-sm hover:bg-white/90 transition-colors">
          Shop All
          <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M2 6h8M7 3l3 3-3 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
        <a href="{{ url('/en/work/sports-shop/about') }}" class="inline-flex items-center gap-2 border border-white/40 text-white font-medium px-7 py-3.5 rounded-full text-sm hover:bg-white/10 transition-colors">
          Our Story
        </a>
      </div>
    </div>
  </section>

  <!-- Trust strip -->
  <section class="border-b border-ink/5 py-5">
    <div class="max-w-7xl mx-auto px-6 md:px-10 flex flex-wrap items-center justify-center gap-x-10 gap-y-3 text-[11px] uppercase tracking-[0.2em] text-ink/30 font-medium">
      <span>Free shipping over $100</span>
      <span class="hidden sm:inline">&middot;</span>
      <span>30-day returns</span>
      <span class="hidden sm:inline">&middot;</span>
      <span>Tested 200+ miles</span>
      <span class="hidden sm:inline">&middot;</span>
      <span>Portland, OR</span>
    </div>
  </section>

  <!-- Collections: editorial photo grid -->
  <section class="py-24 md:py-36">
    <div class="max-w-7xl mx-auto px-6 md:px-10">
      <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-14 md:mb-20">
        <div>
          <h2 class="font-display font-bold text-ink text-3xl md:text-5xl tracking-tight leading-[1.1] reveal">Collections</h2>
          <p class="text-ink/45 mt-3 text-base max-w-[40ch] reveal reveal-delay-1">Three lines, each built for a different kind of movement.</p>
        </div>
        <a href="{{ url('/en/work/sports-shop/products') }}" class="text-sage-700 text-sm font-medium flex items-center gap-1.5 hover:text-sage-500 transition-colors reveal reveal-delay-1">
          View all
          <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M3 11L11 3M11 3H5M11 3v6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>

      <!-- Asymmetric bento: 1 tall + 2 stacked -->
      <div class="grid grid-cols-1 md:grid-cols-12 gap-4 stagger-children">
        <!-- Tall card: Running -->
        <a href="#" class="md:col-span-5 group relative rounded-2xl overflow-hidden aspect-[3/4] md:aspect-auto md:row-span-2 reveal">
          <img src="https://images.unsplash.com/photo-1552674605-db6ffd4facb5?w=800&q=80&auto=format&fit=crop" alt="Running collection" class="w-full h-full object-cover img-lift" loading="lazy">
          <div class="absolute inset-0 bg-gradient-to-t from-ink/50 via-transparent to-transparent"></div>
          <div class="absolute bottom-0 left-0 p-8">
            <span class="text-white/50 text-[10px] uppercase tracking-[0.2em]">01</span>
            <h3 class="font-display font-bold text-white text-2xl mt-1">Running</h3>
            <p class="text-white/60 text-sm mt-1 max-w-[25ch]">Lightweight. Breathable. Built for distance.</p>
          </div>
        </a>

        <!-- Top right: Training -->
        <a href="#" class="md:col-span-7 group relative rounded-2xl overflow-hidden aspect-[16/9] reveal">
          <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=900&q=80&auto=format&fit=crop" alt="Training collection" class="w-full h-full object-cover img-lift" loading="lazy">
          <div class="absolute inset-0 bg-gradient-to-r from-ink/40 via-transparent to-transparent"></div>
          <div class="absolute bottom-0 left-0 p-8">
            <span class="text-white/50 text-[10px] uppercase tracking-[0.2em]">02</span>
            <h3 class="font-display font-bold text-white text-2xl mt-1">Training</h3>
            <p class="text-white/60 text-sm mt-1 max-w-[25ch]">Durable. Flexible. Built for the gym.</p>
          </div>
        </a>

        <!-- Bottom right: Lifestyle -->
        <a href="#" class="md:col-span-7 group relative rounded-2xl overflow-hidden aspect-[16/9] reveal">
          <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=900&q=80&auto=format&fit=crop" alt="Lifestyle collection" class="w-full h-full object-cover img-lift" loading="lazy">
          <div class="absolute inset-0 bg-gradient-to-r from-ink/40 via-transparent to-transparent"></div>
          <div class="absolute bottom-0 left-0 p-8">
            <span class="text-white/50 text-[10px] uppercase tracking-[0.2em]">03</span>
            <h3 class="font-display font-bold text-white text-2xl mt-1">Lifestyle</h3>
            <p class="text-white/60 text-sm mt-1 max-w-[25ch]">Clean lines. Everyday wear. No compromise.</p>
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- Featured: alternating rows -->
  <section class="py-24 md:py-36 bg-mist">
    <div class="max-w-7xl mx-auto px-6 md:px-10">
      <h2 class="font-display font-bold text-ink text-3xl md:text-5xl tracking-tight leading-[1.1] mb-14 md:mb-20 reveal">Featured</h2>

      <div class="space-y-8">
        <!-- Row 1: image left, text right -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center reveal">
          <div class="rounded-2xl overflow-hidden aspect-[4/3] img-lift">
            <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=700&q=80&auto=format&fit=crop" alt="Aero Runner" class="w-full h-full object-cover" loading="lazy">
          </div>
          <div class="md:pl-8">
            <span class="text-sage-500 text-[11px] uppercase tracking-[0.18em] font-medium">Running</span>
            <h3 class="font-display font-bold text-ink text-2xl md:text-3xl mt-2">Aero Runner</h3>
            <p class="text-ink/50 mt-3 max-w-[40ch] leading-relaxed">Carbon-plated racer. 186g. Built for race day and the training that gets you there.</p>
            <div class="flex items-center gap-4 mt-6">
              <span class="font-display font-bold text-ink text-xl">$145</span>
              <span class="text-sage-500 text-xs font-medium bg-sage-50 px-3 py-1 rounded-full">New</span>
            </div>
          </div>
        </div>

        <!-- Row 2: text left, image right -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center reveal">
          <div class="order-2 md:order-1 md:pr-8">
            <span class="text-sage-500 text-[11px] uppercase tracking-[0.18em] font-medium">Training</span>
            <h3 class="font-display font-bold text-ink text-2xl md:text-3xl mt-2">Lift Short</h3>
            <p class="text-ink/50 mt-3 max-w-[40ch] leading-relaxed">4-way stretch, 7-inch inseam, phone pocket. Squat-proof and built to last.</p>
            <div class="flex items-center gap-4 mt-6">
              <span class="font-display font-bold text-ink text-xl">$55</span>
            </div>
          </div>
          <div class="order-1 md:order-2 rounded-2xl overflow-hidden aspect-[4/3] img-lift">
            <img src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=700&q=80&auto=format&fit=crop" alt="Lift Short" class="w-full h-full object-cover" loading="lazy">
          </div>
        </div>

        <!-- Row 3: image left, text right -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center reveal">
          <div class="rounded-2xl overflow-hidden aspect-[4/3] img-lift">
            <img src="https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=700&q=80&auto=format&fit=crop" alt="Recovery Slide" class="w-full h-full object-cover" loading="lazy">
          </div>
          <div class="md:pl-8">
            <span class="text-sage-500 text-[11px] uppercase tracking-[0.18em] font-medium">Recovery</span>
            <h3 class="font-display font-bold text-ink text-2xl md:text-3xl mt-2">Recovery Slide</h3>
            <p class="text-ink/50 mt-3 max-w-[40ch] leading-relaxed">Contoured footbed. Open-toe design. The first thing you put on after a long run.</p>
            <div class="flex items-center gap-4 mt-6">
              <span class="font-display font-bold text-ink text-xl">$65</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Story -->
  <section class="py-24 md:py-36">
    <div class="max-w-7xl mx-auto px-6 md:px-10 grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
      <div class="rounded-2xl overflow-hidden aspect-[4/5] reveal">
        <img src="https://images.unsplash.com/photo-1517836357463-d25dfeac3438?w=700&q=80&auto=format&fit=crop" alt="Athletes training at dawn" class="w-full h-full object-cover" loading="lazy">
      </div>
      <div>
        <p class="text-sage-500 text-[11px] uppercase tracking-[0.2em] font-medium mb-4 reveal">Our story</p>
        <h2 class="font-display font-bold text-ink text-3xl md:text-5xl tracking-tight leading-[1.1] mb-8 reveal reveal-delay-1">
          Two runners,<br>one frustration
        </h2>
        <div class="space-y-4 text-ink/55 leading-relaxed max-w-[48ch]">
          <p class="reveal reveal-delay-2">
            STRIDE started in 2020 when Kai and Priya got tired of gear that looks great in ads but falls apart by mile three.
          </p>
          <p class="reveal reveal-delay-3">
            They pooled savings, rented a workshop in Portland, and started making the shoes they wanted to run in. No investors. No focus groups. Just real athletes testing real prototypes on real roads.
          </p>
          <p class="reveal reveal-delay-4">
            Five years later, the workshop is bigger, but the process hasn't changed. Every design goes through 200+ miles of field testing before it ships.
          </p>
        </div>
        <div class="flex gap-10 mt-10 pt-8 border-t border-ink/8 reveal reveal-delay-4">
          <div>
            <div class="font-display font-bold text-ink text-3xl">5</div>
            <div class="text-ink/35 text-xs mt-1">years running</div>
          </div>
          <div>
            <div class="font-display font-bold text-ink text-3xl">48</div>
            <div class="text-ink/35 text-xs mt-1">products</div>
          </div>
          <div>
            <div class="font-display font-bold text-ink text-3xl">23</div>
            <div class="text-ink/35 text-xs mt-1">countries</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonial -->
  <section class="py-24 md:py-36 bg-sage-700">
    <div class="max-w-4xl mx-auto px-6 md:px-10 text-center">
      <svg class="mx-auto mb-8 text-white/15" width="48" height="48" viewBox="0 0 48 48" fill="none">
        <path d="M14 28c-4 0-6-3-6-6s3-6 6-6c-3 0-6-3-6-6h12v18H14zm20 0c-4 0-6-3-6-6s3-6 6-6c-3 0-6-3-6-6h12v18H34z" fill="currentColor"/>
      </svg>
      <blockquote class="font-display text-white text-xl md:text-3xl leading-snug tracking-tight mb-8 reveal">
        "I've run three marathons in STRIDE gear. The Aero Runner is the only shoe that feels like it disappears on my foot."
      </blockquote>
      <div class="flex items-center justify-center gap-3 reveal reveal-delay-1">
        <div class="w-10 h-10 rounded-full overflow-hidden">
          <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=160&q=80&auto=format&fit=crop" alt="Marcus T." class="w-full h-full object-cover" loading="lazy">
        </div>
        <div class="text-left">
          <div class="text-white text-sm font-medium">Marcus T.</div>
          <div class="text-white/45 text-xs">Marathon runner, Chicago</div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="py-24 md:py-36">
    <div class="max-w-3xl mx-auto px-6 md:px-10 text-center">
      <h2 class="font-display font-bold text-ink text-3xl md:text-5xl tracking-tight leading-[1.1] mb-5 reveal">Ready to move?</h2>
      <p class="text-ink/45 text-lg max-w-[40ch] mx-auto mb-10 reveal reveal-delay-1">Join 12,000+ athletes who train in gear that keeps up.</p>
      <div class="flex flex-wrap justify-center gap-4 reveal reveal-delay-2">
        <a href="{{ url('/en/work/sports-shop/products') }}" class="inline-flex items-center gap-2 bg-sage-700 text-white font-semibold px-8 py-3.5 rounded-full text-sm hover:bg-sage-800 transition-colors">
          Shop All
          <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M2 6h8M7 3l3 3-3 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
        <a href="{{ url('/en/work/sports-shop/contact') }}" class="inline-flex items-center gap-2 border border-ink/15 text-ink font-medium px-8 py-3.5 rounded-full text-sm hover:bg-ink/5 transition-colors">
          Contact
        </a>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="border-t border-ink/8 py-10">
    <div class="max-w-7xl mx-auto px-6 md:px-10 flex flex-col md:flex-row items-center justify-between gap-4">
      <div class="font-display font-bold text-ink text-sm tracking-tight">STRIDE</div>
      <div class="flex items-center gap-6 text-[13px] text-ink/40">
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
