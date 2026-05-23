<header class="fixed top-0 left-0 right-0 z-50" style="background: var(--header-bg); backdrop-filter: blur(12px); border-bottom: 1px solid var(--border);">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <a href="<?php echo e(route('home')); ?>" class="text-2xl" style="font-family: 'Bebas Neue', sans-serif; color: var(--text); letter-spacing: 0.03em;">
            <?php echo e($siteSettings['header']['header_logo_text'] ?? 'FrameFlow'); ?>

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
    </div>
</header><?php /**PATH C:\Users\jdira\Herd\video_portfolio\resources\views/components/header.blade.php ENDPATH**/ ?>