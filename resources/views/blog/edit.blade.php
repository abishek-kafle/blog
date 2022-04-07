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
                            <h3>Add Blog</h3>
                        </div>
                        <div class="col-md-3">
                            <a href="{{route('blog.index')}}" class="btn btn-info">View Blog</a>
                        </div>
                    </div>
                    <form action="{{route('blog.update', $blog->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{$blog->title}}">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" id="editor" class="form-control editor" rows="10">{{$blog->content}}</textarea>
                            <script>
                                ClassicEditor
                                        .create( document.querySelector( '#editor' ) )
                                        .then( editor => {
                                                console.log( editor );
                                        } )
                                        .catch( error => {
                                                console.error( error );
                                        } );
                            </script>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="category">Category</label>
                                <select class="form-control" id="category" name="category">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="author">Author</label>
                                <select class="form-control" id="author" name="author">
                                    @foreach ($authors as $author)
                                        <option value="{{$author->id}}">{{$author->full_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



