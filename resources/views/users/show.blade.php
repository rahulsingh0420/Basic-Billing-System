@extends('layouts.app')

@section('title', "| $user->name")
@section('header', 'User')

@section('content')
    <h1 class="mb-4">{{ $user->name }}</h1>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">
        <i class='bx bx-arrow-back'></i> Back to Users
    </a>
@endsection
