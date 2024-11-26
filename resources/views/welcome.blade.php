@extends('layouts.app')

@section('title', '| Home')
@section('header', 'Home')

@section('content')
    <h4>Hello, {{ Auth::user()->name }}</h4>
    <h6 class="text-info">Where Do You Want To Go</h6>
    <hr>
    <ul class="mx-auto mb-2 navbar-nav mb-lg-0">
        @auth
            <li class="nav-item">
                <a class="nav-link active text-primary" aria-current="page" href="{{ route('dashboard') }}">Home</a>
            </li>
            @if (auth()->user()->role === 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}">Users</a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ route('invoices.index') }}">Invoices</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.edit') }}">Profile</a>
            </li>
        @endauth
    </ul>
@endsection
