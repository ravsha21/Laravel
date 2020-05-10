

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('shop.index')); ?>">All Products</a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(url('/cart/show')); ?>">Cart</a></li>
    <li class="breadcrumb-item">Checkout</li>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php 
// get total price
$total_price = 0;
    foreach($results as $result){
      $price = $result->price;
      $total_price += $price;
    //  die();
    }  
   
    
?>
<?php if(!$results->isEmpty()): ?>
<section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
						<form action="<?php echo e(url('/checkout/submit')); ?>" method="post" class="billing-form">
							<h3 class="mb-4 billing-heading">Billing Details</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
	                <div class="form-group">
                        <label for="firstname">Firt Name</label>
                        <?php echo csrf_field(); ?>
                        <input name="first_name" placeholder="First Name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  type="text" >
						<!-- validation message  -->
						<?php $__errorArgs = ['first_name'];
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
	                </div>
	              </div>
	              <div class="col-md-12">
	                <div class="form-group">
	                	<label for="lastname">Last Name</label>
                        <?php echo csrf_field(); ?> 
                        <input name="last_name" placeholder="Last Name" class="form-control"  type="text" required>
                           <!-- Text input-->
						   <!-- validation message  -->
						<?php $__errorArgs = ['last_name'];
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
	                </div>
                </div>
                <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">State / Country</label>
                            <?php echo csrf_field(); ?>
                            <input name="state" placeholder="state" class="form-control"  type="text" required>
							<!-- validation message  -->
						<?php $__errorArgs = ['state'];
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
		            	</div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
	                	<label for="streetaddress">Street Address</label>
                        <?php echo csrf_field(); ?>
                        <input name="address" placeholder="Address" class="form-control" type="text" required>	     
						<!-- validation message  -->
						<?php $__errorArgs = ['address'];
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
						 </div>
		            </div>
		            
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
                        <label for="towncity">Town / City</label>
                        <?php echo csrf_field(); ?>
                        <input name="city" placeholder="city" class="form-control"  type="text" required>
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="postcodezip">Postcode / ZIP *</label>
                            <?php echo csrf_field(); ?>
                            <input name="zip_code" placeholder="Zip Code" class="form-control"  type="text" required>
							<!-- validation message  -->
						<?php $__errorArgs = ['zip_code'];
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
	                </div>
					
		            </div>
					<div class="w-100"></div>
		            <div class="col-md-12">
	                <div class="form-group">
                        <label for="country">Country</label>
                        <?php echo csrf_field(); ?> 
                        <input name="country" placeholder="Country" class="form-control" type="text" required>
						<!-- validation message  -->
						<?php $__errorArgs = ['country'];
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
	                </div>
	              </div>
		            <div class="w-100"></div>
		            <div class="col-md-12">
	                <div class="form-group">
                        <label for="phone">Phone</label>
                        <?php echo csrf_field(); ?> 
                        <input name="phone_number" placeholder="Phone number" class="form-control" type="text" required>
						<!-- validation message  -->
						<?php $__errorArgs = ['phone_number'];
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
	                </div>
	              </div>
	              
                <div class="w-100"></div>
                <input class="btn btn-primary py-3 px-4" type="submit" name="submit">

	            </div>
	          </form><!-- END -->
					</div>
					<div class="col-xl-5">
	          <div class="row mt-5 pt-3">
	          	<div class="col-md-12 d-flex mb-5">
	          		<div class="cart-detail cart-total p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Cart Total</h3>
	          			<p class="d-flex">
		    						<span>Subtotal</span>
		    						<span>$<?php echo e($total_price); ?></span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Shipping</span>
		    						<span>Free</span>
		    					</p>
		    					
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Total</span>
		    						<span>$<?php echo e($total_price); ?></span>
		    					</p>
								</div>
	          	</div>
	          	<div class="col-md-12">
	          		<div class="cart-detail p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Payment Method</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label> Cash on delivery.</label>
											</div>
										</div>
									</div>
									
								</div>
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->
	<?php else: ?>

	<section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7">
			<h3 class="mb-4 billing-heading">Billing Details</h3>
	         <p> Your cart is empty. Please do shopping first for checkout. </p>
			 <p class="col-md-4" style="float:left;">
                            <a href="<?php echo e(url('home/#latest_product')); ?>" class="btn btn-block btn-primary">Continue Shopping</a>
                        </p>
		   </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section --> 
         <?php endif; ?>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Kidshop\resources\views/checkout/show.blade.php ENDPATH**/ ?>