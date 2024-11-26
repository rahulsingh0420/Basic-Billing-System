@extends('layouts.app')

@section('title', "| Profile $user->name")
@section('header', 'User Profile')

@section('content')
    <h1 class="mb-4">Edit Profile</h1>
    <form action="{{ route('users.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3 form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
            @error('name')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">
            <i class='bx bx-save'></i> Update
        </button>
    </form>
@endsection
