@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @include('includes.navbar')
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <h3>Add Category</h3>
                        </div>
                        <div class="col-md-3">
                            <a href="{{route('category.index')}}" class="btn btn-info">View Category</a>
                        </div>
                    </div>
                    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="10"></textarea>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="title">Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

