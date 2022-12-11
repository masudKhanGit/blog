@extends('backend.backend-master')
@section('title', 'Brand Category | Create')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 mx-auto">
                <h1>Add Brand <span>{{ Session::get('message') }}</span></h1>
                <form action="{{ route('store-brand') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="brand_name" class="form-label">Brand Name</label>
                        <input type="text" class="form-control" name="brand_name" id="brand_name"
                            placeholder="Add Brand Name" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="category_name">Select Category</label>
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Brand</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
