<?php $__env->startSection('title', $project->title . ' - FrameFlow'); ?>

<?php $__env->startSection('content'); ?>
<div class="pt-32 pb-20 px-6">
    <div class="max-w-7xl mx-auto">
        <a href="<?php echo e($project->is_reels ? route('reels') : route('portfolio')); ?>" class="text-gray-600 hover:text-secondary transition-colors">← Back to <?php echo e($project->is_reels ? 'Reels' : 'Portfolio'); ?></a>

        <header class="mt-8 mb-16">
            <h1 class="text-5xl font-bold mb-4"><?php echo e($project->title); ?></h1>
            <p class="text-gray-600 text-xl max-w-2xl"><?php echo e($project->description); ?></p>
        </header>

        <section class="space-y-8">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $project->media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($media->video_url): ?>
                        <?php
                            $embedUrl = null;
                            $videoUrl = $media->video_url;
                            
                            // YouTube Shorts
                            if (str_contains($videoUrl, 'youtube.com/shorts/')) {
                                preg_match('/shorts\/([a-zA-Z0-9_-]+)/', $videoUrl, $matches);
                                if (isset($matches[1])) {
                                    $embedUrl = 'https://www.youtube.com/embed/' . $matches[1];
                                }
                            }
                            // Regular YouTube
                            elseif (str_contains($videoUrl, 'youtube.com') || str_contains($videoUrl, 'youtu.be')) {
                                if (preg_match('/[?&]v=([^&]+)/', $videoUrl, $matches) || preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $videoUrl, $matches)) {
                                    $embedUrl = 'https://www.youtube.com/embed/' . ($matches[1] ?? $matches[2] ?? null);
                                }
                            }
                            // Vimeo
                            elseif (str_contains($videoUrl, 'vimeo.com')) {
                                preg_match('/vimeo\.com\/(\d+)/', $videoUrl, $matches);
                                if (isset($matches[1])) {
                                    $embedUrl = 'https://player.vimeo.com/video/' . $matches[1];
                                }
                            }
                            // Google Drive
                            elseif (str_contains($videoUrl, 'drive.google.com')) {
                                preg_match('/\/d\/([^\/]+)/', $videoUrl, $matches);
                                if (isset($matches[1])) {
                                    $embedUrl = 'https://drive.google.com/file/d/' . $matches[1] . '/preview';
                                }
                            }
                            
                            if (!$embedUrl) {
                                $embedUrl = $videoUrl;
                            }
                        ?>
                        
                        <div class="aspect-video bg-gray-900 rounded-lg overflow-hidden">
                            <iframe src="<?php echo e($embedUrl); ?>" class="w-full h-full" frameborder="0" allowfullscreen allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                        </div>
                    <?php elseif($media->file_path): ?>
                        <img src="<?php echo e(str_starts_with($media->file_path, 'http') ? $media->file_path : asset($media->file_path)); ?>" class="w-full rounded-lg" alt="<?php echo e($project->title); ?>">
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($project->cover_image && str_starts_with($project->cover_image, 'http')): ?>
                    <img src="<?php echo e($project->cover_image); ?>" class="w-full rounded-lg" alt="<?php echo e($project->title); ?>">
                <?php else: ?>
                    <div class="aspect-video bg-gray-900 rounded-lg flex items-center justify-center">
                        <p class="text-gray-500">No media available.</p>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </section>

        <div class="mt-16 grid grid-cols-3 gap-8 py-8 border-t border-gray-200">
            <div>
                <p class="text-gray-500 text-sm">Category</p>
                <p class="text-gray-900 mt-1"><?php echo e($project->category?->name ?? '-'); ?></p>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Date</p>
                <p class="text-gray-900 mt-1"><?php echo e($project->created_at->format('M Y')); ?></p>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Featured</p>
                <p class="text-gray-900 mt-1"><?php echo e($project->is_featured ? 'Yes' : 'No'); ?></p>
            </div>
        </div>

        <div class="mt-12 pt-8 border-t border-gray-200">
            <h3 class="text-2xl font-bold mb-8"><?php echo e($project->is_reels ? 'More Reels' : 'More Projects'); ?></h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = \App\Models\Project::where('id', '!=', $project->id)->where('is_reels', $project->is_reels)->latest()->take(2)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $other): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <a href="<?php echo e(route('portfolio.show', $other)); ?>" class="group">
                        <div class="aspect-video overflow-hidden rounded-lg mb-4">
                            <img src="<?php echo e($other->cover_image ?? 'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?w=600&q=80'); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform">
                        </div>
                        <h4 class="text-white group-hover:text-secondary"><?php echo e($other->title); ?></h4>
                    </a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jdira\Herd\video_portfolio\resources\views\project_detail.blade.php ENDPATH**/ ?>