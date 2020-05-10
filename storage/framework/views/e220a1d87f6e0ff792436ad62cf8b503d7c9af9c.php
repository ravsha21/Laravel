

<?php $__env->startSection('content'); ?>
    <style>
        .thumbnail-container {
            overflow-x: scroll;
        }

        .thumbnail {
            width: 64px;
            height: auto;
            display: block;
            float: left;
        }

        .thumbnail img {
            cursor: pointer;
        }
    </style>
    <div class="container">
    <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h1>
        <?php echo e($products->name); ?>

        
        </h1>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <hr>
          <?php die("m here"); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-2">
                    <?php $img = $product->getMedia()->first() ? $product->getMedia()->first()->getUrl('medium') : '/images/product-medium.jpg' ?>
                    <img src="<?php echo e($img); ?>" id="product-image" />
                </div>

                <div class="thumbnail-container">
                    <?php $__currentLoopData = $product->getMedia(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="thumbnail mr-1">
                            <img class="mw-100" src="<?php echo e($media->getUrl('thumbnail')); ?>"
                                 onclick="document.getElementById('product-image').setAttribute('src', '<?php echo e($media->getUrl("medium")); ?>')"
                            />
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <div class="col-md-6">
                <form action="<?php echo e(route('cart.add', $product)); ?>" method="post" class="mb-4">
                    <?php echo e(csrf_field()); ?>


                    <span class="mr-2 font-weight-bold text-primary btn-lg"><?php echo e(format_price($product->price)); ?></span>
                    <button type="submit" class="btn btn-success btn-lg" <?php if(!$product->price): ?> disabled <?php endif; ?>>Add to cart</button>
                </form>

               
              

                <?php if (! (empty($product->description))): ?>
                <hr>
                <p class="text-secondary"><?php echo nl2br($product->description); ?></p>
                <hr>
                <?php endif; ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Kidshop\resources\views/product/index.blade.php ENDPATH**/ ?>