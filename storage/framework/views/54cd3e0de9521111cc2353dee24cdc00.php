<?php $__env->startPush('styles'); ?>
<style>
    .stat-card {
        background: var(--surface);
        border: 1px solid var(--border);
        padding: 2rem;
        text-align: center;
        transition: all 0.4s ease;
        cursor: pointer;
    }

    .stat-card:hover {
        border-color: rgba(234, 88, 12, 0.3);
        box-shadow: 0 40px 80px rgba(0,0,0,0.6);
        transform: translateY(-4px);
    }

    .stat-number {
        font-family: 'Bebas Neue', sans-serif;
        font-size: 3.5rem;
        color: var(--orange);
        line-height: 1;
    }

    .service-card {
        background: var(--surface);
        border: 1px solid var(--border);
        padding: 2rem;
        transition: all 0.4s ease;
        cursor: pointer;
    }

    .service-card:hover {
        border-color: rgba(234, 88, 12, 0.3);
        box-shadow: 0 40px 80px rgba(0,0,0,0.6);
        transform: translateY(-4px);
    }

    .testimonial-card {
        background: var(--surface);
        border: 1px solid var(--border);
        padding: 2rem;
        position: relative;
        transition: all 0.4s ease;
    }

    .testimonial-card:hover {
        border-color: rgba(234, 88, 12, 0.3);
    }

    .testimonial-card::before {
        content: '"';
        position: absolute;
        top: 1rem;
        left: 1.5rem;
        font-family: 'Bebas Neue', sans-serif;
        font-size: 4rem;
        color: var(--orange);
        opacity: 0.15;
        line-height: 1;
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

<?php $__env->startSection('title', 'About — Oumalk'); ?>

<?php $__env->startSection('content'); ?>
<?php
$about = $sections['about'] ?? null;
$stats = $siteSettings ?? [
    'experience' => '15+',
    'projects' => '200+',
    'clients' => '150+',
    'awards' => '50+'
];
?>

<div style="padding: 10rem 1.5rem 6rem;">
    <div class="max-w-7xl mx-auto">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($about): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 mb-24 items-center section-fade">
            <div>
                <div class="relative">
                    <div style="aspect-ratio: 4/5; overflow: hidden; border: 1px solid var(--border);">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($about && $about->getImageUrl()): ?>
                        <img src="<?php echo e($about->getImageUrl()); ?>" alt="About Us" class="w-full h-full object-cover">
                        <?php else: ?>
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&q=80" alt="About Us" class="w-full h-full object-cover">
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <div style="position: absolute; bottom: -1.5rem; right: -1.5rem; width: 8rem; height: 8rem; background: var(--orange); display: flex; align-items: center; justify-content: center;">
                        <span style="color: white; font-family: 'Bebas Neue', sans-serif; font-size: 1.5rem; text-align: center; line-height: 1.1;">5+<br>Years</span>
                    </div>
                </div>
            </div>
            <div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($about->title): ?>
                <div class="accent-line"></div>
                <h1 class="section-title" style="margin-bottom: 1.5rem;"><?php echo e($about->title); ?></h1>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($about->body): ?>
                <p style="color: var(--muted); line-height: 1.7; margin-bottom: 2rem;"><?php echo e($about->body); ?></p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <a href="<?php echo e(route('contact')); ?>" class="btn-primary">Work With Us</a>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($stats) > 0): ?>
        <section class="section-fade" style="margin-bottom: 6rem; padding: 3rem; border: 1px solid var(--border); background: var(--surface);">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($stats['experience'])): ?>
                <div class="stat-card">
                    <p class="stat-number"><?php echo e($stats['experience']); ?></p>
                    <p style="color: var(--muted); font-size: 0.85rem;">Years Experience</p>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($stats['projects'])): ?>
                <div class="stat-card">
                    <p class="stat-number"><?php echo e($stats['projects']); ?></p>
                    <p style="color: var(--muted); font-size: 0.85rem;">Projects</p>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($stats['clients'])): ?>
                <div class="stat-card">
                    <p class="stat-number"><?php echo e($stats['clients']); ?></p>
                    <p style="color: var(--muted); font-size: 0.85rem;">Clients</p>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($stats['awards'])): ?>
                <div class="stat-card">
                    <p class="stat-number"><?php echo e($stats['awards']); ?></p>
                    <p style="color: var(--muted); font-size: 0.85rem;">Awards</p>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </section>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($packages->count() > 0): ?>
        <section class="section-fade" style="margin-bottom: 6rem;">
            <div class="text-center mb-16">
                <div class="accent-line" style="margin: 0 auto 1.5rem;"></div>
                <h2 class="section-title">Our Services</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div class="service-card">
                        <h3 style="font-family: 'Bebas Neue', sans-serif; font-size: 1.8rem; color: var(--text); letter-spacing: 0.03em; margin-bottom: 0.75rem;"><?php echo e($package->name); ?></h3>
                        <p style="color: var(--muted); margin-bottom: 1rem;"><?php echo e($package->description); ?></p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($package->price): ?>
                            <p style="font-family: 'Bebas Neue', sans-serif; font-size: 2.5rem; color: var(--orange);">$<?php echo e(number_format($package->price, 0)); ?></p>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </section>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($testimonials->count() > 0): ?>
        <section class="section-fade">
            <div class="text-center mb-16">
                <div class="accent-line" style="margin: 0 auto 1.5rem;"></div>
                <h2 class="section-title">What Clients Say</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div class="testimonial-card">
                        <p style="color: var(--muted); line-height: 1.7; margin-bottom: 1.5rem;">"<?php echo e($t->body); ?>"</p>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 flex items-center justify-center text-white font-bold" style="background: var(--orange);">
                                <?php echo e(strtoupper(substr($t->client_name, 0, 1))); ?>

                            </div>
                            <div>
                                <p style="font-weight: 600; color: var(--text);"><?php echo e($t->client_name); ?></p>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($t->service_type): ?>
                                    <p style="color: var(--muted); font-size: 0.85rem;"><?php echo e($t->service_type); ?></p>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </section>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jdira\Herd\video_portfolio\resources\views\about.blade.php ENDPATH**/ ?>