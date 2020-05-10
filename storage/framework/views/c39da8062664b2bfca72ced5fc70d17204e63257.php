<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Kidshop')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/jquery-migrate-3.0.1.min.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/popper.min.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/jquery.easing.1.3.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/jquery.waypoints.min.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/jquery.stellar.min.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/jquery.magnific-popup.min.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/aos.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/jquery.animateNumber.min.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/aos.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/bootstrap-datepicker.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/scrollax.min.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/scrollax.min.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/main.js')); ?>" defer></script>
   
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/open-iconic-bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/animate.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/owl.carousel.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/owl.theme.default.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/magnific-popup.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/aos.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/ionicons.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/bootstrap-datepicker.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/jquery.timepicker.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/flaticon.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/icomoon.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    
</head>
<body>
    <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    Kidshop
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            </li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>

                        <li class="nav-item active"><a href="<?php echo e(url('home')); ?>" class="nav-link">Home</a></li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Shop Menu <span class="caret"></span>
                            </a>
                         
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <?php 
                            // get category data to show category name in nav bar
                            $category = DB::table('categories')->get(); ?>
                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="dropdown-item" href="<?php echo e(url('/category')); ?>/<?php echo e($cat->id); ?>">
                                <?php echo e($cat->name); ?>

                                </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </li>
	                    <li class="nav-item"><a href="<?php echo e(url('/home/#contact_us')); ?>" class="nav-link">About</a></li>
	                    <li class="nav-item"><a href="<?php echo e(url('/home/#contact_us')); ?>" class="nav-link">Contact</a></li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                        <?php  
                        // get cart items count according to current user 
                        $id = auth()->user()->id;
                        $cart = DB::table('carts')->where('user_id',$id)->count(); 
                        
                        ?>
                        <li class="nav-item cta cta-colored"><a href="<?php echo e(url('cart/show')); ?>" class="nav-link"><span class="icon-shopping_cart"></span>[<?php echo e($cart); ?>]</a></li>

                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="start_here">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
        
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Kidshop\resources\views/layouts/app.blade.php ENDPATH**/ ?>