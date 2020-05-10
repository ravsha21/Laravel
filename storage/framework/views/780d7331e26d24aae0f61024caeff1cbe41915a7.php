


<?php $__env->startSection('content'); ?>

    <div class="container">
        <br>
        <!-- get current user name -->
        <h2>Sorry <?php echo e(Auth::user()->name); ?></h2>
        <hr>


        <p>Your do not have permission to access this page.</p>
            
        
        

    </div>
	<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Kidshop\resources\views/sorry.blade.php ENDPATH**/ ?>