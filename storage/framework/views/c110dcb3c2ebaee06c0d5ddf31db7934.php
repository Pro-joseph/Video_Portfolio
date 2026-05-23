

<?php $__env->startSection('title', 'Cinematic Research | Blog'); ?>

<?php $__env->startSection('content'); ?>
<main class="pt-32 pb-24 bg-background">
    <div class="px-margin-mobile md:px-margin-desktop space-y-16">
        <header class="space-y-6">
            <span class="technical-hud text-tertiary block">// RESEARCH_LOGS_ACTIVE</span>
            <h1 class="font-display-hero text-6xl md:text-8xl text-white uppercase leading-none">Cinematic Research</h1>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <article class="glass border border-white/5 p-8 space-y-6 group cursor-pointer hover:border-tertiary transition-colors">
                    <span class="technical-hud text-tertiary text-[10px]"><?php echo e($post->published_at?->format('Y.m.d')); ?></span>
                    <h2 class="font-display-hero text-2xl text-white uppercase group-hover:text-tertiary transition-colors"><?php echo e($post->title); ?></h2>
                    <p class="font-body-md text-secondary line-clamp-3">
                        <?php echo e(Str::limit(strip_tags($post->body), 150)); ?>

                    </p>
                    <a href="<?php echo e(route('blog.show', $post)); ?>" class="technical-hud text-white group-hover:text-tertiary flex items-center gap-2">
                        READ_FULL_LOG <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                </article>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <div class="col-span-full py-24 text-center border border-dashed border-white/10">
                    <p class="technical-hud text-secondary italic">NO_RESEARCH_LOGS_FOUND_IN_ARCHIVE</p>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jdira\Herd\video_portfolio\resources\views\blog\index.blade.php ENDPATH**/ ?>