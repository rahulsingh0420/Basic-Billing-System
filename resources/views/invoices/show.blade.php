@extends('layouts.app')

@section('title', "| $invoice->invoice_number")
@section('header', 'Invoice')

@section('content')
    <h1 class="mb-4">Invoice Details</h1>
    <div class="mb-3 card" id="invoice">
        <div class="card-body">
            <h5 class="card-title">{{ $invoice->invoice_number }}</h5>
            <p class="card-text"><strong>Customer:</strong> {{ $invoice->customer_name }}</p>
            <p class="card-text"><strong>Amount:</strong> ₹{{ $invoice->amount }}</p>
            <p class="card-text"><strong>Due Date:</strong> {{ $invoice->due_date }}</p>
            <p class="card-text"><strong>Products:</strong></p>
            <ul>
                @foreach($products as $product)
                    <li>{{ $product->name }} - ₹{{ $product->price }}</li>
                @endforeach
            </ul>
            <a href="{{ route('invoices.index') }}" class="btn btn-secondary" id="back-button">
                <i class='bx bx-arrow-back'></i> Back to Invoices
            </a>
            <button onclick="printInvoice()" class="btn btn-primary" id="print-button">
                <i class='bx bx-printer'></i> Print Invoice
            </button>
        </div>
    </div>

    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            #invoice, #invoice * {
                visibility: visible;
            }
            #back-button, #print-button {
                display: none;
            }
            #invoice {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                padding: 20px;
                font-size: 14px;
            }
        }
    </style>

    <script>
        function printInvoice() {
            window.print();
        }
    </script>
@endsection
