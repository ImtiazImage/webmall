@extends('welcome')
@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url({{asset('frontend/img/about-bg.jpg')}})">
        <div class="overlay"></div>
        <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
                <h1>This is Display Post page</h1>
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
            
                <a href="{{ route('write.post') }}" class="btn btn-danger"> Add Post </a>
                <a href="{{ route('all.post') }}" class="btn btn-info">   All Posts </a>
                <hr />
                    <!-- <li>Id:   {{$post->id}}</li> -->
                    <h4>Title: {{$post->title}}</h4>
                    <p>Details: {{$post->details}}</p>
                    <p>Post Category: {{$post->name}}</p>
                    <p>Image:</p> <img src="{{URL::to($post->image)}}" alt="" style="height:100px; width:150px">
                    <p>Created at: 
                    @if($post->created_at == '')
                        Not set yet!
                    @else
                        {{$post->created_at}}</p>
                    @endif
            </div>
        </div>
    </div>
@endsection