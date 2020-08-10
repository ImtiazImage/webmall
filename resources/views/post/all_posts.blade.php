@extends('welcome')

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url({{asset('frontend/img/about-bg.jpg')}})">
        <div class="overlay"></div>
        <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
                <h1>This is Display Posts page</h1>
                <span class="subheading">This is what I do.</span>
            </div>
            </div>
        </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-10 mx-auto">
            
                <a href="{{ route('write.post') }}" class="btn btn-danger"> Add Post </a>
                <hr />

                <table class="table table-responsive">
                    <tr>
                        <th>SL</th>
                        <th>Category Name</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->name}}</td>
                        <td>{{$post->title}}</td>
                        <td><img src="{{URL::to($post->image)}}" alt="" style="height:40px; width:70px"> </td>
                        <td>
                            <a href="{{URL::to('edit-post/'.$post->id)}}" class="btn btn-sm btn-info">Edit</a>
                            <a href="{{URL::to('delete-post/'.$post->id)}}" id="delete" class="btn btn-sm btn-danger">Delete</a>
                            <a href="{{URL::to('view-single-post/'.$post->id)}}" class="btn btn-sm btn-success">View</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection