<div x-data="{
        show: false,
        heroHeight: 0,
        init() {
            const hero = document.getElementById('hero');
            if (hero) {
                this.heroHeight = hero.offsetHeight;
            } else {
                this.heroHeight = window.innerHeight;
            }
        },
        handleScroll() {
            this.show = window.scrollY > this.heroHeight;
        }
    }"
    x-on:scroll.window.throttle.100ms="handleScroll()"
    x-init="init(); handleScroll()"
    class="fixed bottom-6 right-6 z-50 transition-all duration-300"
    :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4 pointer-events-none'"
>
    <button
        x-on:click="window.scrollTo({ top: 0, behavior: 'smooth' })"
        class="group flex items-center justify-center rounded-full bg-charcoal p-3 text-cream shadow-lg transition-colors hover:bg-brand-dark"
        aria-label="{{ __('layout.back_to_top.label') }}"
    >
        <svg class="size-4 transition-transform duration-300 group-hover:-translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
        </svg>
    </button>
</div>
