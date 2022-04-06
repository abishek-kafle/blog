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
                            <h3>All Categories</h3>
                        </div>
                        <div class="col-md-3">
                            <a href="{{route('category.add')}}" class="btn btn-info">Add Category</a>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->title}}</td>
                                <td><img src="{{asset('uploads/'.$category->image)}}" alt="No Image" style="width: 150px;"></td>
                                <td>
                                    <a href="{{ route('category.delete',$category->id) }}" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></a>
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


