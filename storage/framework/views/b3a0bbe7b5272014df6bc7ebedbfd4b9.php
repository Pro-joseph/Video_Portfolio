<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title>Verify Email - FrameFlow</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white">
            <div class="mb-8 text-center">
                <a href="/" class="text-3xl font-bold font-serif text-gray-900">FrameFlow</a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-8 py-8 bg-white">
                <div class="mb-6 text-sm text-gray-600">
                    <?php echo e(__('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.')); ?>

                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status') == 'verification-link-sent'): ?>
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg text-sm font-medium">
                        <?php echo e(__('A new verification link has been sent to the email address you provided during registration.')); ?>

                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <div class="mt-6 flex items-center justify-between">
                    <form method="POST" action="<?php echo e(route('verification.send')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="text-sm text-secondary hover:underline">
                            <?php echo e(__('Resend Verification Email')); ?>

                        </button>
                    </form>

                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="text-sm text-gray-600 hover:text-secondary transition-colors">
                            <?php echo e(__('Log Out')); ?>

                        </button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html><?php /**PATH C:\Users\jdira\Herd\video_portfolio\resources\views\auth\verify-email.blade.php ENDPATH**/ ?>