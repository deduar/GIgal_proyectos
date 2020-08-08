@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Categories') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Check all Categories</h2>
            </div>


            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('category.create') }}"> Create new Category</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>
                <form action="{{ route('category.destroy',$category->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('category.show',$category->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('category.edit',$category->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $categories->links() !!}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection