@extends('layouts.app')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('shop.index') }}">All Products</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/cart/show') }}">Cart</a></li>
    <li class="breadcrumb-item">Checkout</li>

@stop

@section('content')
@include('slider')
<?php 
// get total price
$total_price = 0;
    foreach($results as $result){
      $price = $result->price;
      $total_price += $price;
    //  die();
    }  
   
    
?>
@if(!$results->isEmpty())
<section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
						<form action="{{url('/checkout/submit')}}" method="post" class="billing-form">
							<h3 class="mb-4 billing-heading">Billing Details</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
	                <div class="form-group">
                        <label for="firstname">Firt Name</label>
                        @csrf
                        <input name="first_name" placeholder="First Name" class="form-control @error('name') is-invalid @enderror"  type="text" >
						<!-- validation message  -->
						@error('first_name')
                        <span role="alert">
                            <p class="error">{{ $message }}</p>
                        </span>
                    	@enderror 	
	                </div>
	              </div>
	              <div class="col-md-12">
	                <div class="form-group">
	                	<label for="lastname">Last Name</label>
                        @csrf 
                        <input name="last_name" placeholder="Last Name" class="form-control"  type="text" required>
                           <!-- Text input-->
						   <!-- validation message  -->
						@error('last_name')
                        <span role="alert">
                            <p class="error">{{ $message }}</p>
                        </span>
                    	@enderror 
	                </div>
                </div>
                <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">State / Country</label>
                            @csrf
                            <input name="state" placeholder="state" class="form-control"  type="text" required>
							<!-- validation message  -->
						@error('state')
                        <span role="alert">
                            <p class="error">{{ $message }}</p>
                        </span>
                    	@enderror 
		            	</div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
	                	<label for="streetaddress">Street Address</label>
                        @csrf
                        <input name="address" placeholder="Address" class="form-control" type="text" required>	     
						<!-- validation message  -->
						@error('address')
                        <span role="alert">
                            <p class="error">{{ $message }}</p>
                        </span>
                    	@enderror           
						 </div>
		            </div>
		            
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
                        <label for="towncity">Town / City</label>
                        @csrf
                        <input name="city" placeholder="city" class="form-control"  type="text" required>
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="postcodezip">Postcode / ZIP *</label>
                            @csrf
                            <input name="zip_code" placeholder="Zip Code" class="form-control"  type="text" required>
							<!-- validation message  -->
						@error('zip_code')
                        <span role="alert">
                            <p class="error">{{ $message }}</p>
                        </span>
                    	@enderror 
	                </div>
					
		            </div>
					<div class="w-100"></div>
		            <div class="col-md-12">
	                <div class="form-group">
                        <label for="country">Country</label>
                        @csrf 
                        <input name="country" placeholder="Country" class="form-control" type="text" required>
						<!-- validation message  -->
						@error('country')
                        <span role="alert">
                            <p class="error">{{ $message }}</p>
                        </span>
                    	@enderror 
	                </div>
	              </div>
		            <div class="w-100"></div>
		            <div class="col-md-12">
	                <div class="form-group">
                        <label for="phone">Phone</label>
                        @csrf 
                        <input name="phone_number" placeholder="Phone number" class="form-control" type="text" required>
						<!-- validation message  -->
						@error('phone_number')
                        <span role="alert">
                            <p class="error">{{ $message }}</p>
                        </span>
                    	@enderror 
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
		    						<span>${{$total_price}}</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Shipping</span>
		    						<span>Free</span>
		    					</p>
		    					
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Total</span>
		    						<span>${{$total_price}}</span>
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
	@else

	<section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7">
			<h3 class="mb-4 billing-heading">Billing Details</h3>
	         <p> Your cart is empty. Please do shopping first for checkout. </p>
			 <p class="col-md-4" style="float:left;">
                            <a href="{{ url('home/#latest_product') }}" class="btn btn-block btn-primary">Continue Shopping</a>
                        </p>
		   </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section --> 
         @endif
@include('footer')
@endsection

