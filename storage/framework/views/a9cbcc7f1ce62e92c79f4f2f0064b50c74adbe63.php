

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item"><a href="#">All Products</a></li>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <?php if(session()->has('message')): ?>
    <div class="alert alert-success">
    <?php echo e(session('message')); ?>

    </div>
<?php endif; ?>
                    <div class="card-header">Add Product</div>

                    <div class="card-body">
                           

                             <form class="well form-horizontal" action="<?php echo e(url('/admin/product/add')); ?> " method="post"  id="contact_form">
                             <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                            
                            <label class="col-md-4 control-label">Category</label>  
                                <?php echo csrf_field(); ?>
                                                    
                                <select id = "category_name" name="category_id">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				                 
                                   <option name="category_id" value = "<?php echo e($name->id); ?>"><?php echo e($name->name); ?></option>
				               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                </select><br>
                                <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span role="alert">
                            <p class="error"><?php echo e($message); ?></p>
                        </span>
                    	<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                                <label class="col-md-4 control-label">Name</label>  
                                <?php echo csrf_field(); ?>
                                <input  name="name" placeholder="Product name" class="form-control"  type="text">
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span role="alert">
                            <p class="error"><?php echo e($message); ?></p>
                        </span>
                    	<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                                <label class="col-md-4 control-label">Description</label>  
                                <?php echo csrf_field(); ?>
                                <input  name="description" placeholder="Description" class="form-control"  type="text">
                                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span role="alert">
                            <p class="error"><?php echo e($message); ?></p>
                        </span>
                    	<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                                <label class="col-md-4 control-label">Image</label>  
                                <?php echo csrf_field(); ?>
                                <input  name="image" placeholder="image" class="form-control"  type="file">
                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span role="alert">
                            <p class="error"><?php echo e($message); ?></p>
                        </span>
                    	<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                                <label class="col-md-4 control-label">price</label>  
                                <?php echo csrf_field(); ?>
                                <input  name="price" placeholder="price" class="form-control"  type="text">
                                
                                <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span role="alert">
                            <p class="error"><?php echo e($message); ?></p>
                        </span>
                    	<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                                <br>
                                <input class="btn btn-lg btn-success" type="submit" name="submit">
                                </div>

                        </fieldset>
                        </form>
                    </div>
                </div>
            </div>
         
        </div>
    </div>
    
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Kidshop\resources\views/admin/product/index.blade.php ENDPATH**/ ?>