@extends('layouts.app')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="#">All Products</a></li>
    
@stop

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                @if(session()->has('message'))
    <div class="alert alert-success">
    {{ session('message') }}
    </div>
@endif
                    <div class="card-header">Add Product</div>

                    <div class="card-body">
                           

                             <form class="well form-horizontal" action="{{url('/admin/product/add')}} " method="post"  id="contact_form">
                             <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                            
                            <label class="col-md-4 control-label">Category</label>  
                                @csrf
                                                    
                                <select id = "category_name" name="category_id">
                                @foreach ($categories as $name)
				                 
                                   <option name="category_id" value = "{{$name->id}}">{{$name->name}}</option>
				               @endforeach
                                
                                </select><br>
                                @error('category_id')
                        <span role="alert">
                            <p class="error">{{ $message }}</p>
                        </span>
                    	@enderror 
                                <label class="col-md-4 control-label">Name</label>  
                                @csrf
                                <input  name="name" placeholder="Product name" class="form-control"  type="text">
                                @error('name')
                        <span role="alert">
                            <p class="error">{{ $message }}</p>
                        </span>
                    	@enderror 
                                <label class="col-md-4 control-label">Description</label>  
                                @csrf
                                <input  name="description" placeholder="Description" class="form-control"  type="text">
                                @error('description')
                        <span role="alert">
                            <p class="error">{{ $message }}</p>
                        </span>
                    	@enderror 
                                <label class="col-md-4 control-label">Image</label>  
                                @csrf
                                <input  name="image" placeholder="image" class="form-control"  type="file">
                                @error('image')
                        <span role="alert">
                            <p class="error">{{ $message }}</p>
                        </span>
                    	@enderror 
                                <label class="col-md-4 control-label">price</label>  
                                @csrf
                                <input  name="price" placeholder="price" class="form-control"  type="text">
                                
                                @error('price')
                        <span role="alert">
                            <p class="error">{{ $message }}</p>
                        </span>
                    	@enderror 
                                <br>
                                <input class="btn btn-lg btn-success" type="submit" name="submit">
                                </div>

                        </fieldset>
                        </form>
                    </div>
                </div>
            </div>
         
        </div>
    </div>
    
@endsection

