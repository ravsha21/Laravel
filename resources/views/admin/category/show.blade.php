@extends('layouts.app')

@section('content')

    <div class="container">
    <div class="card-body">
                        <div class="rounded bg-white">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                
                                    <th>Name</th>
                                    <th>New Name</th>
                                    <th>Actions</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                               
                                @foreach ($category as $item)
                                    <tr>
                                        <td> {{ $item->name }} </td>
                                         <td>
                                            <form style="display:inline-block;" class="form-inline" action="{{ url('admin/category/update') }}/{{ $item->id }}" method="POST">
                                                @csrf

                                                <input type="text" name="name" value="{{ $item->name }}" class="w-25" />
                                                
                                            
                                        </td>
    
                                        <td>
                                        <input type="submit" name="Update" value="Update" class="text-update" />
                                            </form>
                                            <form style="display:inline-block;" class="form-inline" action="{{ url('admin/category/delete') }}/{{ $item->id }}" method="POST">
                                            @csrf
                                            <input type="submit" name="Delete" value="Delete" class="text-delete" />
                                             </form>
                                            
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                               
                            </table>
                            <p class="col-md-4" style="float:right;">
                        <a href="{{url('admin/category') }}" class="btn btn-block btn-primary">Add Category</a>                        
                        </p>
                        </div>


    </div> <!-- end container -->

@endsection