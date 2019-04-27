<?php $__env->startSection('content'); ?>
        <a href="/products" class="btn btn-default">Go Back</a> 
        <h1><?php echo e($product->name); ?></h1>
        <small>Added on <?php echo e($product->created_at); ?></small>
        <div>
                <?php echo $product->description; ?>

        </div>
<?php $__env->stopSection(); ?>    
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>