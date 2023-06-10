<?php $__env->startSection('content'); ?>
<h1>Hola</h1>

<?php $__currentLoopData = $enlaces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enlace): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h3><?php echo e($enlace->title); ?></h3>
    <p><?php echo e($enlace->content); ?></p>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel/GestionUserRepaso/resources/views/enlace/tag.blade.php ENDPATH**/ ?>