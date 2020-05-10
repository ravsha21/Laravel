

<?php $__env->startSection('content'); ?>

    <div class="container">
        <p><a href="<?php echo e(url('shop')); ?>">Home</a> / Cart</p>
        <h1>Your Cart</h1>

        <hr>
        
        <?php if(session()->has('success_message')): ?>
            <div class="alert alert-success">
                <?php echo e(session()->get('success_message')); ?>

            </div>
        <?php endif; ?>

        <?php if(session()->has('error_message')): ?>
            <div class="alert alert-danger">
                <?php echo e(session()->get('error_message')); ?>

            </div>
        <?php endif; ?>

        <?php if(sizeof(Cart::content()) > 0): ?>

            <table class="table">
                <thead>
                    <tr>
                        <th class="table-image"></th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th class="column-spacer"></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                        <td class="table-image"><a href="<?php echo e(url('shop', [$item->model->slug])); ?>"><img src="<?php echo e(asset('img/' . $item->model->image)); ?>" alt="product" class="img-responsive cart-image"></a></td>
                        <td><a href="<?php echo e(url('shop', [$item->model->slug])); ?>"><?php echo e($item->name); ?></a></td>
                        <td>
                            <select class="quantity" data-id="<?php echo e($item->rowId); ?>">
                                <option <?php echo e($item->qty == 1 ? 'selected' : ''); ?>>1</option>
                                <option <?php echo e($item->qty == 2 ? 'selected' : ''); ?>>2</option>
                                <option <?php echo e($item->qty == 3 ? 'selected' : ''); ?>>3</option>
                                <option <?php echo e($item->qty == 4 ? 'selected' : ''); ?>>4</option>
                                <option <?php echo e($item->qty == 5 ? 'selected' : ''); ?>>5</option>
                            </select>
                        </td>
                        <td>$<?php echo e($item->subtotal); ?></td>
                        <td class=""></td>
                        <td>
                            <form action="<?php echo e(url('cart', [$item->rowId])); ?>" method="POST" class="side-by-side">
                                <?php echo csrf_field(); ?>

                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" class="btn btn-danger btn-sm" value="Remove">
                            </form>

                            <form action="<?php echo e(url('switchToWishlist', [$item->rowId])); ?>" method="POST" class="side-by-side">
                                <?php echo csrf_field(); ?>

                                <input type="submit" class="btn btn-success btn-sm" value="To Wishlist">
                            </form>
                        </td>
                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="table-image"></td>
                        <td></td>
                        <td class="small-caps table-bg" style="text-align: right">Subtotal</td>
                        <td>$<?php echo e(Cart::instance('default')->subtotal()); ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="table-image"></td>
                        <td></td>
                        <td class="small-caps table-bg" style="text-align: right">Tax</td>
                        <td>$<?php echo e(Cart::instance('default')->tax()); ?></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr class="border-bottom">
                        <td class="table-image"></td>
                        <td style="padding: 40px;"></td>
                        <td class="small-caps table-bg" style="text-align: right">Your Total</td>
                        <td class="table-bg">$<?php echo e(Cart::total()); ?></td>
                        <td class="column-spacer"></td>
                        <td></td>
                    </tr>

                </tbody>
            </table>

            <a href="<?php echo e(url('/shop')); ?>" class="btn btn-primary btn-lg">Continue Shopping</a> &nbsp;
            <a href="#" class="btn btn-success btn-lg">Proceed to Checkout</a>

            <div style="float:right">
                <form action="<?php echo e(url('/emptyCart')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-danger btn-lg" value="Empty Cart">
                </form>
            </div>

        <?php else: ?>

            <h3>You have no items in your shopping cart</h3>
            <a href="<?php echo e(url('/shop')); ?>" class="btn btn-primary btn-lg">Continue Shopping</a>

        <?php endif; ?>

        <div class="spacer"></div>

    </div> <!-- end container -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
    <script>
        (function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.quantity').on('change', function() {
                var id = $(this).attr('data-id')
                $.ajax({
                  type: "PATCH",
                  url: '<?php echo e(url("/cart")); ?>' + '/' + id,
                  data: {
                    'quantity': this.value,
                  },
                  success: function(data) {
                    window.location.href = '<?php echo e(url('/cart')); ?>';
                  }
                });

            });

        })();

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Kidshop\resources\views/cart.blade.php ENDPATH**/ ?>