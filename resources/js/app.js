// Scroll-reveal via IntersectionObserver
// Elements with class `.scroll-reveal` or `.scroll-reveal-group`
// get `.is-visible` added when they enter the viewport.
// CSS in app.css handles the actual animation.
document.addEventListener('DOMContentLoaded', () => {
    const revealEls = document.querySelectorAll('.scroll-reveal, .scroll-reveal-group');
    if (!revealEls.length) {
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.12, rootMargin: '0px 0px -50px 0px' },
    );

    revealEls.forEach((el) => observer.observe(el));
});
