@extends('layouts.app')

@section('title', "| Update $product->name")
@section('header', 'Update Product')

@section('content')
    <h1 class="mb-4">Edit Product</h1>
    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3 form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}">
            @error('name')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3 form-group">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control" step="0.01" value="{{ $product->price }}">
            @error('price')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3 form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
            @error('description')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">
            <i class='bx bx-save'></i> Update
        </button>
    </form>
@endsection
