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
                <a href="{{ route('all.post') }}" class="btn btn-info">   All Post </a>
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
                <form action="{{URL::to('update-post/'.$post->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Post Title</label>
                            <input type="text" class="form-control" placeholder="Title" name="title" value="{{$post->title}}" required>
                        </div>
                    </div>
                    <br>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Post Category</label>
                            <select class="form-control" name="category_id"> 
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}"  <?php if($cat->id == $post->category_id) echo "selected"; ?> > {{$cat->name}} </option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Post Image</label>
                            <input type="file" class="form-control" name="image"> <br />
                            <img src="{{URL::to($post->image)}}" alt="{{$post->title}} image" style="height:100px; width: 150px;">
                            <input type="hidden" name="old_photo" value="{{$post->image}}"/>
                        </div>
                    </div>
                    <br>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Post Details</label>
                            <textarea rows="5" class="form-control" name="details" placeholder="Post Details" required>{{$post->details}}</textarea>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection