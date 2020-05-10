@extends('layouts.app')

@section('content')
<div class="main_container">
    <div class="home_dashboard">
            <div class="dashboard">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image: url(images/bg_1.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-md-12 ftco-animate text-center">
	              <h1 class="mb-2">We serve Fresh Food</h1>
	              
	            </div>

	          </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image: url(images/bg_2.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-sm-12 ftco-animate text-center">
	              <h1 class="mb-2">100% Fresh Food</h1>
	              <h2 class="subheading mb-4">Good for Kids.</h2>
	              
	            </div>

	          </div>
	        </div>
	      </div>
	    </div>
    </section>

    <section class="ftco-section">
			<div class="container">
				<div class="row no-gutters ftco-services">
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-shipped"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Free Shipping</h3>
                <span>order now</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-diet"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Always Fresh</h3>
                <span>Product well package</span>
              </div>
            </div>    
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-award"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Superior Quality</h3>
                <span>Quality Products</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-customer-service"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Support</h3>
                <span>24/7 Support</span>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>
    <section class="ftco-section" id="latest_product">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          <?php 
          //get product data
          $products = DB::table('products')->limit(8)->latest()->get(); ?>
            <h2 class="mb-4">Latest Products</h2>
            
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
        @foreach($products as $product)
            <?php  
            //get category name
            $category_name = DB::table('categories')->where('id',$product->category_id)->select('name')->first();?>
                <!-- it will return category name. I need this because, i set my image folder name according to category name. -->
                @foreach ($category_name as $name)
                    <!--$name  -->
                @endforeach    		
            <div class="col-md-6 col-lg-3">
    				<div class="product">
    					<a href="{{ url('shop', [$product->id]) }}" class="img-prod"><img src="{{ asset('img/'.$name.'/'. $product->image) }}" alt="Colorlib Template" width="300" height="300">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<p>{{ $product->name }}</p>
    						<div class="d-flex">
    							<div class="price">
                    <p class="price">${{ $product->price }}</p>
                    <p class="btn-holder"><a href="{{ url('shop/'.$product->id) }}" class="btn btn-success btn-lg" role="button">View Product</a> </p>

		    					</div>
	    					</div>
	    				
    					</div>
    				</div>
    			</div>
    			
          @endforeach
    		</div>
    	</div>
    </section>

    </div>
            
    </div>
    
</div>
@include('footer')
@endsection
