<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'FrameFlow - Professional Videography'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('description', 'Professional videography services for weddings, events, and commercial content'); ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '<?php echo e($siteSettings['colors']['primary_color'] ?? '#1a1a2e'); ?>',
                        secondary: '<?php echo e($siteSettings['colors']['secondary_color'] ?? '#f4a460'); ?>',
                        accent: '<?php echo e($siteSettings['colors']['accent_color'] ?? '#e8d5c4'); ?>',
                        dark: '<?php echo e($siteSettings['colors']['primary_color'] ?? '#1a1a2e'); ?>',
                        light: '#f5f5f7',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                },
            },
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { font-family: 'Inter', sans-serif; background-color: #f5f5f7; color: <?php echo e($siteSettings['colors']['primary_color'] ?? '#1a1a2e'); ?>; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Playfair Display', serif; font-weight: 700; }
        .hero-gradient { background: linear-gradient(135deg, <?php echo e($siteSettings['colors']['primary_color'] ?? '#1a1a2e'); ?> 0%, #2d2d44 100%); }
        .video-thumbnail { position: relative; overflow: hidden; aspect-ratio: 16/9; background: #2d2d44; border-radius: 8px; transition: transform 0.3s ease; }
        .video-thumbnail:hover { transform: scale(1.02); }
        .play-button { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 60px; height: 60px; background: rgba(244, 164, 96, 0.9); border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: background 0.3s ease; z-index: 10; }
        .play-button:hover { background: rgba(244, 164, 96, 1); }
        .play-button::after { content: ''; width: 0; height: 0; border-left: 15px solid white; border-top: 10px solid transparent; border-bottom: 10px solid transparent; margin-left: 3px; }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-4px); box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1); }
        .section-title { font-size: 3rem; font-weight: 700; line-height: 1.2; margin-bottom: 1rem; }
        .accent-line { width: 60px; height: 4px; background: <?php echo e($siteSettings['colors']['secondary_color'] ?? '#f4a460'); ?>; border-radius: 2px; margin-bottom: 2rem; }
        .testimonial-card { background: white; padding: 2rem; border-radius: 8px; border-left: 4px solid <?php echo e($siteSettings['colors']['secondary_color'] ?? '#f4a460'); ?>; }
        .price-card { background: white; padding: 2.5rem; border-radius: 8px; border: 2px solid <?php echo e($siteSettings['colors']['accent_color'] ?? '#e8d5c4'); ?>; transition: all 0.3s ease; }
        .price-card.featured { border-color: <?php echo e($siteSettings['colors']['secondary_color'] ?? '#f4a460'); ?>; box-shadow: 0 20px 40px rgba(244, 164, 96, 0.15); transform: scale(1.05); }
        .btn-primary { background: <?php echo e($siteSettings['colors']['secondary_color'] ?? '#f4a460'); ?>; color: white; padding: 0.75rem 2rem; border-radius: 4px; border: none; font-weight: 600; cursor: pointer; transition: all 0.3s ease; text-decoration: none; display: inline-block; }
        .btn-primary:hover { background: #e08b3a; transform: translateY(-2px); }
        .btn-secondary { background: white; color: <?php echo e($siteSettings['colors']['primary_color'] ?? '#1a1a2e'); ?>; padding: 0.75rem 2rem; border-radius: 4px; border: 2px solid <?php echo e($siteSettings['colors']['primary_color'] ?? '#1a1a2e'); ?>; font-weight: 600; cursor: pointer; transition: all 0.3s ease; text-decoration: none; display: inline-block; }
        .btn-secondary:hover { background: <?php echo e($siteSettings['colors']['primary_color'] ?? '#1a1a2e'); ?>; color: white; }
        .nav-link { color: <?php echo e($siteSettings['header']['header_text_color'] ?? '#1a1a2e'); ?>; text-decoration: none; font-weight: 500; transition: color 0.3s ease; }
        .nav-link:hover { color: <?php echo e($siteSettings['colors']['secondary_color'] ?? '#f4a460'); ?>; }
        @media (max-width: 768px) { .section-title { font-size: 2rem; } }
        .slide { opacity: 0; transition: opacity 1s ease-in-out; position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
        .text-secondary { color: <?php echo e($siteSettings['colors']['secondary_color'] ?? '#f4a460'); ?>; }
        .bg-secondary { background-color: <?php echo e($siteSettings['colors']['secondary_color'] ?? '#f4a460'); ?>; }
        .hover\:text-secondary:hover { color: <?php echo e($siteSettings['colors']['secondary_color'] ?? '#f4a460'); ?>; }
    </style>
    <?php echo $__env->yieldContent('extra-css'); ?>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="bg-light">
    <?php echo $__env->make('components.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <main><?php echo $__env->yieldContent('content'); ?></main>
    <?php echo $__env->make('components.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
    <?php echo $__env->yieldContent('extra-js'); ?>
</body>
</html><?php /**PATH C:\Users\jdira\Herd\video_portfolio\resources\views\layouts\app.blade.php ENDPATH**/ ?>