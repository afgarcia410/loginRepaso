<style>
            .label {
                display: inline-block;
                padding: 0.25em 0.4em;
                font-size: 75%;
                font-weight: 700;
                line-height: 1;
                text-align: center;
                white-space: nowrap;
                vertical-align: baseline;
                border-radius: 0.25rem;
                transition: color 0.15s ease-in-out,
                background-color 0.15s ease-in-out,
                border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            }
            .label-info {
                color: #212529;
                background-color: #6cb2eb;
            }
        </style>
<?php $__env->startSection('content'); ?>
<h1>Editar post <?php echo e($enlace->id); ?></h1>


<form action="<?php echo e(route('enlace.update',$enlace->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('put'); ?>
<div class="mb-3">
        <label>Titulo</label>
        <input class="form-control" name="titulo" placeholder="" value="<?php echo e($enlace->titulo); ?>"></input>
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
        <label>Descripcion</label>
        <textarea class="form-control" name="descripcion" placeholder="" value= ""><?php echo e($enlace->descripcion); ?></textarea>
        <?php $__errorArgs = ['descripcion'];
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
        <label>Enlace</label>
        <input class="form-control" name="enlace" placeholder="" value="<?php echo e($enlace->enlace); ?>"></input>
        <?php $__errorArgs = ['enlace'];
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
        <label>Imagen</label>
        <input type="file" accept="image/jpeg" class="form-control-file" id="imagen" name="imagen" value="<?php echo e($enlace->imagen); ?>">
        <?php $__errorArgs = ['imagen'];
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
        <label>Tags (separar por comas)</label>
        <input class="form-control" data-role="tagsinput" type="text" name="tags" value="<?php echo e(implode(',', $tags)); ?>" >
			<?php if($errors->has('tags')): ?>
                <span class="text-danger"><?php echo e($errors->first('tags')); ?></span>
            <?php endif; ?>
    </div>
<div class="mb-3">
        <button type="submit" class="btn btn-primary">Editar Post</button>
        <a href="<?php echo e(url('/')); ?>" class="btn btn-primary">Back</a>
    </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel/GestionUserRepaso/resources/views/enlace/edit.blade.php ENDPATH**/ ?>