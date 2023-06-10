<?php if(!empty($comments)): ?>
<?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="card card-body shadow-sm at-3">


<div class="detail-area">

<h6 class="user-name ab-1">User One

<small class="es-3 text-primary">Connented on: 3-8-2822</small>
</h6>


<p class="user-comment mb1">

data into database using Laravel Insert data into

database using Laravel Insert data Into database using LaravelInsert data into

</p>

</div> 

<div>
    <a href="" class="btn btn-primary btn-sm me-2">Edit</a> 
    <a href="" class-"btn btn-danger btn-sm me-2">Delete</a>
    </div> 

    

</div> 
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<p>NO HAY COMENTARIOS</p>
<?php endif; ?><?php /**PATH /var/www/html/laravel/GestionUserRepaso/resources/views/enlace/comment.blade.php ENDPATH**/ ?>