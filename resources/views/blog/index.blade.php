@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @include('includes.messages')
                <div class="card-header">
                    @include('includes.navbar')
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <h3>All Blogs</h3>
                        </div>
                        <div class="col-md-3">
                            <a href="{{route('blog.add')}}" class="btn btn-info">Add Blog</a>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Author</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                            <tr>
                                <td>{{$blog->id}}</td>
                                <td>{{$blog->title}}</td>
                                <td>{{$blog->category}}</td>
                                <td>{{$blog->author}}</td>
                                <td>
                                    <a href="{{route('blog.edit', $blog->id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
