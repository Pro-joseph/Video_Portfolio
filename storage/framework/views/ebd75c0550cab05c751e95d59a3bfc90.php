<?php $__env->startSection('title', 'Profile - FrameFlow'); ?>

<?php $__env->startSection('content'); ?>
<div class="pt-32 pb-20 px-6">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-8">Profile</h1>

        <!-- Update Profile Information -->
        <div class="bg-white rounded-lg shadow p-8 mb-8">
            <h2 class="text-xl font-semibold mb-4">Profile Information</h2>
            <p class="text-gray-600 text-sm mb-6">Update your account's profile information and email address.</p>

            <form method="post" action="<?php echo e(route('profile.update')); ?>" class="space-y-6">
                <?php echo csrf_field(); ?>
                <?php echo method_field('patch'); ?>

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                    <input id="name" name="name" type="text" value="<?php echo e(old('name', $user->name)); ?>" required autofocus autocomplete="name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary focus:border-transparent outline-none" />
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->get('name')): ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($errors->first('name')); ?></p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input id="email" name="email" type="email" value="<?php echo e(old('email', $user->email)); ?>" required autocomplete="username" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary focus:border-transparent outline-none" />
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->get('email')): ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($errors->first('email')); ?></p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail()): ?>
                        <div class="mt-2 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                            <p class="text-sm text-yellow-800">
                                Your email address is unverified.
                                <button form="send-verification" class="underline hover:no-underline">Click here to re-send the verification email.</button>
                            </p>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit" class="btn-primary">Save</button>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status') === 'profile-updated'): ?>
                        <p class="text-sm text-green-600">Saved.</p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </form>

            <form id="send-verification" method="post" action="<?php echo e(route('verification.send')); ?>">
                <?php echo csrf_field(); ?>
            </form>
        </div>

        <!-- Update Password -->
        <div class="bg-white rounded-lg shadow p-8 mb-8">
            <h2 class="text-xl font-semibold mb-4">Update Password</h2>

            <form method="post" action="<?php echo e(route('password.update')); ?>" class="space-y-6">
                <?php echo csrf_field(); ?>
                <?php echo method_field('put'); ?>

                <div>
                    <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                    <input id="current_password" name="current_password" type="password" autocomplete="current-password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary focus:border-transparent outline-none" />
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->updatePassword->get('current_password')): ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($errors->updatePassword->first('current_password')); ?></p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary focus:border-transparent outline-none" />
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->updatePassword->get('password')): ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($errors->updatePassword->first('password')); ?></p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-secondary focus:border-transparent outline-none" />
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->updatePassword->get('password_confirmation')): ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($errors->updatePassword->first('password_confirmation')); ?></p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <button type="submit" class="btn-primary">Update Password</button>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status') === 'password-updated'): ?>
                    <p class="text-sm text-green-600">Saved.</p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </form>
        </div>

        <!-- Delete Account -->
        <div class="bg-white rounded-lg shadow p-8 border border-red-200">
            <h2 class="text-xl font-semibold mb-4 text-red-600">Delete Account</h2>
            <p class="text-gray-600 text-sm mb-6">Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>

            <form method="post" action="<?php echo e(route('profile.destroy')); ?>" onsubmit="return confirm('Are you sure you want to delete your account?');">
                <?php echo csrf_field(); ?>
                <?php echo method_field('delete'); ?>

                <button type="submit" class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition-colors">Delete Account</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jdira\Herd\video_portfolio\resources\views\profile\edit.blade.php ENDPATH**/ ?>