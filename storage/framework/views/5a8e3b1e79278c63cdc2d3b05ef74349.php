<?php $__env->startSection('title', 'Client Gallery - FrameFlow'); ?>

<?php $__env->startSection('content'); ?>
<div class="px-6 py-20">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <div class="accent-line mx-auto"></div>
            <h1 class="section-title">Client Gallery</h1>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Browse our portfolio of work organized by client</p>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($clients->count() > 0): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <a href="<?php echo e(route('gallery.show', $client->slug)); ?>" class="group">
                <div class="relative overflow-hidden rounded-lg aspect-square bg-gray-100">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($client->logo): ?>
                        <img src="<?php echo e($client->logo_url); ?>" alt="<?php echo e($client->name); ?>" class="w-full h-full object-contain p-8 group-hover:scale-105 transition-transform duration-300">
                    <?php else: ?>
                        <div class="w-full h-full flex items-center justify-center bg-primary/10">
                            <span class="text-4xl font-bold text-primary/40"><?php echo e(strtoupper(substr($client->name, 0, 1))); ?></span>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <div class="absolute inset-0 bg-primary/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <div class="text-white text-center">
                            <p class="font-bold text-lg"><?php echo e($client->images_count); ?> images</p>
                            <p class="text-sm">Click to view</p>
                        </div>
                    </div>
                </div>
                <h3 class="text-xl font-bold mt-4 text-center group-hover:text-secondary transition-colors"><?php echo e($client->name); ?></h3>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($client->description): ?>
                    <p class="text-gray-500 text-sm text-center mt-1 line-clamp-2"><?php echo e($client->description); ?></p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
        <?php else: ?>
        <div class="text-center py-20">
            <p class="text-gray-500">No gallery clients yet. Add clients in the admin panel.</p>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jdira\Herd\video_portfolio\resources\views\gallery\index.blade.php ENDPATH**/ ?>