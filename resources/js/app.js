document.addEventListener('DOMContentLoaded', () => {
    const mobileToggle = document.querySelector('[data-menu-toggle]');
    const mobileNav = document.querySelector('[data-mobile-nav]');

    if (mobileToggle && mobileNav) {
        mobileToggle.addEventListener('click', () => {
            mobileNav.classList.toggle('hidden');
        });
    }

    const lens = document.querySelector('.view-lens');
    const area = document.querySelector('.custom-cursor-area');

    if (lens && area) {
        document.addEventListener('mousemove', (event) => {
            const x = event.clientX;
            const y = event.clientY;
            lens.style.transform = `translate(${x - 48}px, ${y - 48}px)`;

            const hovered = document.elementFromPoint(x, y);
            if (hovered && hovered.closest('.group')) {
                lens.style.opacity = '1';
            } else {
                lens.style.opacity = '0';
            }
        });
    }
});
