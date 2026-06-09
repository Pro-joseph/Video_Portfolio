<!DOCTYPE html>
<html lang="en">
<head>
<script>if(localStorage.getItem('theme')==='light')document.documentElement.className='light'</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Oumalk - Professional Videography'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('description', 'Professional videography services for weddings, events, and commercial content'); ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        orange: '#ea580c',
                        bg: '#0a0a0a',
                        surface: '#111111',
                        muted: '#525252',
                        background: '#0a0a0a',
                        tertiary: '#ea580c',
                        secondary: '#525252',
                    },
                    fontFamily: {
                        display: ['Bebas Neue', 'sans-serif'],
                        body: ['DM Sans', 'sans-serif'],
                        'display-hero': ['Bebas Neue', 'sans-serif'],
                        'body-md': ['DM Sans', 'sans-serif'],
                    },
                },
            },
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --orange: #ea580c;
            --orange-dim: rgba(234, 88, 12, 0.15);
            --bg: #0a0a0a;
            --surface: #111111;
            --border: rgba(255,255,255,0.06);
            --text: #fafafa;
            --muted: #525252;
            --header-bg: rgba(10,10,10,0.85);
            --overlay-bg: rgba(10,10,10,0.7);
            --overlay-heavy: rgba(10,10,10,0.95);
        }

        .light {
            --bg: #fafafa;
            --surface: #ffffff;
            --border: rgba(0,0,0,0.08);
            --text: #18181b;
            --muted: #a1a1aa;
            --header-bg: rgba(250,250,250,0.85);
            --overlay-bg: rgba(0,0,0,0.5);
            --overlay-heavy: rgba(0,0,0,0.9);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { font-family: 'DM Sans', sans-serif; background: var(--bg); color: var(--text); min-height: 100vh; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Bebas Neue', sans-serif; font-weight: 400; letter-spacing: 0.02em; color: var(--text); }
        a, button { cursor: pointer; }

        .section-title { font-family: 'Bebas Neue', sans-serif; font-size: clamp(3rem, 6vw, 5rem); line-height: 0.9; color: var(--text); letter-spacing: 0.02em; margin-bottom: 1rem; }
        .accent-line { width: 40px; height: 1px; background: var(--orange); margin-bottom: 1.5rem; }

        .btn-primary {
            display: inline-flex; align-items: center; gap: 0.75rem;
            padding: 0.75rem 2rem;
            background: var(--orange); color: white;
            font-family: 'DM Sans', sans-serif; font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .btn-primary:hover { background: #c2410c; }

        .btn-secondary {
            display: inline-flex; align-items: center; gap: 0.75rem;
            padding: 0.75rem 2rem;
            background: transparent; color: var(--text);
            font-family: 'DM Sans', sans-serif; font-weight: 500;
            border: 1px solid var(--border);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .btn-secondary:hover { background: var(--orange-dim); border-color: var(--orange); }

        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .card:hover {
            border-color: rgba(234, 88, 12, 0.3);
            box-shadow: 0 40px 80px rgba(0,0,0,0.6), 0 0 0 1px rgba(234, 88, 12, 0.15);
        }

        .nav-link {
            font-family: 'DM Sans', sans-serif;
            font-weight: 500;
            font-size: 0.85rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--muted);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .nav-link:hover { color: var(--orange); }

        @media (max-width: 768px) { .section-title { font-size: 2.5rem; } }

        .slide { opacity: 0; transition: opacity 1s ease-in-out; position: absolute; top: 0; left: 0; width: 100%; height: 100%; }

        @keyframes fadeUp {
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes ringPulse {
            0%, 100% { transform: scale(1); opacity: 0.4; }
            50% { transform: scale(1.3); opacity: 0; }
        }

        @keyframes spinSlow {
            to { transform: rotate(360deg); }
        }

        .cursor-dot {
            position: fixed; width: 8px; height: 8px;
            background: var(--orange); border-radius: 50%;
            pointer-events: none; z-index: 9999;
            transform: translate(-50%, -50%);
            transition: transform 0.1s ease, opacity 0.3s ease;
        }
        .cursor-ring {
            position: fixed; width: 36px; height: 36px;
            border: 1px solid rgba(234,88,12,0.5); border-radius: 50%;
            pointer-events: none; z-index: 9998;
            transform: translate(-50%, -50%);
            transition: transform 0.18s ease, width 0.3s ease, height 0.3s ease, opacity 0.3s ease;
        }
        .cursor-ring.expanded { width: 64px; height: 64px; border-color: rgba(234,88,12,0.8); }

        .noise::after {
            content: '';
            position: fixed; inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.035'/%3E%3C/svg%3E");
            pointer-events: none; z-index: 100; opacity: 0.4;
        }
        .glass { background: rgba(17,17,17,0.6); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); }
        .technical-hud { font-family: 'Courier New', monospace; font-size: 0.75rem; letter-spacing: 0.1em; text-transform: uppercase; }
        .px-margin-mobile { padding-left: 1.5rem; padding-right: 1.5rem; }
        @media (min-width: 768px) { .px-margin-desktop { padding-left: 3rem; padding-right: 3rem; } }
        @media (hover: none) { .cursor-dot, .cursor-ring { display: none; } }
    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <?php echo $__env->yieldContent('extra-css'); ?>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    <div class="noise">
        <div class="cursor-dot" id="cursorDot"></div>
        <div class="cursor-ring" id="cursorRing"></div>
        <?php echo $__env->make('components.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <main><?php echo $__env->yieldContent('content'); ?></main>
        <?php echo $__env->make('components.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    <?php echo $__env->yieldPushContent('scripts'); ?>
    <?php echo $__env->yieldContent('extra-js'); ?>
    <script>
    function toggleTheme() {
        var html = document.documentElement;
        var isLight = html.classList.toggle('light');
        localStorage.setItem('theme', isLight ? 'light' : 'dark');
        updateThemeIcon(isLight);
    }
    function updateThemeIcon(isLight) {
        var icons = document.querySelectorAll('#themeIcon, #themeIconMobile');
        icons.forEach(function(icon) {
            icon.setAttribute('d', isLight
                ? 'M12 3a6 6 0 0 0 9 9 6 6 0 1 1-9-9Z'
                : 'M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z');
        });
    }
    document.addEventListener('DOMContentLoaded', function() {
        updateThemeIcon(document.documentElement.classList.contains('light'));
    });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var dot = document.getElementById('cursorDot');
        var ring = document.getElementById('cursorRing');
        if (dot && ring) {
            var mx = 0, my = 0, rx = 0, ry = 0;
            document.addEventListener('mousemove', function (e) {
                mx = e.clientX; my = e.clientY;
                dot.style.left = mx + 'px';
                dot.style.top = my + 'px';
            });
            (function animRing() {
                rx += (mx - rx) * 0.12;
                ry += (my - ry) * 0.12;
                ring.style.left = rx + 'px';
                ring.style.top = ry + 'px';
                requestAnimationFrame(animRing);
            })();
            document.querySelectorAll('a, button, .card, .pf-card, .filter-pill, .service-card, .gallery-card, .reel-card, .project-card, .hero-dot').forEach(function (el) {
                el.addEventListener('mouseenter', function () { ring.classList.add('expanded'); });
                el.addEventListener('mouseleave', function () { ring.classList.remove('expanded'); });
            });
        }
    });
    </script>
</body>
</html><?php /**PATH C:\Users\jdira\Herd\video_portfolio\resources\views\layouts\app.blade.php ENDPATH**/ ?>