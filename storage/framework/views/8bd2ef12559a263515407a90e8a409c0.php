<footer class="px-6 py-12 border-t" style="background-color: <?php echo e($siteSettings['footer']['footer_bg_color'] ?? '#1a1a2e'); ?>; border-color: rgba(255,255,255,0.1);">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12">
        <div>
            <h3 class="text-2xl font-bold font-serif mb-4" style="color: <?php echo e($siteSettings['footer']['footer_text_color'] ?? '#ffffff'); ?>">
                <?php echo e($siteSettings['header']['header_logo_text'] ?? 'FrameFlow'); ?>

            </h3>
            <p class="text-gray-400">Professional videography services for life's most precious moments.</p>
        </div>
        <div>
            <h4 class="font-bold mb-4" style="color: <?php echo e($siteSettings['footer']['footer_text_color'] ?? '#ffffff'); ?>">Quick Links</h4>
            <nav class="flex flex-col gap-3">
                <a href="<?php echo e(route('home')); ?>" class="text-gray-400 hover:text-secondary">Home</a>
                <a href="<?php echo e(route('portfolio')); ?>" class="text-gray-400 hover:text-secondary">Portfolio</a>
                <a href="<?php echo e(route('about')); ?>" class="text-gray-400 hover:text-secondary">About</a>
                <a href="<?php echo e(route('contact')); ?>" class="text-gray-400 hover:text-secondary">Contact</a>
            </nav>
        </div>
        <div>
            <h4 class="font-bold mb-4" style="color: <?php echo e($siteSettings['footer']['footer_text_color'] ?? '#ffffff'); ?>">Services</h4>
            <nav class="flex flex-col gap-3">
                <a href="<?php echo e(route('contact')); ?>" class="text-gray-400 hover:text-secondary">Cinematography</a>
                <a href="<?php echo e(route('contact')); ?>" class="text-gray-400 hover:text-secondary">Video Production</a>
                <a href="<?php echo e(route('contact')); ?>" class="text-gray-400 hover:text-secondary">Post-Production</a>
            </nav>
        </div>
        <div>
            <h4 class="font-bold mb-4" style="color: <?php echo e($siteSettings['footer']['footer_text_color'] ?? '#ffffff'); ?>">Contact</h4>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($siteSettings['contact']['contact_email'])): ?>
            <p class="text-gray-400"><?php echo e($siteSettings['contact']['contact_email']); ?></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($siteSettings['contact']['contact_phone'])): ?>
            <p class="text-gray-400"><?php echo e($siteSettings['contact']['contact_phone']); ?></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($siteSettings['contact']['contact_address'])): ?>
            <p class="text-gray-400"><?php echo e($siteSettings['contact']['contact_address']); ?></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            
            <?php $hasSocial = false; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $siteSettings['social']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($value)): ?>
                    <?php $hasSocial = true; ?>
                    <?php break; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hasSocial): ?>
            <div class="flex gap-4 mt-4">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($siteSettings['social']['social_facebook'])): ?>
                <a href="<?php echo e($siteSettings['social']['social_facebook']); ?>" target="_blank" class="text-gray-400 hover:text-secondary">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.77,7.46H14.5v-1.9c0-.9.6-1.1,1-1.1h3V.5h-4.33C10.24.5,9.5,3.44,9.5,5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4Z"/></svg>
                </a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($siteSettings['social']['social_instagram'])): ?>
                <a href="<?php echo e($siteSettings['social']['social_instagram']); ?>" target="_blank" class="text-gray-400 hover:text-secondary">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12,2.16c3.2,0,3.58,0,4.85.07,3.25.15,4.77,1.69,4.92,4.92.06,1.27.07,1.65.07,4.85s0,3.58-.07,4.85c-.15,3.23-1.66,4.77-4.92,4.92-1.27.06-1.65.07-4.85.07s-3.58,0-4.85-.07c-3.26-.15-4.77-1.7-4.92-4.92-.06-1.27-.07-1.65-.07-4.85s0-3.58.07-4.85C2.38,3.92,3.9,2.38,7.15,2.23,8.42,2.18,8.8,2.16,12,2.16ZM12,0C8.74,0,8.33,0,7.05.07c-4.27.2-6.78,2.71-7,7C0,8.33,0,8.74,0,12s0,3.67.07,4.95c.2,4.27,2.71,6.78,7,7,1.28.07,1.69.07,4.95.07s3.67,0,4.95-.07c4.27-.2,6.78-2.71,7-7C24,8.33,24,7.92,24,12s0,3.67-.07,4.95c-.2,4.27-2.71,6.78-7,7-1.28.07-1.69.07-4.95.07V0Z"/></svg>
                </a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($siteSettings['social']['social_youtube'])): ?>
                <a href="<?php echo e($siteSettings['social']['social_youtube']); ?>" target="_blank" class="text-gray-400 hover:text-secondary">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.5,6.19a3.02,3.02,0,0,0-2.12-2.14C19.5,3.5,12,3.5,12,3.5s-7.5,0-9.38.55A3.02,3.02,0,0,0,.5,6.19,31.6,31.6,0,0,0,0,12a31.6,31.6,0,0,0,.5,5.81,3.02,3.02,0,0,0,2.12,2.14C4.5,20.5,12,20.5,12,20.5s7.5,0,9.38-.55a3.02,3.02,0,0,0,2.12-2.14A31.6,31.6,0,0,0,24,12,31.6,31.6,0,0,0,23.5,6.19ZM9.75,15.02V8.98L15.5,12Z"/></svg>
                </a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
    <div class="max-w-7xl mx-auto mt-12 pt-8 border-t text-center" style="border-color: rgba(255,255,255,0.1);">
        <p class="text-gray-500 text-sm"><?php echo e($siteSettings['footer']['footer_copyright'] ?? '© 2026 FrameFlow. All rights reserved.'); ?></p>
    </div>
</footer><?php /**PATH C:\Users\jdira\Herd\video_portfolio\resources\views\components\footer.blade.php ENDPATH**/ ?>