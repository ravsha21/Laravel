@extends('layouts.app')

@section('content')
@include('slider')
    <div class="container">
        <p><a href="{{ url('/shop') }}">Shop</a> / {{ $product->name }}</p><br>
        <h1>{{ $product->name }}</h1>

        <hr>
        <?php  $category_name = DB::table('categories')->where('id',$product->category_id)->select('name')->first();?>
				<!-- it will return category name. I need this because, i set my image folder name according to category name. -->
				@foreach ($category_name as $name)
				     <!--$name  -->
				@endforeach
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('img/'.$name.'/'. $product->image) }}" width="300" height="300" alt="product" class="img-responsive">
            </div>

            <div class="col-md-8">
                <h3>${{ $product->price }}</h3>
                <form action="{{ url('/cart') }}" method="POST" class="side-by-side">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <input type="submit" class="btn btn-success btn-lg" value="Add to Cart">
                </form>

                


                <br><br>

                {{ $product->description }}
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
			@foreach ($interested as $product)
            <div class="col-md-6 col-lg-3">
			
            <?php 
            //get data from category table
            $category_name = DB::table('categories')->where('id',$product->category_id)->select('name')->first();?>
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
			</div>
			
    	</div>
    </section>
        <div class="spacer"></div>


    </div> <!-- end container -->
    @include('footer')
@endsection
