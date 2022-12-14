@extends('backend.backend-master')
@section('title', 'Category | Manage Page')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <span class="text-success">{{ Session::get('message') }}</span>
                        <h1 class="text-center">Manage Category</h1>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple" class="table table-striped">
                            <tr>
                                <th>Serial Number</th>
                                <th>Category Name</th>
                                <th>Brand</th>
                                <th>Product</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($categoryes as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->brand_count }}</td>
                                    <td>{{ $category->product_count }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td class="{{ $category->status === 1 ? 'text-success' : 'text-danger' }}">
                                        {{ $category->status === 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('edit-category', ['id' => $category->id]) }}"
                                            class="btn btn-primary">Edit</a>
                                        <a href="{{ route('delete-category', ['id' => $category->id]) }}"
                                            class="btn btn-danger"
                                            onclick="return confirm('Are your sure delete this category')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
