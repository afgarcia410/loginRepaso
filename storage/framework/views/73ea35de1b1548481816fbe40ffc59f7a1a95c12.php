<?php $__env->startSection('content'); ?>

<a href="<?php echo e(route('enlace.create')); ?>" class="btn btn-primary">+ Create Post</a>

<?php $__currentLoopData = $enlace; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enlaces): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php echo e($enlaces->user); ?>

<article class="entry">
    
                                <figure class="entry-media">
                                    <a href="<?php echo e(route('enlace.show', $enlaces->id)); ?>">
                                        <img src="<?php echo e(asset('/storage/images/'.$enlaces->imagen)); ?>" alt="image desc" width="100%" height="450px">
                                    </a>
                                </figure><!-- End .entry-media -->

                                <div class="entry-body">
                                    <div class="entry-meta">
                                        <span class="entry-author">
                                            <?php if($enlaces->iduser === 1): ?>
                                                adminUser 
                                            <?php elseif($enlaces->iduser === 2): ?>
                                                user
                                            <?php else: ?>
                                                advanced
                                            <?php endif; ?>
                                        </span>
                                        <span class="meta-separator">|</span>
                                        <a ><?php echo e($enlaces->created_at->format('j F Y')); ?></a>
                                        <span class="meta-separator">|</span>
                                        <?php echo e($enlaces->visitas); ?> visitas
                                        <span class="meta-separator">|</span>
                                        
                                        <?php $__empty_1 = true; $__currentLoopData = $enlaces->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                         <span class="badge badge-info"><a href="<?php echo e(route('showByTag', ['tag' => $tag->slug])); ?>" class="link-unstyled" style="color:white"><?php echo e($tag->name); ?></a></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <em>Sin etiquetas</em>
                        <?php endif; ?>
                                    </div><!-- End .entry-meta -->
                                    <?php if(auth()->guard()->check()): ?>
                                    <?php if($enlaces->iduser == auth()->user()->id): ?>
                                    <a href="<?php echo e(route('enlace.edit',$enlaces->id)); ?>" class="btn btn-primary btn-sm me-2">Edit</a>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <h2 class="entry-title">
                                        <a href="<?php echo e($enlaces->enlace); ?>"><?php echo e($enlaces->titulo); ?></a>
                                    </h2><!-- End .entry-title -->
                                    <!--Preguntar para que quede bien ->
                                    <div class="entry-cats">
                                        in 
                                    </div><!-- End .entry-cats -->
                                    <div class="entry-content">
                                        <p><?php echo e(Str::limit($enlaces->descripcion, 30, '...')); ?></p>
                                        <a href="<?php echo e(route('enlace.show', $enlaces->id)); ?>" class="link-unstyled">Seguir leyendo</a>
                                    </div><!-- End .entry-content -->
                                </div><!-- End .entry-body -->
                            </article><!-- End .entry -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php if(method_exists($enlace,'links')): ?>
    <div class="d-flex justify-content-center">
        <?php echo $enlace->links(); ?>

    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel/GestionUserRepaso/resources/views/enlace/index.blade.php ENDPATH**/ ?>