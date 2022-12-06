@extends('backend.backend-master')
@section('title', 'Category | Manage Page')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12 mx-auto">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($categoryes as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>
                                    <a href="{{ editManageCategory, $category->$id }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ deleteManageCategory, $category->$id }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
