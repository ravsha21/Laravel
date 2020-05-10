

<?php $__env->startSection('content'); ?>

    <div class="container">
    <div class="card-body">
                        <div class="rounded bg-white">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                
                                    <th>Name</th>
                                    <th>New Name</th>
                                    <th>Actions</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                               
                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td> <?php echo e($item->name); ?> </td>
                                         <td>
                                            <form style="display:inline-block;" class="form-inline" action="<?php echo e(url('admin/category/update')); ?>/<?php echo e($item->id); ?>" method="POST">
                                                <?php echo csrf_field(); ?>

                                                <input type="text" name="name" value="<?php echo e($item->name); ?>" class="w-25" />
                                                
                                            
                                        </td>
    
                                        <td>
                                        <input type="submit" name="Update" value="Update" class="text-update" />
                                            </form>
                                            <form style="display:inline-block;" class="form-inline" action="<?php echo e(url('admin/category/delete')); ?>/<?php echo e($item->id); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="submit" name="Delete" value="Delete" class="text-delete" />
                                             </form>
                                            
                                        </td>
                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                               
                            </table>
                            <p class="col-md-4" style="float:right;">
                        <a href="<?php echo e(url('admin/category')); ?>" class="btn btn-block btn-primary">Add Category</a>                        
                        </p>
                        </div>


    </div> <!-- end container -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Kidshop\resources\views/admin/category/show.blade.php ENDPATH**/ ?>