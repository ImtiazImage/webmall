@extends('welcome')

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url({{asset('frontend/img/about-bg.jpg')}})">
        <div class="overlay"></div>
        <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
                <h1>This is Display Category page</h1>
                <span class="subheading">This is what I do.</span>
            </div>
            </div>
        </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
            
                <a href="{{ route('add.category') }}" class="btn btn-danger"> Add Category </a>
                <a href="{{ route('all.category') }}" class="btn btn-info">   All Category </a>
                <hr />

                <table class="table table-responsive">
                    <tr>
                        <th>SL</th>
                        <th>Category Name</th>
                        <th>Slug Name</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    @foreach($category as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->slug}}</td>
                        <td>{{$category->created_at}}</td>
                        <td>
                            <a href="{{URL::to('edit-category/'.$category->id)}}" class="btn btn-sm btn-info">Edit</a>
                            <a href="{{URL::to('delete-category/'.$category->id)}}" id="delete" class="btn btn-sm btn-danger">Delete</a>
                            <a href="{{URL::to('single-view-category/'.$category->id)}}" class="btn btn-sm btn-success">View</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection