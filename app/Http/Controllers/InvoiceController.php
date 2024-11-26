<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Product;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::orderBy('created_at', 'desc')->paginate(1);
        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        $products = Product::all();
        return view('invoices.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'products' => 'required|array',
            'products.*' => 'exists:products,id',
            'due_date' => 'required|date',
        ]);

        $invoiceNumber = 'INV-' .Invoice::count() + 1 . mt_rand(1, 99999999);

        $products = Product::whereIn('id', $request->products)->get();
        $amount = $products->sum('price');

        $validated['invoice_number'] = $invoiceNumber;
        $validated['amount'] = $amount;
        $validated['products'] = json_encode($request->products);
        $validated['user_id'] = auth()->id();

        Invoice::create($validated);

        return redirect()->route('invoices.index')->with('true', 'Invoice created successfully.');
    }

    public function show(Invoice $invoice)
    {
        $productIds = json_decode($invoice->products, true);
        $products = Product::whereIn('id', $productIds)->get();
        return view('invoices.show', compact('invoice', 'products'));
    }

    public function edit(Invoice $invoice)
    {
        $products = Product::all();
        $invoice->products = json_decode($invoice->products, true);
        return view('invoices.edit', compact('invoice', 'products'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'products' => 'required|array',
            'products.*' => 'exists:products,id',
            'due_date' => 'required|date',
        ]);

        $products = Product::whereIn('id', $request->products)->get();
        $amount = $products->sum('price');

        $validated['amount'] = $amount;
        $validated['products'] = json_encode($request->products);
        $invoice->update($validated);

        return redirect()->route('invoices.index')->with('true', 'Invoice updated successfully.');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return redirect()->route('invoices.index')->with('true', 'Invoice deleted successfully.');
    }
}
