@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit post </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('post.index')}}">post list</a></li>
                        <li class="breadcrumb-item active">Edit post</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Edit post- {{$post->name }}</h3>
                                <a href="{{route('post.index')}}" class="btn btn-primary">post List</a>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                    <form action="{{route('post.update',[$post->id])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        @include('includes.errors')
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Post title</label>
                                                <input type="name" name="title" value="{{$post->title}}" class="form-control" id="title" placeholder="Enter title">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Post Category </label>
                                                <select name="category" id="category" class="form-control" value="{{old('category')}}">
                                                    <option value="" style="display: none">Select Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}" @if($post->category_id == $category->id) selected @endif>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <label for="image">Image</label>
                                                        <div class="custom-file">
                                                            <input type="file" name="image" class="custom-file-input" id="image">
                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 text-right">
                                                        <div style="max-width: 100px;max-height: 100px;overflow: hidden; margin-left:auto">
                                                            <img src="{{asset($post->image)}}" class="img-fluid" alt="">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Description</label>
                                                <textarea name="description" id="description" rows="4" class="form-control" placeholder="Enter Description">{{$post->description}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
