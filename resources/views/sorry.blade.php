@extends('layouts.app')


@section('content')

    <div class="container">
        <br>
        <!-- get current user name -->
        <h2>Sorry {{Auth::user()->name}}</h2>
        <hr>


        <p>Your do not have permission to access this page.</p>
            
        
        

    </div>
	@include('footer')
@endsection
