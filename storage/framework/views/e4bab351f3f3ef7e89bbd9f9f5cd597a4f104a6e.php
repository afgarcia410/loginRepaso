<?php $__env->startSection('content'); ?>
<h1> Editar Comentario </h1>
<form action="<?php echo e(route('comment.update',$comment->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('put'); ?>
    <div class="mb-3">
        <label>Comentario:</label>
        <input class="form-control" name="comment" placeholder="" value="<?php echo e($comment->comment); ?>"></input>
        <?php $__errorArgs = ['titulo'];
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
        <button type="submit" class="btn btn-primary">Editar Comentario</button>
        <a href="<?php echo e(url('/')); ?>" class="btn btn-primary">Back</a>
    </div>
   </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel/GestionUserRepaso/resources/views/comment/edit.blade.php ENDPATH**/ ?>