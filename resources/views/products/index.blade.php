@extends('layouts.app')

@section('title', "| Products")
@section('header', 'Products')

@section('content')
    <h1 class="mb-4">Products</h1>
    <a href="{{ route('products.create') }}" class="mb-3 btn btn-primary">
        <i class='bx bx-plus'></i> Create New Product
    </a>
    <div class="row">
        @foreach ($products as $product)
            <div class="mb-3 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">Price: ₹{{ $product->price }}</p>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-info">
                            <i class='bx bx-show'></i> View
                        </a>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">
                            <i class='bx bx-edit'></i> Edit
                        </a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class='bx bx-trash'></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $products->links() }}
@endsection
