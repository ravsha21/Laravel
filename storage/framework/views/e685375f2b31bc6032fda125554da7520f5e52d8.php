

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item">Cart</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <h1>Shopping Cart</h1>
        <hr>
        <!-- check session messages if item deleted or updated -->
        <?php if(session()->has('message')): ?>
    <div class="alert alert-success">
    <?php echo e(session('message')); ?>

    </div>
<?php endif; ?>

<!-- get message if item deleted successfully -->
<?php if(session()->has('delete_message')): ?>
    <div class="alert alert-success">
    <?php echo e(session('delete_message')); ?>

    </div>
<?php endif; ?>
       <!-- check if results have no record -->
        <?php if(!$results): ?>
            <div class="alert alert-info">
                Your cart is empty
            </div>

            <p><a href="<?php echo e(url('home/#latest_product')); ?>" class="btn-lg pl-0">Continue Shopping</a></p>
        <?php else: ?>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-light">
                    <div class="card-header">Food Items</div>

                    <div class="card-body">
                        <div class="rounded bg-white">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                
                                    <th colspan="2">Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Actions</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                <?php $total = 0; ?>
                                <!-- get data from cart table -->
                                <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <?php  
                                $category_name = DB::table('categories')->where('id',$item->category_id)->select('name')->first();?>
				<!-- it will return category name. I need this because, i set my image folder name according to category name. -->
				<?php $__currentLoopData = $category_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				     <!--<?php echo e($name); ?> -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                                    <tr>
                                        <td width="55"><img src="<?php echo e(asset('img/'.$name.'/'. $item->image)); ?>" alt="product" class="img-responsive" width="100" height="100"></td>
                                        <td>
                                            <a href="#">
                                                <?php echo e($item->name); ?>

                                                
                                            </a></td>
                                            
                                        <td><?php echo e($item->price); ?></td>
                                        <td>
                                            <form style="display:inline-block;" class="form-inline" action="<?php echo e(url('/update')); ?>/<?php echo e($item->id); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <input type="number" name="qty" value="<?php echo e($item->quantity); ?>" min="1" max="10" />
                                                
                                            
                                        </td>
    
                                        <td>
                                        <input type="submit" name="Update" value="Update" class="text-update" />
                                            </form>
                                            <form style="display:inline-block;" class="form-inline" action="<?php echo e(url('/delete')); ?>/<?php echo e($item->id); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="submit" name="Delete" value="Delete" class="text-delete" />
                                             </form>
                                            
                                        </td>
                                    </tr>

                                    <?php 
                                    //get total price of cart items
                                    $total += $item->price; 
                                    ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th colspan="4"></th>
                                    <th>
                                        Total: <?php echo e($total); ?>

                                    </th>
                                    <th></th>
                                </tr>
                                </tfoot>

                            </table>
                        </div>

                        <p class="col-md-4" style="float:left;">
                            <a href="<?php echo e(url('home/#latest_product')); ?>" class="btn btn-block btn-primary">Continue Shopping</a>
                        </p>
                        <p class="col-md-4" style="float:right;">
                        <a href="<?php echo e(route('checkout.show')); ?>" class="btn btn-block btn-primary">Proceed To Checkout</a>                        
                        </p>

                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Kidshop\resources\views/cart/show.blade.php ENDPATH**/ ?>