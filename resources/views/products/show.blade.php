@extends('layouts.app')

@section('title', "| $product->name")
@section('header', 'Product')

@section('content')
    <h1 class="mb-4">{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <p><strong>Price:</strong> ₹{{ $product->price }}</p>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">
        <i class='bx bx-arrow-back'></i> Back to Products
    </a>
@endsection
