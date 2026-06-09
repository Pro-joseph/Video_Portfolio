<?php $__env->startPush('styles'); ?>
<style>
    .gallery-image {
        background: var(--surface);
        border: 1px solid var(--border);
        transition: all 0.4s ease;
        cursor: pointer;
        overflow: hidden;
    }

    .gallery-image:hover {
        border-color: rgba(234, 88, 12, 0.3);
        box-shadow: 0 40px 80px rgba(0,0,0,0.6);
        transform: scale(1.02);
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
    document.querySelectorAll('.section-fade').forEach(function(el) { observer.observe(el); });
});
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('title', $client->name . ' Gallery — Oumalk'); ?>

<?php $__env->startSection('content'); ?>
<div style="padding: 10rem 1.5rem 6rem;">
    <div class="max-w-7xl mx-auto">
        <div class="section-fade text-center" style="margin-bottom: 3rem;">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($client->logo): ?>
                <img src="<?php echo e($client->logo_url); ?>" alt="<?php echo e($client->name); ?>" style="height: 5rem; margin: 0 auto 1.5rem; object-fit: contain;">
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <div class="accent-line" style="margin: 0 auto 1.5rem;"></div>
            <h1 class="section-title"><?php echo e($client->name); ?></h1>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($client->description): ?>
                <p style="color: var(--muted); margin-top: 0.5rem;"><?php echo e($client->description); ?></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <a href="<?php echo e(route('gallery')); ?>" class="btn-secondary" style="margin-top: 2rem; display: inline-flex;">Back to Gallery</a>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($images->count() > 0): ?>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div class="gallery-image relative group aspect-square cursor-pointer section-fade" onclick="openLightbox('<?php echo e($image->image_url); ?>', '<?php echo e($image->caption ?? ''); ?>')" style="transition-delay: <?php echo e($loop->index * 50); ?>ms;">
                <img src="<?php echo e($image->image_url); ?>" alt="<?php echo e($image->caption ?? $client->name); ?>" class="w-full h-full object-cover" style="transition: transform 0.6s ease;">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($image->caption): ?>
                <div style="position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; background: var(--overlay-bg); opacity: 0; transition: opacity 0.3s ease;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0'">
                    <p style="color: white; text-align: center; padding: 1rem; font-size: 0.9rem;"><?php echo e($image->caption); ?></p>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
        <?php else: ?>
        <div style="text-align: center; padding: 4rem 2rem;">
            <p style="color: var(--muted);">No images for this client yet.</p>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>

<div id="lightbox" style="position: fixed; inset: 0; z-index: 999; display: none; align-items: center; justify-content: center; padding: 2rem; background: var(--overlay-heavy); cursor: pointer;" onclick="closeLightbox()">
    <button style="position: absolute; top: 1rem; right: 1rem; color: white; font-size: 2.5rem; background: none; border: none; cursor: pointer; z-index: 10;" onclick="event.stopPropagation(); closeLightbox();">&times;</button>
    <img id="lightbox-img" src="" alt="" style="max-width: 100%; max-height: 90vh; object-fit: contain;">
    <p id="lightbox-caption" style="color: white; text-align: center; margin-top: 1rem;"></p>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
function openLightbox(src, caption) {
    document.getElementById('lightbox-img').src = src;
    document.getElementById('lightbox-caption').textContent = caption;
    var lb = document.getElementById('lightbox');
    lb.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    var lb = document.getElementById('lightbox');
    lb.style.display = 'none';
    document.body.style.overflow = 'auto';
}
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jdira\Herd\video_portfolio\resources\views\gallery\show.blade.php ENDPATH**/ ?>