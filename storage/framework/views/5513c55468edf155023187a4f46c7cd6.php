<?php $__env->startSection('title', 'Reels - FrameFlow'); ?>

<?php $__env->startSection('content'); ?>
<div class="pt-32 pb-20 px-6">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="mb-16">
            <div class="accent-line"></div>
            <h1 class="section-title">Reels</h1>
            <p class="text-gray-600 text-xl max-w-2xl">Short-form video highlights from our latest projects.</p>
        </div>

        <!-- Reels Grid -->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($reels->count() > 0): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $reels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <a href="<?php echo e(route('portfolio.show', $reel)); ?>" class="group">
                    <div class="video-thumbnail card-hover aspect-[9/16]">
                        <?php
                            $thumb = null;
                            $firstMedia = $reel->media->first();
                            
                            if ($reel->cover_image) {
                                $cover = $reel->cover_image;
                                
                                // Google Drive
                                if (str_contains($cover, 'drive.google.com/file/d/')) {
                                    preg_match('/\/d\/([^\/]+)/', $cover, $matches);
                                    if (isset($matches[1])) {
                                        $thumb = 'https://drive.google.com/uc?export=view&id=' . $matches[1];
                                    }
                                }
                                // Storage uploaded file
                                elseif (!str_starts_with($cover, 'http') && !str_starts_with($cover, '/')) {
                                    $thumb = asset('storage/' . $cover);
                                }
                                // Other URLs
                                elseif (filter_var(trim($cover), FILTER_VALIDATE_URL)) {
                                    $thumb = $cover;
                                }
                            }
                            
                            // YouTube thumbnail fallback
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
                        <img src="<?php echo e($thumb); ?>" alt="<?php echo e($reel->title); ?>" class="w-full h-full object-cover" onerror="this.src='https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?w=400&q=80'">
                        <div class="play-button"></div>
                    </div>
                    <h3 class="text-lg font-bold mt-4 group-hover:text-secondary transition-colors"><?php echo e($reel->title); ?></h3>
                </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
        <?php else: ?>
        <div class="text-center py-20">
            <p class="text-gray-500 text-xl">No reels available yet.</p>
            <p class="text-gray-400 mt-2">Check back soon for new content!</p>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jdira\Herd\video_portfolio\resources\views\reels.blade.php ENDPATH**/ ?>