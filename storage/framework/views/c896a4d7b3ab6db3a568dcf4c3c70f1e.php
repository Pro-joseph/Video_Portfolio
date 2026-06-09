<?php $__env->startPush('styles'); ?>
<style>
    .section-fade {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }

    .section-fade.in-view {
        opacity: 1;
        transform: translateY(0);
    }

    .related-card {
        background: var(--surface);
        border: 1px solid var(--border);
        transition: all 0.4s ease;
        cursor: pointer;
        overflow: hidden;
        text-decoration: none;
        display: block;
    }

    .related-card:hover {
        border-color: rgba(234, 88, 12, 0.3);
        box-shadow: 0 40px 80px rgba(0,0,0,0.6);
        transform: translateY(-4px);
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

<?php $__env->startSection('title', $project->title . ' — Oumalk'); ?>

<?php $__env->startSection('content'); ?>
<div style="padding: 10rem 1.5rem 6rem;">
    <div class="max-w-7xl mx-auto">
        <a href="<?php echo e($project->is_reels ? route('reels') : route('portfolio')); ?>" style="color: var(--muted); text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; transition: color 0.3s ease;">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Back to <?php echo e($project->is_reels ? 'Reels' : 'Portfolio'); ?>

        </a>

        <header class="section-fade" style="margin-top: 2rem; margin-bottom: 4rem;">
            <h1 class="section-title" style="margin-bottom: 1rem;"><?php echo e($project->title); ?></h1>
            <p style="color: var(--muted); max-width: 640px;"><?php echo e($project->description); ?></p>
        </header>

        <section class="section-fade" style="display: flex; flex-direction: column; gap: 2rem;">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $project->media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($media->video_url): ?>
                        <?php
                            $embedUrl = null;
                            $videoUrl = $media->video_url;

                            if (str_contains($videoUrl, 'youtube.com/shorts/')) {
                                preg_match('/shorts\/([a-zA-Z0-9_-]+)/', $videoUrl, $matches);
                                if (isset($matches[1])) {
                                    $embedUrl = 'https://www.youtube.com/embed/' . $matches[1];
                                }
                            }
                            elseif (str_contains($videoUrl, 'youtube.com') || str_contains($videoUrl, 'youtu.be')) {
                                if (preg_match('/[?&]v=([^&]+)/', $videoUrl, $matches) || preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $videoUrl, $matches)) {
                                    $embedUrl = 'https://www.youtube.com/embed/' . ($matches[1] ?? $matches[2] ?? null);
                                }
                            }
                            elseif (str_contains($videoUrl, 'vimeo.com')) {
                                preg_match('/vimeo\.com\/(\d+)/', $videoUrl, $matches);
                                if (isset($matches[1])) {
                                    $embedUrl = 'https://player.vimeo.com/video/' . $matches[1];
                                }
                            }
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

                        <div style="aspect-ratio: 16/9; background: var(--surface); border: 1px solid var(--border); overflow: hidden;">
                            <iframe src="<?php echo e($embedUrl); ?>" class="w-full h-full" frameborder="0" allowfullscreen allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                        </div>
                    <?php elseif($media->file_path): ?>
                        <img src="<?php echo e(str_starts_with($media->file_path, 'http') ? $media->file_path : asset($media->file_path)); ?>" class="w-full" alt="<?php echo e($project->title); ?>" style="border: 1px solid var(--border);">
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($project->cover_image && str_starts_with($project->cover_image, 'http')): ?>
                    <img src="<?php echo e($project->cover_image); ?>" class="w-full" alt="<?php echo e($project->title); ?>">
                <?php else: ?>
                    <div style="aspect-ratio: 16/9; background: var(--surface); border: 1px solid var(--border); display: flex; align-items: center; justify-content: center;">
                        <p style="color: var(--muted);">No media available.</p>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </section>

        <div class="section-fade" style="margin-top: 4rem; padding: 2rem 0; border-top: 1px solid var(--border); display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem;">
            <div>
                <p style="color: var(--muted); font-size: 0.85rem;">Category</p>
                <p style="font-family: 'Bebas Neue', sans-serif; font-size: 1.4rem; color: var(--text); letter-spacing: 0.03em;"><?php echo e($project->category?->name ?? '-'); ?></p>
            </div>
            <div>
                <p style="color: var(--muted); font-size: 0.85rem;">Date</p>
                <p style="color: var(--text);"><?php echo e($project->created_at->format('M Y')); ?></p>
            </div>
            <div>
                <p style="color: var(--muted); font-size: 0.85rem;">Featured</p>
                <p style="color: var(--text);"><?php echo e($project->is_featured ? 'Yes' : 'No'); ?></p>
            </div>
        </div>

        <div class="section-fade" style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid var(--border);">
            <h3 style="font-family: 'Bebas Neue', sans-serif; font-size: 2rem; color: var(--text); letter-spacing: 0.03em; margin-bottom: 2rem;"><?php echo e($project->is_reels ? 'More Reels' : 'More Projects'); ?></h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = \App\Models\Project::where('id', '!=', $project->id)->where('is_reels', $project->is_reels)->latest()->take(2)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $other): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <a href="<?php echo e(route('portfolio.show', $other)); ?>" class="related-card">
                        <div style="aspect-ratio: 16/9; overflow: hidden;">
                            <img src="<?php echo e($other->cover_image ?? 'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?w=600&q=80'); ?>" class="w-full h-full object-cover" style="transition: transform 0.6s ease;">
                        </div>
                        <div style="padding: 1rem 1.25rem;">
                            <h4 style="font-family: 'Bebas Neue', sans-serif; font-size: 1.5rem; color: var(--orange); letter-spacing: 0.03em;"><?php echo e($other->title); ?></h4>
                        </div>
                    </a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jdira\Herd\video_portfolio\resources\views\project_detail.blade.php ENDPATH**/ ?>