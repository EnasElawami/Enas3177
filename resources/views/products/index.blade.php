@extends('layouts.admin')


@section('content')
    <div class="container">
        <h1>Products</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Create Product</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="img-thumbnail" style="width: 100px;">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
