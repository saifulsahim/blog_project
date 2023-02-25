@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">post List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        {{--                        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>--}}
                        <li class="breadcrumb-item active">post List</li>
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
                                <h3 class="card-title">post List</h3>
                                <a href="{{route('post.create')}}" class="btn btn-primary">Create post</a>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>

                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Author</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($posts->count())
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->category->name}}</td>
                                        <td>
                                            <div style="max-width: 70px;max-height: 70px;overflow: hidden">
                                                <img src="{{asset($post->image)}}" class="img-fluid" alt="">
                                            </div>
                                        </td>
                                        <td>{{$post->user->name}}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('post.show', [$post->id]) }}" class="btn btn-sm btn-success mr-1"> <i class="fas fa-eye"></i> </a>
                                            <a href="{{route('post.edit',[$post->id])}}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
                                            <form action="{{route('post.destroy',[$post->id])}}" class="mr-1" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">
                                            <h5 class="text-center">no post found</h5>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
