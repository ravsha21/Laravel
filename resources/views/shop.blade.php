@extends('layouts.app')

@section('content')
@include('slider')

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
			@foreach ($products->chunk(1) as $items)
			@foreach ($items as $product)
            <div class="col-md-6 col-lg-3">
			
			<?php  $category_name = DB::table('categories')->where('id',$product->category_id)->select('name')->first();?>
				<!-- it will return category name. I need this because, i set my image folder name according to category name. -->
				@foreach ($category_name as $name)
				     <!--$name  -->
				@endforeach
				
    				<div class="product">
    					<a href="{{ url('shop', [$product->id]) }}" class="img-prod"><img src="{{ asset('img/'.$name.'/'. $product->image) }}" alt="Colorlib Template" width="300" height="300">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<p>{{ $product->name }}</p>
    						<div class="d-flex">
    							<div class="price">
                    <p class="price">${{ $product->price }}</p>
                    <p class="btn-holder"><a href="{{ url('shop/'.$product->id) }}" class="btn btn-success btn-lg" role="button">Read more..</a> </p>

		    					</div>
	    					</div>
	    				
    					</div>
    				</div>
    			</div>
    			
		  @endforeach
		  @endforeach
			</div>
			
    	</div>
    </section>

   
	@include('footer')
@endsection