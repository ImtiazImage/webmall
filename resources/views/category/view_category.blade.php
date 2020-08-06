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
                <ol>
                    <li>Id:   {{$category->id}}</li>
                    <li>Name: {{$category->name}}</li>
                    <li>Slug: {{$category->slug}}</li>
                    <li>Created at: 
                    @if($category->created_at == '')
                        Not set yet!
                    @else
                        {{$category->created_at}}</li>
                    @endif
                </ol>
            </div>
        </div>
    </div>
@endsection