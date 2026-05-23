

<?php $__env->startSection('title', 'Research Log | ' . $post->title); ?>

<?php $__env->startSection('content'); ?>
<main class="pt-32 pb-24 bg-background">
    <article class="max-w-4xl mx-auto px-margin-mobile space-y-12">
        <header class="space-y-6">
            <span class="technical-hud text-tertiary block">// RESEARCH_LOG_<?php echo e($post->id); ?> // <?php echo e($post->published_at?->format('Y.m.d')); ?></span>
            <h1 class="font-display-hero text-5xl md:text-7xl text-white uppercase leading-none"><?php echo e($post->title); ?></h1>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->cover_image): ?>
                <div class="aspect-video glass border border-white/5 overflow-hidden">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(str_starts_with($post->cover_image, 'http')): ?>
                    <img src="<?php echo e($post->cover_image); ?>" class="w-full h-full object-cover grayscale">
                    <?php else: ?>
                    <img src="<?php echo e(asset('images/' . $post->cover_image)); ?>" class="w-full h-full object-cover grayscale">
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </header>

        <div class="font-body-md text-secondary text-xl leading-relaxed space-y-8 prose prose-invert max-w-none">
            <?php echo $post->body; ?>

        </div>

        <footer class="pt-12 border-t border-white/5">
            <a href="<?php echo e(route('blog')); ?>" class="technical-hud text-tertiary flex items-center gap-2 hover:text-white transition-colors">
                <span class="material-symbols-outlined text-sm">arrow_back</span> RETURN_TO_ARCHIVE
            </a>
        </footer>
    </article>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jdira\Herd\video_portfolio\resources\views\blog\show.blade.php ENDPATH**/ ?>