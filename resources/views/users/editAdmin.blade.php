@extends('layouts.app')

@section('title', "| Update $user->name")
@section('header', 'Update User')

@section('content')
    <h1 class="mb-4">Edit User</h1>
    <form action="{{ route('users.updateAdmin', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3 form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
            @error('name')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3 form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
            @error('email')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3 form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
            @error('password')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3 form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">
            <i class='bx bx-save'></i> Update
        </button>
    </form>
@endsection
