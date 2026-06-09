<header class="fixed top-0 left-0 right-0 z-50" style="background: var(--header-bg); backdrop-filter: blur(12px); border-bottom: 1px solid var(--border);">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <a href="<?php echo e(route('home')); ?>" class="text-2xl" style="font-family: 'Bebas Neue', sans-serif; color: var(--text); letter-spacing: 0.03em;">
            <?php echo e($siteSettings['header']['header_logo_text'] ?? 'Oumalk'); ?>

        </a>
        <nav class="hidden md:flex gap-8 items-center">
            <a href="<?php echo e(route('home')); ?>" class="nav-link <?php echo e(request()->is('/') ? 'text-accent' : ''); ?>" style="<?php echo e(request()->is('/') ? 'color: var(--orange);' : ''); ?>">Home</a>
            <a href="<?php echo e(route('portfolio')); ?>" class="nav-link <?php echo e(request()->is('portfolio*') ? 'text-accent' : ''); ?>" style="<?php echo e(request()->is('portfolio*') ? 'color: var(--orange);' : ''); ?>">Work</a>
            <a href="<?php echo e(route('reels')); ?>" class="nav-link <?php echo e(request()->is('reels') ? 'text-accent' : ''); ?>" style="<?php echo e(request()->is('reels') ? 'color: var(--orange);' : ''); ?>">Reels</a>
            <a href="<?php echo e(route('gallery')); ?>" class="nav-link <?php echo e(request()->is('gallery*') ? 'text-accent' : ''); ?>" style="<?php echo e(request()->is('gallery*') ? 'color: var(--orange);' : ''); ?>">Gallery</a>
            <a href="<?php echo e(route('about')); ?>" class="nav-link <?php echo e(request()->is('about') ? 'text-accent' : ''); ?>" style="<?php echo e(request()->is('about') ? 'color: var(--orange);' : ''); ?>">About</a>
            <button onclick="toggleTheme()" id="themeToggle" style="background: none; border: 1px solid var(--border); color: var(--muted); width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s ease;" aria-label="Toggle theme">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path id="themeIcon" d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
                </svg>
            </button>
            <a href="<?php echo e(route('contact')); ?>" class="btn-primary text-sm" style="padding: 0.5rem 1.5rem; font-size: 0.8rem;">
                Let's Talk
            </a>
        </nav>

        <div class="flex items-center gap-2 md:hidden">
            <button onclick="toggleTheme()" id="themeToggleMobile" style="background: none; border: 1px solid var(--border); color: var(--muted); width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s ease;" aria-label="Toggle theme">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path id="themeIconMobile" d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
                </svg>
            </button>
            <button id="menuToggle" style="background: none; border: 1px solid var(--border); color: var(--muted); width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s ease;" aria-label="Toggle menu">
                <svg id="menuIcon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 12h18M3 6h18M3 18h18"/>
                </svg>
            </button>
        </div>

        <nav id="mobileMenu" style="display: none; position: fixed; top: 65px; left: 0; right: 0; background: var(--header-bg); backdrop-filter: blur(12px); border-bottom: 1px solid var(--border); padding: 1.5rem 2rem; flex-direction: column; gap: 1.25rem; z-index: 40;">
            <a href="<?php echo e(route('home')); ?>" class="nav-link" style="<?php echo e(request()->is('/') ? 'color: var(--orange);' : ''); ?> font-size: 1.1rem;">Home</a>
            <a href="<?php echo e(route('portfolio')); ?>" class="nav-link" style="<?php echo e(request()->is('portfolio*') ? 'color: var(--orange);' : ''); ?> font-size: 1.1rem;">Work</a>
            <a href="<?php echo e(route('reels')); ?>" class="nav-link" style="<?php echo e(request()->is('reels') ? 'color: var(--orange);' : ''); ?> font-size: 1.1rem;">Reels</a>
            <a href="<?php echo e(route('gallery')); ?>" class="nav-link" style="<?php echo e(request()->is('gallery*') ? 'color: var(--orange);' : ''); ?> font-size: 1.1rem;">Gallery</a>
            <a href="<?php echo e(route('about')); ?>" class="nav-link" style="<?php echo e(request()->is('about') ? 'color: var(--orange);' : ''); ?> font-size: 1.1rem;">About</a>
            <a href="<?php echo e(route('contact')); ?>" class="btn-primary text-sm" style="padding: 0.65rem 1.5rem; font-size: 0.85rem; text-align: center;">Let's Talk</a>
        </nav>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var menuToggle = document.getElementById('menuToggle');
    var mobileMenu = document.getElementById('mobileMenu');
    var menuIcon = document.getElementById('menuIcon');

    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', function () {
            if (window.innerWidth >= 768) return;
            var isOpen = mobileMenu.style.display === 'flex';
            mobileMenu.style.display = isOpen ? 'none' : 'flex';
            menuIcon.innerHTML = isOpen
                ? '<path d="M3 12h18M3 6h18M3 18h18"/>'
                : '<path d="M18 6L6 18M6 6l12 12"/>';
        });
    }

    window.addEventListener('resize', function () {
        if (window.innerWidth >= 768 && mobileMenu && mobileMenu.style.display === 'flex') {
            mobileMenu.style.display = 'none';
            menuIcon.innerHTML = '<path d="M3 12h18M3 6h18M3 18h18"/>';
        }
    });
});
</script><?php /**PATH C:\Users\jdira\Herd\video_portfolio\resources\views/components/header.blade.php ENDPATH**/ ?>