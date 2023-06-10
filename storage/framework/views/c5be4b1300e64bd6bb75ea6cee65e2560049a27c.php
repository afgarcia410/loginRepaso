<?php $__env->startSection('content'); ?>
<div class="page-content">
               
                    <div class="entry-media single-thumb">
                        <img src="<?php echo e(asset('/storage/images/'.$enlace->imagen)); ?>" width="1222px" height="562px" alt=""/>
                    </div><!-- End .entry-media -->
                     <div class="container">
                	<div class="row">
                		<div class="col-lg-9">
                            <article class="entry single-entry">
                                <div class="entry-body">
                                    <div class="entry-meta">
                                        <span class="entry-author">
                                            by
                                            <?php if($enlace->iduser === 1): ?>
                                                adminUser
                                            <?php elseif($enlace->iduser === 2): ?>
                                                user
                                            <?php else: ?>
                                                advanced
                                            <?php endif; ?>
                                        </span>
                                        <span class="meta-separator">|</span>
                                        <a><?php echo e($enlace->created_at->format('j F Y')); ?></a>
                                        <span class="meta-separator">|</span>
                                        <a><?php echo e($enlace->visitas); ?> visitas</a>
                                        <span class="meta-separator"></span>
                                    </div><!-- End .entry-meta -->
                                    Enlace: <a href="<?php echo e($enlace->enlace); ?>"><?php echo e($enlace->enlace); ?></a>
                                    <h1 class="entry-title entry-title-big">
                                        <?php echo e($enlace->titulo); ?>

                                    </h1><!-- End .entry-title -->

                                    <div class="entry-cats">
                                    </div><!-- End .entry-cats -->

                                    <div class="entry-content editor-content">
                                        <p><?php echo e($enlace->descripcion); ?></p>
                                    </div><!-- End .entry-content -->

                                    <div class="entry-footer row no-gutters flex-column flex-md-row">
                                        <div class="col-md">
                                            <div class="entry-tags">
                                                <span>Tags:</span> 
                                                
				<?php $__empty_1 = true; $__currentLoopData = $enlace->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                         <span class="badge badge-info"><a href="<?php echo e(route('showByTag', ['tag' => $tag->slug])); ?>" class="link-unstyled" style="color:white"><?php echo e($tag->name); ?></a></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <em>Sin etiquetas</em>
                        <?php endif; ?>
                                            </div><!-- End .entry-tags -->
                                        </div><!-- End .col -->
                                        <div class="col-md-auto mt-2 mt-md-0">
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .entry-footer row no-gutters -->
                                    <br>
                                    <div class-"comment-area mt-4">
                                        
                                    

<div class="card card-body">
    


<h6 class-"card-title">Leave a comment: </h6> 

<form action="<?php echo e(url('comment')); ?>" method= "POST">
    <?php echo csrf_field(); ?>
<input type="hidden" name="post_id" value="<?php echo e($enlace->id); ?>"/>
<textarea name="comment_body" class="form-control" rows="3" required></textarea>
<button type-"submit" class="btn btn-primary mt-3">Submit</button>

</form> 

</div><br>
<h1></h1>
<h1> Comments: </h1>

<?php if(!empty($comment)): ?>
<?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="card card-body shadow-sm at-3">


<div class="detail-area">

<h6 class="user-name ab-1">
    
   <?php echo e($comments->name); ?>

    

<small class="es-3 text-primary">Created at: <?php echo e(Carbon\Carbon::parse($comments->comment_created_at)->format('j F Y')); ?></small>

</h6>


<p class="user-comment mb1">

<?php echo e($comments->comment); ?>


</p>

</div> 
<?php if(auth()->guard()->check()): ?>
<?php if($enlace->iduser != null): ?>
<div>
   <a href="<?php echo e(route('comment.edit',$comments->commentid)); ?>" class="btn btn-primary btn-sm me-2">Edit</a> 
   
   <form action="<?php echo e(route('comment.destroy', $comments->commentid)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
   
</div>  

<?php endif; ?>
<?php endif; ?>
</div> 
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<p>NO HAY COMENTARIOS</p>
<?php endif; ?>

</div>
                                </div><!-- End .entry-body -->
                            </article><!-- End .entry -->
                		</div><!-- End .col-lg-9 -->
                	</div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel/GestionUserRepaso/resources/views/enlace/show.blade.php ENDPATH**/ ?>