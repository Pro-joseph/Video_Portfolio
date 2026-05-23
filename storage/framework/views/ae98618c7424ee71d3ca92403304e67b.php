<?php $__env->startPush('styles'); ?>
<style>
    .reel-card {
        position: relative;
        overflow: hidden;
        background: var(--surface);
        border: 1px solid var(--border);
        transition: all 0.4s ease;
        cursor: pointer;
        text-decoration: none;
        display: block;
    }

    .reel-card:hover {
        border-color: rgba(234, 88, 12, 0.3);
        box-shadow: 0 40px 80px rgba(0,0,0,0.6), 0 0 0 1px rgba(234, 88, 12, 0.15);
        transform: translateY(-4px);
    }

    .reel-play {
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%, -50%) scale(0.7);
        width: 72px; height: 72px;
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

    .reel-play::before {
        content: '';
        width: 0; height: 0;
        border-top: 11px solid transparent;
        border-bottom: 11px solid transparent;
        border-left: 18px solid white;
        margin-left: 4px;
    }

    .reel-play::after {
        content: '';
        position: absolute;
        inset: -8px;
        border-radius: 50%;
        border: 1px solid rgba(234, 88, 12, 0.4);
        animation: ringPulse 2s ease-in-out infinite;
    }

    .reel-card:hover .reel-play {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
    }

    .section-fade {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }

    .section-fade.in-view {
        opacity: 1;
        transform: translateY(0);
    }

    .card-fade {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }

    .card-fade.in-view {
        opacity: 1;
        transform: translateY(0);
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('in-view');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    document.querySelectorAll('.section-fade, .card-fade').forEach(function(el) { observer.observe(el); });
});
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('title', 'Reels — FrameFlow'); ?>

<?php $__env->startSection('content'); ?>
<div style="padding: 10rem 1.5rem 6rem;">
    <div class="max-w-7xl mx-auto">
        <div class="section-fade" style="margin-bottom: 4rem;">
            <div class="accent-line"></div>
            <h1 class="section-title">Reels</h1>
            <p style="color: var(--muted); max-width: 480px;">Short-form video highlights from our latest projects.</p>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($reels->count() > 0): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $reels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <a href="<?php echo e(route('portfolio.show', $reel)); ?>" class="reel-card card-fade" style="transition-delay: <?php echo e($loop->index * 100); ?>ms;">
                    <div style="aspect-ratio: 9/16; position: relative; overflow: hidden;">
                        <?php
                            $thumb = null;
                            $firstMedia = $reel->media->first();

                            if ($reel->cover_image) {
                                $cover = $reel->cover_image;
                                if (str_contains($cover, 'drive.google.com/file/d/')) {
                                    preg_match('/\/d\/([^\/]+)/', $cover, $matches);
                                    if (isset($matches[1])) {
                                        $thumb = 'https://drive.google.com/uc?export=view&id=' . $matches[1];
                                    }
                                }
                                elseif (!str_starts_with($cover, 'http') && !str_starts_with($cover, '/')) {
                                    $thumb = asset('storage/' . $cover);
                                }
                                elseif (filter_var(trim($cover), FILTER_VALIDATE_URL)) {
                                    $thumb = $cover;
                                }
                            }

                            if (!$thumb && $firstMedia && $firstMedia->video_url) {
                                $url = $firstMedia->video_url;
                                if (str_contains($url, 'youtube.com/shorts/')) {
                                    preg_match('/shorts\/([a-zA-Z0-9_-]+)/', $url, $matches);
                                    if (isset($matches[1])) {
                                        $thumb = 'https://img.youtube.com/vi/' . $matches[1] . '/mqdefault.jpg';
                                    }
                                }
                                elseif (preg_match('/[?&]v=([^&]+)/', $url, $matches) || preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
                                    $youtubeId = $matches[1] ?? $matches[2] ?? null;
                                    if ($youtubeId) {
                                        $thumb = 'https://img.youtube.com/vi/' . $youtubeId . '/mqdefault.jpg';
                                    }
                                }
                            }

                            $thumb = $thumb ?: 'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?w=400&q=80';
                        ?>
                        <img src="<?php echo e($thumb); ?>" alt="<?php echo e($reel->title); ?>" class="w-full h-full object-cover" style="transition: transform 0.6s ease;" onerror="this.src='https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?w=400&q=80'">
                        <div style="position: absolute; inset: 0; background: linear-gradient(to top, var(--overlay-bg) 0%, transparent 50%);"></div>
                        <div style="position: absolute; bottom: 0; left: 0; right: 0; padding: 1rem;">
                            <h3 style="font-family: 'Bebas Neue', sans-serif; font-size: 1.4rem; color: white; letter-spacing: 0.03em;"><?php echo e($reel->title); ?></h3>
                        </div>
                        <div class="reel-play"></div>
                    </div>
                </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
        <?php else: ?>
        <div style="text-align: center; padding: 4rem 2rem;">
            <p style="color: var(--muted);">No reels available yet.</p>
            <p style="color: var(--muted); font-size: 0.9rem; margin-top: 0.5rem;">Check back soon for new content!</p>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jdira\Herd\video_portfolio\resources\views/reels.blade.php ENDPATH**/ ?>