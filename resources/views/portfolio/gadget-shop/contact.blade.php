<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'PULSE | Contact' }}</title>
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

    .form-input {
      background: white;
      border: 1px solid rgba(148,163,184,0.3);
      border-radius: 0.75rem;
      padding: 0.875rem 1rem;
      color: #0F172A;
      font-size: 0.875rem;
      width: 100%;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
      outline: none;
    }
    .form-input::placeholder { color: #94A3B8; }
    .form-input:focus {
      border-color: #2563EB;
      box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.08);
    }

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
        <a href="{{ url('/en/work/gadget-shop/about') }}" class="hover:text-slate-900 transition-colors">About</a>
        <a href="{{ url('/en/work/gadget-shop/contact') }}" class="text-slate-900 transition-colors">Contact</a>
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

  <!-- Header -->
  <section class="pt-28 pb-10 md:pt-36 md:pb-14">
    <div class="max-w-7xl mx-auto px-6 md:px-10">
      <h1 class="font-display font-bold text-slate-900 text-4xl md:text-6xl tracking-tight leading-[1.05] reveal">Get in touch</h1>
      <p class="text-slate-500 text-lg mt-3 max-w-[45ch] reveal reveal-delay-1">Questions about products, orders, or partnerships? We are here.</p>
    </div>
  </section>

  <!-- Contact grid -->
  <section class="pb-24 md:pb-36">
    <div class="max-w-7xl mx-auto px-6 md:px-10 grid grid-cols-1 lg:grid-cols-12 gap-16">
      <!-- Form -->
      <div class="lg:col-span-7">
        <form class="space-y-6 reveal" x-data="{ sending: false }" @submit.prevent="sending = true; setTimeout(() => sending = false, 2000)">
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
              <label for="name" class="block text-[11px] uppercase tracking-[0.15em] text-slate-400 mb-2 font-medium">Name</label>
              <input type="text" id="name" name="name" class="form-input" placeholder="Your name" required>
            </div>
            <div>
              <label for="email" class="block text-[11px] uppercase tracking-[0.15em] text-slate-400 mb-2 font-medium">Email</label>
              <input type="email" id="email" name="email" class="form-input" placeholder="you@example.com" required>
            </div>
          </div>
          <div>
            <label for="subject" class="block text-[11px] uppercase tracking-[0.15em] text-slate-400 mb-2 font-medium">Subject</label>
            <select id="subject" name="subject" class="form-input">
              <option value="">Select a topic</option>
              <option value="general">General inquiry</option>
              <option value="order">Order support</option>
              <option value="warranty">Warranty claim</option>
              <option value="partnership">Partnership</option>
            </select>
          </div>
          <div>
            <label for="message" class="block text-[11px] uppercase tracking-[0.15em] text-slate-400 mb-2 font-medium">Message</label>
            <textarea id="message" name="message" rows="5" class="form-input resize-none" placeholder="Tell us what you need" required></textarea>
          </div>
          <button type="submit" class="inline-flex items-center gap-2 bg-steel-600 text-white font-semibold px-8 py-3.5 rounded-full text-sm hover:bg-steel-700 transition-colors" :class="sending ? 'opacity-60 pointer-events-none' : ''">
            <span x-text="sending ? 'Sending...' : 'Send Message'">Send Message</span>
            <svg x-show="!sending" width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M2 6h8M7 3l3 3-3 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </button>
        </form>
      </div>

      <!-- Info -->
      <div class="lg:col-span-5">
        <div class="space-y-8">
          <div class="reveal">
            <div class="text-slate-400 text-xs uppercase tracking-wider mb-2 font-medium">Email</div>
            <a href="mailto:hello@pulsegadget.com" class="text-slate-900 text-base hover:text-steel-600 transition-colors">hello@pulsegadget.com</a>
          </div>
          <div class="reveal reveal-delay-1">
            <div class="text-slate-400 text-xs uppercase tracking-wider mb-2 font-medium">Phone</div>
            <a href="tel:+18005551234" class="text-slate-900 text-base hover:text-steel-600 transition-colors">(800) 555-1234</a>
          </div>
          <div class="reveal reveal-delay-2">
            <div class="text-slate-400 text-xs uppercase tracking-wider mb-2 font-medium">Hours</div>
            <p class="text-slate-900 text-base">Mon - Fri, 9am - 6pm EST</p>
            <p class="text-slate-400 text-sm mt-1">Weekend support via email</p>
          </div>
          <div class="reveal reveal-delay-3">
            <div class="text-slate-400 text-xs uppercase tracking-wider mb-2 font-medium">Social</div>
            <div class="flex gap-4">
              <a href="#" class="text-slate-400 hover:text-slate-600 transition-colors text-sm">Instagram</a>
              <a href="#" class="text-slate-400 hover:text-slate-600 transition-colors text-sm">Twitter</a>
              <a href="#" class="text-slate-400 hover:text-slate-600 transition-colors text-sm">YouTube</a>
            </div>
          </div>
        </div>

        <div class="mt-12 rounded-2xl overflow-hidden aspect-[4/3] reveal">
          <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=600&q=80&auto=format&fit=crop" alt="PULSE office" class="w-full h-full object-cover" loading="lazy">
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
