<?php $__env->startSection('content'); ?>
    <div class="row" style="margin-top: 8px;">
    </div>
    <div class="row" style="margin-top: 8px;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">role</th>
                    <th scope="col">delete</th>
                    <th scope="col">edit</th>
                    <th scope="col">show</th>
                </tr>
            </thead>
             <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td><?php echo e($user->id); ?></td>
                <td><?php echo e($user->name); ?></td>
                <td><?php echo e($user->email); ?></td>
                <td><?php echo e($user->type); ?></td>
                <td>
                    <form action="<?php echo e(route('index.destroy',$user->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                <td>
                    <a href="<?php echo e(route('index.edit',$user->id)); ?>">edit</a>
                </td>
                <td>
                    <a href="<?php echo e(route('index.show',$user->id)); ?>">show</a>
                </td>
            </tbody>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
    <div class="row">
        <a href="<?php echo e(url('login')); ?>" class="btn btn-primary">Back</a>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(url('assets/deleteUser.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel/GestionUserRepaso/resources/views/user/index.blade.php ENDPATH**/ ?>