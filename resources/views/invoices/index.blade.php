@extends('layouts.app')

@section('title', "| Invoices")
@section('header', 'Invoices')

@section('content')
    <h1 class="mb-4">Invoices</h1>

    <a href="{{ route('invoices.create') }}" class="mb-3 btn btn-primary">
        <i class='bx bx-plus'></i> Create New Invoice
    </a>
    <div class="row">
        @foreach ($invoices as $invoice)
            <div class="mb-3 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $invoice->invoice_number }}</h5>
                        <p class="card-text">Customer: {{ $invoice->customer_name }}</p>
                        <p class="card-text">Amount: ₹{{ $invoice->amount }}</p>
                        <p class="card-text">Due Date: {{ $invoice->due_date }}</p>
                        <a href="{{ route('invoices.show', $invoice) }}" class="btn btn-info">
                            <i class='bx bx-show'></i> View
                        </a>
                        <a href="{{ route('invoices.edit', $invoice) }}" class="btn btn-warning">
                            <i class='bx bx-edit'></i> Edit
                        </a>
                        <form action="{{ route('invoices.destroy', $invoice) }}" method="POST" class="d-inline">
                            @csrf
                            @if (auth()->user()->role === 'admin')
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class='bx bx-trash'></i> Delete
                                </button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $invoices->links(); }}
@endsection
