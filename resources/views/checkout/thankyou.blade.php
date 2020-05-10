@extends('layouts.app')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="#">All Products</a></li>
    <li class="breadcrumb-item"><a href="#">Cart</a></li>
    <li class="breadcrumb-item">Checkout</li>
    <li class="breadcrumb-item">Order Complete</li>

@stop

@section('content')
@include('slider')
    <div class="container">
        <br>
        <!-- get current user name -->
        <h2>Wonderful {{Auth::user()->name}}</h2>
        <hr>

         <!-- check session messages if item deleted or updated -->
         @if(session()->has('message'))
    <div class="alert alert-success">
    {{ session('message') }}
    </div>
@endif

        <h3>Next Steps</h3>

        <ol>
            <li>Your order will be prepared with in 15 to 20 minuts.</li>
            <li>You can pay by card or cash on delivery.</li>
            <li>You can call us to get information about your order on +64 2222 22222.</li>
        </ol>

        

    </div>
	@include('footer')
@endsection
