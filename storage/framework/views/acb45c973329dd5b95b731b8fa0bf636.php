<?php $__env->startPush('styles'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@300;400;500&display=swap');

    :root {
        --orange: #ea580c;
        --orange-dim: rgba(234, 88, 12, 0.15);
        --bg: #0a0a0a;
        --surface: #111111;
        --border: rgba(255,255,255,0.06);
        --text: #fafafa;
        --muted: #525252;
    }

    * { box-sizing: border-box; }

    body { background: var(--bg); }

    /* ── PAGE WRAPPER ── */
    .pf-page {
        background: var(--bg);
        min-height: 100vh;
        overflow-x: hidden;
    }

    /* ── HERO TITLE SECTION ── */
    .pf-hero {
        padding: 10rem 2rem 4rem;
        position: relative;
        overflow: hidden;
    }

    .pf-hero::before {
        content: 'WORK';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -55%);
        font-family: 'Bebas Neue', sans-serif;
        font-size: clamp(8rem, 22vw, 20rem);
        color: transparent;
        -webkit-text-stroke: 1px rgba(255,255,255,0.04);
        pointer-events: none;
        white-space: nowrap;
        z-index: 0;
        letter-spacing: 0.05em;
    }

    .pf-hero-inner {
        max-width: 1400px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    .pf-eyebrow {
        font-family: 'DM Sans', sans-serif;
        font-size: 0.7rem;
        font-weight: 500;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        color: var(--orange);
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
        opacity: 0;
        transform: translateY(20px);
        animation: fadeUp 0.8s ease forwards 0.2s;
    }

    .pf-eyebrow::before {
        content: '';
        width: 40px;
        height: 1px;
        background: var(--orange);
    }

    .pf-title {
        font-family: 'Bebas Neue', sans-serif;
        font-size: clamp(4rem, 10vw, 9rem);
        line-height: 0.9;
        color: var(--text);
        letter-spacing: 0.02em;
        margin-bottom: 2rem;
        opacity: 0;
        transform: translateY(30px);
        animation: fadeUp 0.9s ease forwards 0.35s;
    }

    .pf-title span {
        color: transparent;
        -webkit-text-stroke: 1px var(--orange);
    }

    .pf-subtitle {
        font-family: 'DM Sans', sans-serif;
        font-size: 1rem;
        color: var(--muted);
        max-width: 480px;
        line-height: 1.7;
        opacity: 0;
        transform: translateY(20px);
        animation: fadeUp 0.9s ease forwards 0.5s;
    }

    /* ── FILTER BAR ── */
    .pf-filters {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem 4rem;
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        opacity: 0;
        animation: fadeUp 0.8s ease forwards 0.7s;
    }

    .filter-pill {
        font-family: 'DM Sans', sans-serif;
        font-size: 0.8rem;
        font-weight: 500;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        padding: 0.55rem 1.4rem;
        border: 1px solid var(--border);
        background: transparent;
        color: var(--muted);
        cursor: pointer;
        border-radius: 100px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .filter-pill::before {
        content: '';
        position: absolute;
        inset: 0;
        background: var(--orange);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: inherit;
        z-index: -1;
    }

    .filter-pill:hover,
    .filter-pill.active {
        color: white;
        border-color: var(--orange);
    }

    .filter-pill:hover::before,
    .filter-pill.active::before {
        transform: scaleX(1);
    }

    /* ── GRID ── */
    .pf-grid {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem 8rem;
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        gap: 1.5rem;
    }

    /* alternating layout — cards span diff columns for editorial feel */
    .pf-card:nth-child(3n+1) { grid-column: span 7; }
    .pf-card:nth-child(3n+2) { grid-column: span 5; }
    .pf-card:nth-child(3n+3) { grid-column: span 12; }

    @media (max-width: 900px) {
        .pf-card:nth-child(n) { grid-column: span 12; }
    }

    /* ── CARD ── */
    .pf-card {
        position: relative;
        background: var(--surface);
        border: 1px solid var(--border);
        overflow: hidden;
        cursor: pointer;
        opacity: 0;
        transform: translateY(60px) rotateX(8deg);
        transition:
            transform 0.7s cubic-bezier(0.23, 1, 0.32, 1),
            box-shadow 0.5s ease,
            border-color 0.4s ease;
        transform-style: preserve-3d;
        perspective: 1000px;
        border-radius: 2px;
        text-decoration: none;
        display: block;
    }

    .pf-card.in-view {
        opacity: 1;
        transform: translateY(0) rotateX(0deg);
    }

    .pf-card:hover {
        border-color: rgba(234, 88, 12, 0.3);
        box-shadow:
            0 40px 80px rgba(0,0,0,0.6),
            0 0 0 1px rgba(234, 88, 12, 0.15),
            inset 0 1px 0 rgba(255,255,255,0.05);
        transform: translateY(-6px) scale(1.005);
    }

    /* tall aspect for big cards, square for small */
    .pf-card:nth-child(3n+1) .pf-card-media { aspect-ratio: 16/10; }
    .pf-card:nth-child(3n+2) .pf-card-media { aspect-ratio: 4/5; }
    .pf-card:nth-child(3n+3) .pf-card-media { aspect-ratio: 21/9; }

    .pf-card-media {
        position: relative;
        overflow: hidden;
        width: 100%;
    }

    .pf-card-media img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.9s cubic-bezier(0.23, 1, 0.32, 1), filter 0.5s ease;
        display: block;
    }

    .pf-card:hover .pf-card-media img {
        transform: scale(1.08);
        filter: brightness(0.75);
    }

    /* glare overlay */
    .pf-card-glare {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(255,255,255,0.07) 0%, transparent 60%);
        opacity: 0;
        transition: opacity 0.4s ease;
        pointer-events: none;
        z-index: 2;
    }

    .pf-card:hover .pf-card-glare { opacity: 1; }

    /* play ring */
    .pf-play {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0.7);
        width: 72px;
        height: 72px;
        border-radius: 50%;
        background: rgba(234, 88, 12, 0.9);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        z-index: 3;
        backdrop-filter: blur(4px);
    }

    .pf-play::before {
        content: '';
        width: 0; height: 0;
        border-top: 11px solid transparent;
        border-bottom: 11px solid transparent;
        border-left: 18px solid white;
        margin-left: 4px;
    }

    .pf-play::after {
        content: '';
        position: absolute;
        inset: -8px;
        border-radius: 50%;
        border: 1px solid rgba(234, 88, 12, 0.4);
        animation: ringPulse 2s ease-in-out infinite;
    }

    .pf-card:hover .pf-play {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
    }

    /* info bar */
    .pf-card-info {
        padding: 1.5rem 1.75rem;
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 1rem;
        background: var(--surface);
        position: relative;
    }

    .pf-card-info::before {
        content: '';
        position: absolute;
        top: 0; left: 1.75rem; right: 1.75rem;
        height: 1px;
        background: var(--border);
    }

    .pf-card-cat {
        font-family: 'DM Sans', sans-serif;
        font-size: 0.65rem;
        font-weight: 500;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: var(--orange);
        margin-bottom: 0.4rem;
    }

    .pf-card-title {
        font-family: 'Bebas Neue', sans-serif;
        font-size: 1.6rem;
        color: var(--text);
        letter-spacing: 0.03em;
        line-height: 1;
        transition: color 0.3s ease;
    }

    .pf-card:hover .pf-card-title { color: #fff; }

    .pf-card-arrow {
        width: 36px;
        height: 36px;
        border: 1px solid var(--border);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: all 0.3s ease;
        color: var(--muted);
    }

    .pf-card:hover .pf-card-arrow {
        background: var(--orange);
        border-color: var(--orange);
        color: white;
        transform: rotate(45deg);
    }

    /* ── EMPTY STATE ── */
    .pf-empty {
        grid-column: span 12;
        text-align: center;
        padding: 6rem 2rem;
        color: var(--muted);
        font-family: 'DM Sans', sans-serif;
    }

    .pf-empty-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: 0.3;
    }

    /* ── COUNT INDICATOR ── */
    .pf-count {
        font-family: 'DM Sans', sans-serif;
        font-size: 0.75rem;
        color: var(--muted);
        letter-spacing: 0.1em;
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem 2rem;
        opacity: 0;
        animation: fadeUp 0.8s ease forwards 0.9s;
    }

    .pf-count span { color: var(--orange); }

    /* ── CURSOR DOT ── */
    .cursor-dot {
        position: fixed;
        width: 8px; height: 8px;
        background: var(--orange);
        border-radius: 50%;
        pointer-events: none;
        z-index: 9999;
        transform: translate(-50%, -50%);
        transition: transform 0.1s ease, opacity 0.3s ease;
    }

    .cursor-ring {
        position: fixed;
        width: 36px; height: 36px;
        border: 1px solid rgba(234,88,12,0.5);
        border-radius: 50%;
        pointer-events: none;
        z-index: 9998;
        transform: translate(-50%, -50%);
        transition: transform 0.18s ease, width 0.3s ease, height 0.3s ease, opacity 0.3s ease;
    }

    .cursor-ring.expanded {
        width: 64px; height: 64px;
        border-color: rgba(234,88,12,0.8);
    }

    /* ── ANIMATIONS ── */
    @keyframes fadeUp {
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes ringPulse {
        0%, 100% { transform: scale(1); opacity: 0.4; }
        50% { transform: scale(1.3); opacity: 0; }
    }

    /* staggered card delays */
    .pf-card:nth-child(1) { transition-delay: 0ms; }
    .pf-card:nth-child(2) { transition-delay: 80ms; }
    .pf-card:nth-child(3) { transition-delay: 160ms; }
    .pf-card:nth-child(4) { transition-delay: 240ms; }
    .pf-card:nth-child(5) { transition-delay: 320ms; }
    .pf-card:nth-child(6) { transition-delay: 400ms; }
    .pf-card:nth-child(7) { transition-delay: 480ms; }
    .pf-card:nth-child(8) { transition-delay: 560ms; }
    .pf-card:nth-child(9) { transition-delay: 640ms; }

    /* noise grain texture */
    .pf-page::after {
        content: '';
        position: fixed;
        inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.035'/%3E%3C/svg%3E");
        pointer-events: none;
        z-index: 100;
        opacity: 0.4;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('title', 'Portfolio — FrameFlow'); ?>

<?php $__env->startSection('content'); ?>
<div class="pf-page">

    
    <div class="cursor-dot" id="cursorDot"></div>
    <div class="cursor-ring" id="cursorRing"></div>

    
    <section class="pf-hero">
        <div class="pf-hero-inner">
            <p class="pf-eyebrow">Selected Work</p>
            <h1 class="pf-title">Cinematic<br><span>Stories</span></h1>
            <p class="pf-subtitle">A curated collection of our finest work — from intimate weddings to large-scale productions.</p>
        </div>
    </section>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($categories->count() > 0): ?>
    <div class="pf-filters" id="filterBar">
        <button class="filter-pill active" data-category="">All</button>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
        <button class="filter-pill capitalize" data-category="<?php echo e($cat->slug); ?>"><?php echo e($cat->name); ?></button>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div class="pf-count" id="projectCount">
        Showing <span id="visibleCount"><?php echo e($projects->count()); ?></span> of <?php echo e($projects->count()); ?> projects
    </div>

    
    <div class="pf-grid" id="projectsGrid">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
        <a
            href="<?php echo e(route('portfolio.show', $project)); ?>"
            class="pf-card"
            data-category="<?php echo e($project->category?->slug ?? ''); ?>"
        >
            <div class="pf-card-media">
                <img
                    src="<?php echo e($project->cover_image ? (str_starts_with($project->cover_image, 'http') ? $project->cover_image : asset($project->cover_image)) : 'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?w=800&q=80'); ?>"
                    alt="<?php echo e($project->title); ?>"
                    loading="lazy"
                >
                <div class="pf-card-glare"></div>
                <div class="pf-play"></div>
            </div>
            <div class="pf-card-info">
                <div>
                    <p class="pf-card-cat"><?php echo e($project->category?->name ?? 'Project'); ?></p>
                    <h2 class="pf-card-title"><?php echo e($project->title); ?></h2>
                </div>
                <div class="pf-card-arrow">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                        <path d="M2 12L12 2M12 2H4M12 2V10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
        </a>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        <div class="pf-empty">
            <div class="pf-empty-icon">◻</div>
            <p>No projects yet. Check back soon.</p>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function () {

    /* ── SCROLL REVEAL ── */
    const cards = document.querySelectorAll('.pf-card');
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('in-view');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.08, rootMargin: '0px 0px -60px 0px' });

    cards.forEach(card => revealObserver.observe(card));

    /* ── 3D TILT on hover ── */
    cards.forEach(card => {
        card.addEventListener('mousemove', function (e) {
            const rect = this.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width  - 0.5;
            const y = (e.clientY - rect.top)  / rect.height - 0.5;
            this.style.transform = `
                translateY(-6px)
                rotateX(${-y * 6}deg)
                rotateY(${x * 6}deg)
                scale(1.01)
            `;
        });
        card.addEventListener('mouseleave', function () {
            this.style.transform = '';
        });
    });

    /* ── FILTER ── */
    const pills = document.querySelectorAll('.filter-pill');
    const grid  = document.getElementById('projectsGrid');
    const countEl = document.getElementById('visibleCount');

    pills.forEach(pill => {
        pill.addEventListener('click', function () {
            const cat = this.dataset.category;

            pills.forEach(p => p.classList.remove('active'));
            this.classList.add('active');

            let visible = 0;
            cards.forEach(card => {
                const match = cat === '' || card.dataset.category === cat;
                if (match) {
                    card.style.display = 'block';
                    requestAnimationFrame(() => {
                        card.style.opacity = '1';
                        card.style.transform = '';
                    });
                    visible++;
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(30px)';
                    setTimeout(() => { card.style.display = 'none'; }, 350);
                }
            });

            if (countEl) {
                countEl.textContent = visible;
            }
        });
    });

    /* ── CUSTOM CURSOR ── */
    const dot  = document.getElementById('cursorDot');
    const ring = document.getElementById('cursorRing');

    if (dot && ring) {
        let mx = 0, my = 0, rx = 0, ry = 0;

        document.addEventListener('mousemove', e => {
            mx = e.clientX; my = e.clientY;
            dot.style.left  = mx + 'px';
            dot.style.top   = my + 'px';
        });

        (function animRing() {
            rx += (mx - rx) * 0.12;
            ry += (my - ry) * 0.12;
            ring.style.left = rx + 'px';
            ring.style.top  = ry + 'px';
            requestAnimationFrame(animRing);
        })();

        document.querySelectorAll('.pf-card, .filter-pill').forEach(el => {
            el.addEventListener('mouseenter', () => ring.classList.add('expanded'));
            el.addEventListener('mouseleave', () => ring.classList.remove('expanded'));
        });
    }

});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jdira\Herd\video_portfolio\resources\views/portfolio.blade.php ENDPATH**/ ?>