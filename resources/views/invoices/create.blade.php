@extends('layouts.app')

@section('title', "| Create New Invoice")
@section('header', 'Create Invoice')

@section('content')
    <h1 class="mb-4">Create Invoice</h1>
    <form action="{{ route('invoices.store') }}" method="POST">
        @csrf
        <div class="mb-3 form-group">
            <label for="customer_name">Customer Name</label>
            <input type="text" name="customer_name" id="customer_name" class="form-control">
            @error('customer_name')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3 form-group">
            <label for="products">Products</label>
            <select name="products[]" id="products" class="form-control" multiple>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
                @endforeach
            </select>
            @error('products')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3 form-group">
            <label for="amount">Amount</label>
            <input type="text" name="amount" id="amount" class="form-control" readonly>
        </div>
        <div class="mb-3 form-group">
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" id="due_date" class="form-control">
            @error('due_date')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">
            <i class='bx bx-save'></i> Create
        </button>
    </form>

    <script>
        document.getElementById('products').addEventListener('change', function() {
            let totalAmount = 0;
            Array.from(this.selectedOptions).forEach(option => {
                totalAmount += parseFloat(option.getAttribute('data-price'));
            });
            document.getElementById('amount').value = totalAmount.toFixed(2);
        });
    </script>
@endsection
