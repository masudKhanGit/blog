@extends('backend.backend-master')
@section('title', 'Category | Create')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 mx-auto">
                <h1>Add Category <span>{{ Session::get('message') }}</span></h1>
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="category_name" id="category_name"
                            placeholder="Add Category Name" aria-describedby="emailHelp">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </form>
            </div>
        </div>
    </div>
@endsection
