

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item"><a href="#">All Products</a></li>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add Category</div>

                    <div class="card-body">
                           

                             <form class="well form-horizontal" action="<?php echo e(url('/admin/category/add')); ?> " method="post"  id="contact_form">
                             <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                            
                                <label class="col-md-4 control-label">Name</label>  
                                <?php echo csrf_field(); ?>
                                <input  name="name" placeholder="Category name" class="form-control"  type="text">
   
                                <br>
                                <input class="btn btn-lg btn-success" type="submit" name="submit">
                                </div>
                                <p class="col-md-4" style="float:right;">
                        <a href="<?php echo e(url('admin/category/show')); ?>" class="btn btn-block btn-primary">All Categories</a>                        
                        </p>
                        </fieldset>
                        </form>
                    </div>
                </div>
            </div>
         
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Kidshop\resources\views/admin/category/index.blade.php ENDPATH**/ ?>