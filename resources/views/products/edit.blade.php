@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
    <div class="container">
        <h1>Edit Product</h1>
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ $product->price }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Product Image:</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="img-thumbnail mt-2" style="width: 150px;">
                @endif
            </div>
            <button type="submit" class="btn btn-success mt-3">Update</button>
        </form>
    </div>
@endsection