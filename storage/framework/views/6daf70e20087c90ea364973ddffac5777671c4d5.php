<?php $__env->startSection('content'); ?>
<h1>Editar usuariooo</h1>
<form action="<?php echo e(route('index.update',$index->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('put'); ?>
    <div class="mb-3">
        <label>Name</label>
        <input class="form-control" name="name" placeholder="<?php echo e($index->name); ?>" value= "<?php echo e($index->name); ?>"></input>
        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text-danger"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input class="form-control" name="email" placeholder="<?php echo e($index->email); ?>" value= "<?php echo e($index->email); ?>"></input>
        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text-danger"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="mb-3">
        <label for="oldPasswordInput" class="form-label">Old Password</label>
        <input name="old_password" type="password" class="form-control <?php $__errorArgs = ['old_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="oldPasswordInput" placeholder="Old Password">
        <?php $__errorArgs = ['old_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text-danger"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="mb-3">
        <label for="newPasswordInput" class="form-label">New Password</label>
        <input name="new_password" type="password" class="form-control <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="newPasswordInput" placeholder="New Password">
        <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text-danger"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="mb-3">
        <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
        <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput" placeholder="Confirm New Password">
    </div>
    <?php if(auth()->user()->type == 'admin'): ?>
    <div class="mb-3">
        <label>Type</label>
        <select class="form-control" name="type">
            <option value="admin" <?php echo e($index->type == 'admin' ? 'selected':''); ?>>Admin</option>
            <option value="advanced" <?php echo e($index->type == 'advanced' ? 'selected':''); ?>>Advanced</option>
            <option value="user" <?php echo e($index->type == 'user' ? 'selected':''); ?>>User</option>
        </select>
    </div>
    <?php else: ?>
    No eres admin,eres <?php echo e(auth()->user()->type); ?>.
    <?php endif; ?>
    <div class="mb-3">
        <button href="<?php echo e(url('home/index')); ?>" type="submit" class="btn btn-primary">Update user</button>
    </div>
    <div class="mb-3">
        <a href="<?php echo e(url('home/index')); ?>" class="btn btn-primary">Back</a>
    </div>
    <?php if(session()->has('message')): ?>
    <div class="alert alert-success">
        <?php echo e(session()->get('message')); ?>

    </div>
<?php endif; ?>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel/GestionUserRepaso/resources/views/users/edit.blade.php ENDPATH**/ ?>