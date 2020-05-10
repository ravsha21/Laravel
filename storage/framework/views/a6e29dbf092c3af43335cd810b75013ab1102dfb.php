

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item"><a href="#">All Products</a></li>
    <li class="breadcrumb-item"><a href="#">Cart</a></li>
    <li class="breadcrumb-item">Checkout</li>
    <li class="breadcrumb-item">Order Complete</li>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <br>
        <!-- get current user name -->
        <h2>Wonderful <?php echo e(Auth::user()->name); ?></h2>
        <hr>

         <!-- check session messages if item deleted or updated -->
         <?php if(session()->has('message')): ?>
    <div class="alert alert-success">
    <?php echo e(session('message')); ?>

    </div>
<?php endif; ?>

        <h3>Next Steps</h3>

        <ol>
            <li>Your order will be prepared with in 15 to 20 minuts.</li>
            <li>You can pay by card or cash on delivery.</li>
            <li>You can call us to get information about your order on +64 2222 22222.</li>
        </ol>

        

    </div>
	<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Kidshop\resources\views/checkout/thankyou.blade.php ENDPATH**/ ?>