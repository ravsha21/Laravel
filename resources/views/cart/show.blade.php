@extends('layouts.app')

@section('breadcrumbs')
    <li class="breadcrumb-item">Cart</li>
@stop

@section('content')
@include('slider')
    <div class="container">
        <h1>Shopping Cart</h1>
        <hr>
        <!-- check session messages if item deleted or updated -->
        @if(session()->has('message'))
    <div class="alert alert-success">
    {{ session('message') }}
    </div>
@endif

<!-- get message if item deleted successfully -->
@if(session()->has('delete_message'))
    <div class="alert alert-success">
    {{ session('delete_message') }}
    </div>
@endif
       <!-- check if results have no record -->
        @if(!$results)
            <div class="alert alert-info">
                Your cart is empty
            </div>

            <p><a href="{{ url('home/#latest_product') }}" class="btn-lg pl-0">Continue Shopping</a></p>
        @else
        
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-light">
                    <div class="card-header">Food Items</div>

                    <div class="card-body">
                        <div class="rounded bg-white">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                
                                    <th colspan="2">Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Actions</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                <?php $total = 0; ?>
                                <!-- get data from cart table -->
                                @foreach ($results as $item)
                               <?php  
                                $category_name = DB::table('categories')->where('id',$item->category_id)->select('name')->first();?>
				<!-- it will return category name. I need this because, i set my image folder name according to category name. -->
				@foreach ($category_name as $name)
				     <!--{{$name }} -->
                @endforeach
                
                                    <tr>
                                        <td width="55"><img src="{{ asset('img/'.$name.'/'. $item->image) }}" alt="product" class="img-responsive" width="100" height="100"></td>
                                        <td>
                                            <a href="#">
                                                {{ $item->name }}
                                                
                                            </a></td>
                                            
                                        <td>{{ $item->price }}</td>
                                        <td>
                                            <form style="display:inline-block;" class="form-inline" action="{{ url('/update') }}/{{ $item->id }}" method="POST">
                                                @csrf
                                                <input type="number" name="qty" value="{{ $item->quantity }}" min="1" max="10" />
                                                
                                            
                                        </td>
    
                                        <td>
                                        <input type="submit" name="Update" value="Update" class="text-update" />
                                            </form>
                                            <form style="display:inline-block;" class="form-inline" action="{{ url('/delete') }}/{{ $item->id }}" method="POST">
                                            @csrf
                                            <input type="submit" name="Delete" value="Delete" class="text-delete" />
                                             </form>
                                            
                                        </td>
                                    </tr>

                                    <?php 
                                    //get total price of cart items
                                    $total += $item->price; 
                                    ?>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th colspan="4"></th>
                                    <th>
                                        Total: {{ $total }}
                                    </th>
                                    <th></th>
                                </tr>
                                </tfoot>

                            </table>
                        </div>

                        <p class="col-md-4" style="float:left;">
                            <a href="{{ url('home/#latest_product') }}" class="btn btn-block btn-primary">Continue Shopping</a>
                        </p>
                        <p class="col-md-4" style="float:right;">
                        <a href="{{ route('checkout.show') }}" class="btn btn-block btn-primary">Proceed To Checkout</a>                        
                        </p>

                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    @include('footer')
@endsection
