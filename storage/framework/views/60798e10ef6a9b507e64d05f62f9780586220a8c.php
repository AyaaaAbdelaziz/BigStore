 
<?php $__env->startSection('title', 'Cart'); ?>
 
<?php $__env->startSection('content'); ?>
 
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>


        <?php $total = 0 ?>
 <!--reload from database-->



        <?php if(session('cart')): ?>
            <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 
                <?php $total += $details['price'] * $details['quantity'] ?>
 
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="<?php echo e($details['photo']); ?>" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin"><?php echo e($details['name']); ?></h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">$<?php echo e($details['price']); ?></td>
                    <td data-th="Quantity">
                        <input type="number" value="<?php echo e($details['quantity']); ?>" class="form-control quantity" />
                    </td>
                    <td data-th="Subtotal" class="text-center">$<?php echo e($details['price'] * $details['quantity']); ?></td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm update-cart" data-id="<?php echo e($id); ?>"><i class="fa fa-refresh"></i></button>
                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="<?php echo e($id); ?>"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
 
        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>Total <?php echo e($total); ?></strong></td>
        </tr>
        <tr>
            <td><a href="<?php echo e(url('/')); ?>" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total $<?php echo e($total); ?></strong></td>
        </tr>
        </tfoot>
    </table>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
 
 
    <script type="text/javascript">
 
 
        $(".update-cart").click(function (e) {
           e.preventDefault();
 
           var ele = $(this);
 
            $.ajax({
               url: '<?php echo e(url('update-cart')); ?>',
               method: "patch",
               data: {_token: '<?php echo e(csrf_token()); ?>', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });
 
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
 
            var ele = $(this);
 
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '<?php echo e(url('remove-from-cart')); ?>',
                    method: "DELETE",
                    data: {_token: '<?php echo e(csrf_token()); ?>', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
 
    </script>
 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.lcart', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>