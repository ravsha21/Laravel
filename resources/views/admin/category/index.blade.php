@extends('layouts.app')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="#">All Products</a></li>
    
@stop

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add Category</div>

                    <div class="card-body">
                           

                             <form class="well form-horizontal" action="{{url('/admin/category/add')}} " method="post"  id="contact_form">
                             <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                            
                                <label class="col-md-4 control-label">Name</label>  
                                @csrf
                                <input  name="name" placeholder="Category name" class="form-control"  type="text">
   
                                <br>
                                <input class="btn btn-lg btn-success" type="submit" name="submit">
                                </div>
                                <p class="col-md-4" style="float:right;">
                        <a href="{{url('admin/category/show') }}" class="btn btn-block btn-primary">All Categories</a>                        
                        </p>
                        </fieldset>
                        </form>
                    </div>
                </div>
            </div>
         
        </div>
    </div>
@endsection

