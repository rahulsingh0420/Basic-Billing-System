@extends('layouts.app')

@section('title', "| Users")
@section('header', 'Users')

@section('content')
    <h1 class="mb-4">Users</h1>

    <a href="{{ route('users.create') }}" class="mb-3 btn btn-primary">
        <i class='bx bx-plus'></i> Create New User
    </a>
    <div class="row">
        <div class="mb-3 col-md-4">
            <div class="border-success card">
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                         <span class="badge text-bg-success">It's Your Account</span>
                    </div>
                    <h5 class="card-title">{{ auth()->user()->name }}</h5>
                    <p class="card-text">{{ auth()->user()->email }}</p>
                    <a href="{{ route('users.show', auth()->user()) }}" class="btn btn-info">
                        <i class='bx bx-show'></i> View
                    </a>
                    <a href="{{ route('users.editAdmin', auth()->user()) }}" class="btn btn-warning">
                        <i class='bx bx-edit'></i> Edit
                    </a>
                    <form action="{{ route('users.destroy', auth()->user()) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class='bx bx-trash'></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        @foreach ($users as $user)
            <div class="mb-3 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text">{{ $user->email }}</p>
                        <a href="{{ route('users.show', $user) }}" class="btn btn-info">
                            <i class='bx bx-show'></i> View
                        </a>
                        <a href="{{ route('users.editAdmin', $user) }}" class="btn btn-warning">
                            <i class='bx bx-edit'></i> Edit
                        </a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class='bx bx-trash'></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $users->links() }}
@endsection
