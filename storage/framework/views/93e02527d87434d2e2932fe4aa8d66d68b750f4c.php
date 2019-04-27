<?php $__env->startSection('content'); ?>
<table border="1">
<tr>
<td>ID</td>
<td>Name</td>
<td>Email</td>
</tr>
<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td><?php echo e($user->id); ?></td>
<td><?php echo e($user->name); ?></td>
<td><?php echo e($user->email); ?></td>
<td><a href = '/delete-user/<?php echo e($user->id); ?>'>Delete</a> </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>