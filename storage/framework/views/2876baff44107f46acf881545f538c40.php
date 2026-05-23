<?php $__env->startSection('title', $client->name . ' Gallery - FrameFlow'); ?>

<?php $__env->startSection('content'); ?>
<div class="px-6 py-20">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-12">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($client->logo): ?>
                <img src="<?php echo e($client->logo_url); ?>" alt="<?php echo e($client->name); ?>" class="h-24 mx-auto mb-6 object-contain">
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <div class="accent-line mx-auto"></div>
            <h1 class="section-title"><?php echo e($client->name); ?></h1>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($client->description): ?>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto"><?php echo e($client->description); ?></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <a href="<?php echo e(route('gallery')); ?>" class="btn-secondary mt-6">Back to Gallery</a>
        </div>

        <!-- Images Grid -->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($images->count() > 0): ?>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div class="relative group aspect-square overflow-hidden rounded-lg bg-gray-100 cursor-pointer" onclick="openLightbox('<?php echo e($image->image_url); ?>', '<?php echo e($image->caption ?? ''); ?>')">
                <img src="<?php echo e($image->image_url); ?>" alt="<?php echo e($image->caption ?? $client->name); ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($image->caption): ?>
                <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <p class="text-white text-center p-4"><?php echo e($image->caption); ?></p>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
        <?php else: ?>
        <div class="text-center py-20">
            <p class="text-gray-500">No images for this client yet.</p>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>

<!-- Lightbox -->
<div id="lightbox" class="fixed inset-0 bg-black/95 z-50 hidden items-center justify-center p-4" onclick="closeLightbox()">
    <button class="absolute top-4 right-4 text-white text-4xl hover:text-secondary z-10" onclick="event.stopPropagation(); closeLightbox();">&times;</button>
    <img id="lightbox-img" src="" alt="" class="max-w-full max-h-[90vh] object-contain">
    <p id="lightbox-caption" class="text-white text-center mt-4"></p>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
function openLightbox(src, caption) {
    document.getElementById('lightbox-img').src = src;
    document.getElementById('lightbox-caption').textContent = caption;
    document.getElementById('lightbox').classList.remove('hidden');
    document.getElementById('lightbox').classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    document.getElementById('lightbox').classList.add('hidden');
    document.getElementById('lightbox').classList.remove('flex');
    document.body.style.overflow = 'auto';
}
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jdira\Herd\video_portfolio\resources\views\gallery\show.blade.php ENDPATH**/ ?>