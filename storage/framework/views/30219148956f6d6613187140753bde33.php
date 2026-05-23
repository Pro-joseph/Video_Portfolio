<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title>Forgot Password - FrameFlow</title>

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
                <p class="text-gray-500 mt-2">Reset your password</p>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-8 py-8 bg-white">
                <div class="mb-6 text-sm text-gray-600">
                    <?php echo e(__('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.')); ?>

                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status')): ?>
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <form method="POST" action="<?php echo e(route('password.email')); ?>" class="space-y-6">
                    <?php echo csrf_field(); ?>

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input id="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary focus:border-transparent outline-none" type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus autocomplete="username" placeholder="you@example.com" />
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->get('email')): ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($errors->first('email')); ?></p>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div class="flex items-center justify-end">
                        <a href="<?php echo e(route('login')); ?>" class="text-sm text-gray-600 hover:text-secondary transition-colors">
                            Back to login
                        </a>
                    </div>

                    <button type="submit" class="btn-primary w-full">
                        <?php echo e(__('Email Password Reset Link')); ?>

                    </button>
                </form>
            </div>
        </div>
    </body>
</html><?php /**PATH C:\Users\jdira\Herd\video_portfolio\resources\views\auth\forgot-password.blade.php ENDPATH**/ ?>