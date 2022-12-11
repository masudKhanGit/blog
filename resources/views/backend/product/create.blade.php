@extends('backend.backend-master')
@section('title', 'Product | Create')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h1>Add Product <span>{{ Session::get('message') }}</span></h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="">Category</label>
                                <select class="form-select" name="category_id">
                                    <option value="" selected>-----Choose Your Category-----</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{$category->category_name}}</option>                                
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger mt-2">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="">Brand</label>
                                <select class="form-select" name="brand_id">
                                    <option value="" selected>-----Choose Your Brand-----</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{$brand->brand_name}}</option>                                
                                    @endforeach
                                </select>
                                @error('brand_id')
                                    <span class="text-danger mt-2">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="product_name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" name="product_name" id="product_name"
                                    placeholder="Add Product Name" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Product Price</label>
                                <input type="number" class="form-control" name="price" id="price"
                                    placeholder="Add Product Price" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Product Image</label>
                                <input type="file" class="form-control" name="image" id="image" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Product Description</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
