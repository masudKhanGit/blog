@extends('backend.backend-master')
@section('title', 'Category | Manage Page')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <span class="text-success">{{ Session::get('message') }}</span>
                        <h1 class="text-center">Manage Category</h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Id</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($categoryes as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->category_name }}</td>
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
                    <div class="card-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
