@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Link</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" href="#">Disabled</a>
                                </li>
                            </ul>
                            <form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>
                    </nav>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="float-left">
                                <h2>All Subsidies</h2>
                            </div>
                            <div class="float-right">
                                <a class="btn btn-success" href="{{ route('subsidy.create') }}"> Create new Subsidies</a>
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
                            <th>Agency</th>
                            <th width="250px">Action</th>
                        </tr>
                        @foreach ($subsidies as $subsidy)
                        <tr> 
                            <td>{{ $subsidy->name }}</td>
                            <td>{{ $subsidy->agency }}</td>
                            <td>{{ $subsidy->description }}</td>
                            <td>
                                <form action="{{ route('subsidy.destroy',$subsidy->id) }}" method="POST">

                                    <a class="btn btn-info" href="{{ route('subsidy.show',$subsidy->id) }}">Show</a>

                                    <a class="btn btn-primary" href="{{ route('subsidy.edit',$subsidy->id) }}">Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                    {!! $subsidies->links() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection