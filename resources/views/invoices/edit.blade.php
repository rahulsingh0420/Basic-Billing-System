@extends('layouts.app')

@section('title', "| Update $invoice->invoice_number")
@section('header', 'Update Invoice')

@section('content')
    <h1 class="mb-4">Edit Invoice</h1>
    <form action="{{ route('invoices.update', $invoice) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3 form-group">
            <label for="customer_name">Customer Name</label>
            <input type="text" name="customer_name" id="customer_name" class="form-control" value="{{ $invoice->customer_name }}">
            @error('customer_name')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3 form-group">
            <label for="products">Products</label>
            <select name="products[]" id="products" class="form-control" multiple>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" data-price="{{ $product->price }}" {{ in_array($product->id, $invoice->products) ? 'selected' : '' }}>{{ $product->name }}</option>
                @endforeach
            </select>
            @error('products')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3 form-group">
            <label for="amount">Amount</label>
            <input type="text" name="amount" id="amount" class="form-control" value="{{ $invoice->amount }}" readonly>
        </div>
        <div class="mb-3 form-group">
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" id="due_date" class="form-control" value="{{ $invoice->due_date }}">
            @error('due_date')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">
            <i class='bx bx-save'></i> Update
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
