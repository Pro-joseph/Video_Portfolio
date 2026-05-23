<?php $__env->startSection('title', 'Portfolio - FrameFlow'); ?>

<?php $__env->startSection('content'); ?>
<div class="pt-32 pb-20 px-6">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="mb-16">
            <div class="accent-line"></div>
            <h1 class="section-title">Our Work</h1>
            <p class="text-gray-600 text-xl max-w-2xl">A collection of our finest work across various genres and industries.</p>
        </div>

        <!-- Category Filter -->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($categories->count() > 0): ?>
        <div class="flex flex-wrap gap-4 mb-12">
            <button class="filter-btn px-6 py-3 bg-secondary text-white font-medium rounded" data-category="">All</button>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <button class="filter-btn px-6 py-3 border border-gray-300 text-gray-600 hover:border-secondary hover:text-secondary transition-colors rounded capitalize" data-category="<?php echo e($cat->slug); ?>"><?php echo e($cat->name); ?></button>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <!-- Projects Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="projects-grid">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <a href="<?php echo e(route('portfolio.show', $project)); ?>" class="project-card group" data-category="<?php echo e($project->category?->slug ?? ''); ?>">
                    <div class="video-thumbnail card-hover">
                        <img src="<?php echo e($project->cover_image ? (str_starts_with($project->cover_image, 'http') ? $project->cover_image : asset($project->cover_image)) : 'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?w=600&q=80'); ?>" alt="<?php echo e($project->title); ?>" class="w-full h-full object-cover">
                        <div class="play-button opacity-0 group-hover:opacity-100"></div>
                    </div>
                    <h3 class="text-xl font-bold mt-4 group-hover:text-secondary transition-colors"><?php echo e($project->title); ?></h3>
                    <p class="text-gray-500 text-sm capitalize"><?php echo e($project->category?->name ?? 'Project'); ?></p>
                </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500 text-lg">No projects yet.</p>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const projectCards = document.querySelectorAll('.project-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const category = this.dataset.category;

            filterBtns.forEach(b => {
                b.classList.remove('bg-secondary', 'text-white');
                b.classList.add('border', 'border-gray-300', 'text-gray-600');
            });
            this.classList.remove('border', 'border-gray-300', 'text-gray-600');
            this.classList.add('bg-secondary', 'text-white');

            projectCards.forEach(card => {
                const cardCategory = card.dataset.category;
                if (category === '' || cardCategory === category) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jdira\Herd\video_portfolio\resources\views\portfolio.blade.php ENDPATH**/ ?>