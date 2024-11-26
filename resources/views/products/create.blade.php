@extends('layouts.app')

@section('title', "| Create New Product")
@section('header', 'Create Product')

@section('content')
    <h1 class="mb-4">Create Product</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="mb-3 form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
            @error('name')
                    <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3 form-group">
            <label for="price">Price</label>
            <input name="price" id="price" class="form-control">
            @error('price')
                    <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3 form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
            @error('description')
                    <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">
            <i class='bx bx-save'></i> Create
        </button>
    </form>
@endsection
