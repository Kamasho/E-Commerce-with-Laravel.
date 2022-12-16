@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="card-header">
            <h4 style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Products</h4>
            <hr>
        </div>
            <table class="table table-border table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Original Price</th>
                        <th>Selling Price</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->orginal_price }}</td>
                        <td>{{ $item->selling_price }}</td>
                        <td>
                            <img src="{{ asset('assets/uploads/product/'.$item->image) }}" class="cate-image" alt="image here">
                        </td>
                        <td>
                            <a href="{{ url('edit-product/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ url('delete-product/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>
@endsection
