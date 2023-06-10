<?php $__env->startSection('content'); ?>
<h1>Show User</h1>
 <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <?php echo e($index->name); ?>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Type of user: </strong>
                <?php echo e($index->type); ?>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <?php echo e($index->email); ?>

            </div>
        </div>
        <div class="mb-3">
            <a href="<?php echo e(url('home/index')); ?>" class="btn btn-primary">Back</a>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel/GestionUserRepaso/resources/views/users/show.blade.php ENDPATH**/ ?>