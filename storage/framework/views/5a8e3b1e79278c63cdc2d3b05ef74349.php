<?php $__env->startPush('styles'); ?>
<style>
    .gallery-card {
        background: var(--surface);
        border: 1px solid var(--border);
        transition: all 0.4s ease;
        cursor: pointer;
        text-decoration: none;
        display: block;
    }

    .gallery-card:hover {
        border-color: rgba(234, 88, 12, 0.3);
        box-shadow: 0 40px 80px rgba(0,0,0,0.6);
        transform: translateY(-4px);
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

<?php $__env->startSection('title', 'Client Gallery — Oumalk'); ?>

<?php $__env->startSection('content'); ?>
<div style="padding: 10rem 1.5rem 6rem;">
    <div class="max-w-7xl mx-auto">
        <div class="section-fade text-center" style="margin-bottom: 4rem;">
            <div class="accent-line" style="margin: 0 auto 1.5rem;"></div>
            <h1 class="section-title">Client Gallery</h1>
            <p style="color: var(--muted);">Browse our portfolio of work organized by client</p>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($clients->count() > 0): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <a href="<?php echo e(route('gallery.show', $client->slug)); ?>" class="gallery-card card-fade" style="transition-delay: <?php echo e($loop->index * 80); ?>ms;">
                <div style="position: relative; overflow: hidden; aspect-ratio: 1/1;">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($client->logo): ?>
                        <img src="<?php echo e($client->logo_url); ?>" alt="<?php echo e($client->name); ?>" class="w-full h-full object-contain p-8" style="transition: transform 0.6s ease;">
                    <?php else: ?>
                        <div class="w-full h-full flex items-center justify-center" style="background: rgba(234, 88, 12, 0.05);">
                            <span style="font-family: 'Bebas Neue', sans-serif; font-size: 3rem; color: rgba(234, 88, 12, 0.3);"><?php echo e(strtoupper(substr($client->name, 0, 1))); ?></span>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <div style="position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; background: rgba(234, 88, 12, 0.9); opacity: 0; transition: opacity 0.3s ease;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0'">
                        <div style="color: white; text-align: center;">
                            <p style="font-family: 'Bebas Neue', sans-serif; font-size: 1.5rem; letter-spacing: 0.03em;"><?php echo e($client->images_count); ?> images</p>
                            <p style="font-size: 0.85rem; opacity: 0.8;">Click to view</p>
                        </div>
                    </div>
                </div>
                <div style="padding: 1.25rem; text-align: center;">
                    <h3 style="font-family: 'Bebas Neue', sans-serif; font-size: 1.6rem; color: var(--orange); letter-spacing: 0.03em;"><?php echo e($client->name); ?></h3>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($client->description): ?>
                        <p style="color: var(--muted); font-size: 0.85rem; margin-top: 0.25rem;"><?php echo e($client->description); ?></p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
        <?php else: ?>
        <div style="text-align: center; padding: 4rem 2rem;">
            <p style="color: var(--muted);">No gallery clients yet.</p>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jdira\Herd\video_portfolio\resources\views\gallery\index.blade.php ENDPATH**/ ?>