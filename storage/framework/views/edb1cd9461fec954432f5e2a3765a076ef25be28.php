

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <p><a href="<?php echo e(url('/shop')); ?>">Shop</a> / <?php echo e($product->name); ?></p><br>
        <h1><?php echo e($product->name); ?></h1>

        <hr>
        <?php  $category_name = DB::table('categories')->where('id',$product->category_id)->select('name')->first();?>
				<!-- it will return category name. I need this because, i set my image folder name according to category name. -->
				<?php $__currentLoopData = $category_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				     <!--$name  -->
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="row">
            <div class="col-md-4">
                <img src="<?php echo e(asset('img/'.$name.'/'. $product->image)); ?>" width="300" height="300" alt="product" class="img-responsive">
            </div>

            <div class="col-md-8">
                <h3>$<?php echo e($product->price); ?></h3>
                <form action="<?php echo e(url('/cart')); ?>" method="POST" class="side-by-side">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                    <input type="hidden" name="name" value="<?php echo e($product->name); ?>">
                    <input type="hidden" name="price" value="<?php echo e($product->price); ?>">
                    <input type="submit" class="btn btn-success btn-lg" value="Add to Cart">
                </form>

                


                <br><br>

                <?php echo e($product->description); ?>

            </div> <!-- end col-md-8 -->
        </div> <!-- end row -->

        <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
           <h2 class="mb-4">You may also like...</h2>
            
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
			<?php $__currentLoopData = $interested; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 col-lg-3">
			
            <?php 
            //get data from category table
            $category_name = DB::table('categories')->where('id',$product->category_id)->select('name')->first();?>
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
			</div>
			
    	</div>
    </section>
        <div class="spacer"></div>


    </div> <!-- end container -->
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Kidshop\resources\views/product.blade.php ENDPATH**/ ?>