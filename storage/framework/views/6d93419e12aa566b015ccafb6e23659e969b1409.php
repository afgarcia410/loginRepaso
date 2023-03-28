<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Dashboard')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <?php echo e(__('You are logged in!')); ?>

                <br>
                <p>You have the <strong><?php echo e(auth()->user()->type); ?></strong> role.</p>
                <form action="<?php echo e(url('logout')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input class="btn btn-primary" type="submit" value="Logout"/>
                    
                </form>
               <a href="<?php echo e(url('home/edit')); ?>" type="submit" value="Edit User" >Edit</a>
                <br>
                <!--Para verificar usuario --> 
                <?php if(!Auth::user() -> hasVerifiedEmail()): ?>
                    You are not verified,please <a href="<?php echo e(url('email/verify')); ?>">verify</a> your email.
                    <?php endif; ?>
                </div>
                
                
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel/GestionUserRepaso/resources/views/home.blade.php ENDPATH**/ ?>