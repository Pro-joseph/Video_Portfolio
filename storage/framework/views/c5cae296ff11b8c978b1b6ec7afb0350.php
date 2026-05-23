<header class="fixed top-0 left-0 right-0 z-50 border-b backdrop-blur-sm" style="background-color: <?php echo e($siteSettings['header']['header_bg_color'] ?? '#ffffff'); ?>; border-color: <?php echo e($siteSettings['colors']['primary_color'] ?? '#1a1a2e'); ?>20;">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <a href="<?php echo e(route('home')); ?>" class="text-2xl font-bold font-serif" style="color: <?php echo e($siteSettings['header']['header_text_color'] ?? '#1a1a2e'); ?>">
            <?php echo e($siteSettings['header']['header_logo_text'] ?? 'FrameFlow'); ?>

        </a>
        <nav class="hidden md:flex gap-8">
            <a href="<?php echo e(route('home')); ?>" class="nav-link <?php echo e(request()->is('/') ? 'text-secondary' : ''); ?>" style="color: <?php echo e($siteSettings['header']['header_text_color'] ?? '#1a1a2e'); ?>">Home</a>
            <a href="<?php echo e(route('portfolio')); ?>" class="nav-link <?php echo e(request()->is('portfolio') ? 'text-secondary' : ''); ?>" style="color: <?php echo e($siteSettings['header']['header_text_color'] ?? '#1a1a2e'); ?>">Portfolio</a>
            <a href="<?php echo e(route('reels')); ?>" class="nav-link <?php echo e(request()->is('reels') ? 'text-secondary' : ''); ?>" style="color: <?php echo e($siteSettings['header']['header_text_color'] ?? '#1a1a2e'); ?>">Reels</a>
            <a href="<?php echo e(route('gallery')); ?>" class="nav-link <?php echo e(request()->is('gallery*') ? 'text-secondary' : ''); ?>" style="color: <?php echo e($siteSettings['header']['header_text_color'] ?? '#1a1a2e'); ?>">Gallery</a>
            <a href="<?php echo e(route('about')); ?>" class="nav-link <?php echo e(request()->is('about') ? 'text-secondary' : ''); ?>" style="color: <?php echo e($siteSettings['header']['header_text_color'] ?? '#1a1a2e'); ?>">About</a>
            <a href="<?php echo e(route('contact')); ?>" class="nav-link <?php echo e(request()->is('contact') ? 'text-secondary' : ''); ?>" style="color: <?php echo e($siteSettings['header']['header_text_color'] ?? '#1a1a2e'); ?>">Contact</a>
        </nav>
        <a href="<?php echo e(route('contact')); ?>" class="btn-primary">Get Started</a>
    </div>
</header><?php /**PATH C:\Users\jdira\Herd\video_portfolio\resources\views\components\header.blade.php ENDPATH**/ ?>