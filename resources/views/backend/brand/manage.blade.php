@extends('backend.backend-master')
@section('title', 'Brand Category | Manage Page')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <span class="text-success">{{ Session::get('message') }}</span>
                        <h1 class="text-center">Manage Brand</h1>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple" class="table table-striped">
                            <tr>
                                <th>Serial Number</th>
                                <th>Brand Name</th>
                                <th>Brand</th>
                                <th>Product</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($brands as $brand)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td>{{ $brand->brand_count }}</td>
                                    <td>{{ $brand->product_count }}</td>
                                    <td>{{ $brand->slug }}</td>
                                    <td class="{{ $brand->status === 1 ? 'text-success' : 'text-danger' }}">
                                        {{ $brand->status === 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        {{-- {{ route('edit-brand', ['id' => $brand->id]) }} --}}
                                        <a href="" class="btn btn-primary">Edit</a>
                                        {{-- {{ route('delete-brand', ['id' => $brand->id]) }} --}}
                                        <a href="" class="btn btn-danger"
                                            onclick="return confirm('Are your sure delete this brand')">Delete</a>
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
