

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
           <h2 class="mb-4">Products</h2>
            
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
			<?php  //echo"<pre>"; print_r($products);  echo"</pre>"; ?>
			<!-- get data from controller   -->
			<?php $__currentLoopData = $products->chunk(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 col-lg-3">
			
			<?php  $category_name = DB::table('categories')->where('id',$product->category_id)->select('name')->first();?>
				<!-- it will return category name. I need this because, i set my image folder name according to category name. -->
				<?php $__currentLoopData = $category_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				     <!--$name  -->
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				
    				<div class="product">
    					<a href="<?php echo e(url('shop', [$product->id])); ?>" class="img-prod"><img src="<?php echo e(asset('img/'.$name.'/'. $product->image)); ?>" alt="Colorlib Template" width="300" height="300">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<p><?php echo e($product->name); ?></p>
    						<div class="d-flex">
    							<div class="price">
                    <p class="price">$<?php echo e($product->price); ?></p>
                    <p class="btn-holder"><a href="<?php echo e(url('shop/'.$product->id)); ?>" class="btn btn-success btn-lg" role="button">Read more..</a> </p>

		    					</div>
	    					</div>
	    				
    					</div>
    				</div>
    			</div>
    			
		  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
			
    	</div>
    </section>

   
	<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Kidshop\resources\views/shop.blade.php ENDPATH**/ ?>