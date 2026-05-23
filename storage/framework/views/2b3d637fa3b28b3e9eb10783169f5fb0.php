<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title>Confirm Password - FrameFlow</title>

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
                <p class="text-gray-500 mt-2">Confirm your password</p>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-8 py-8 bg-white">
                <div class="mb-6 text-sm text-gray-600">
                    <?php echo e(__('This is a secure area of the application. Please confirm your password before continuing.')); ?>

                </div>

                <form method="POST" action="<?php echo e(route('password.confirm')); ?>" class="space-y-6">
                    <?php echo csrf_field(); ?>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input id="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary focus:border-transparent outline-none" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->get('password')): ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($errors->first('password')); ?></p>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <button type="submit" class="btn-primary w-full">
                        Confirm
                    </button>
                </form>
            </div>
        </div>
    </body>
</html><?php /**PATH C:\Users\jdira\Herd\video_portfolio\resources\views\auth\confirm-password.blade.php ENDPATH**/ ?>