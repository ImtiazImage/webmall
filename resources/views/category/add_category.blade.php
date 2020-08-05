@extends('welcome')

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url({{asset('frontend/img/about-bg.jpg')}})">
        <div class="overlay"></div>
        <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
                <h1>This is write post page</h1>
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('store.category') }}" method="post">
                    @csrf
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Category Name</label>
                            <input type="text" class="form-control" placeholder="Category Name" name="name" >
                        </div>
                    </div>
                    <br>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Category Slug</label>
                            <input type="text" class="form-control" placeholder="Slug Name" name="slug" >
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection