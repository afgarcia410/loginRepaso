<?php $__env->startSection('content'); ?>
<h1>Post con tag: <?php echo e($tag); ?></h1>
<?php $__currentLoopData = $enlaces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enlace): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<figure class="entry-media">
                                    <a href="<?php echo e(route('enlace.show', $enlace->id)); ?>">
                                        <img src="<?php echo e(asset('/storage/images/'.$enlace->imagen)); ?>" alt="image desc" width="100%" height="450px">
                                    </a>
                                </figure>
    <h3><?php echo e($enlace->titulo); ?></h3>
    <p><?php echo e($enlace->descripcion); ?></p>
    <a href="<?php echo e(route('enlace.show', $enlace->id)); ?>" class="link-unstyled">Seguir leyendo</a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel/GestionUserRepaso/resources/views/tag.blade.php ENDPATH**/ ?>