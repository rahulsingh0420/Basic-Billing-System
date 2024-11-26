@extends('layouts.app')

@section('title', "| Login")

@section('content')
    <h1 class="my-5 text-center text-success text-decoration-underline">
        Login To Your Dashboard
    </h1>
    <div class="mb-5 d-flex w-100 justify-content-center">
        <form action="{{ route('authenticate') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-info fw-bold">Email address</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('email')
                    <small class="text-danger fw-bold">{{ $message }}</small>
                @enderror
                <div id="emailHelp" class="form-text">Enter You Email Which Is Provided To You Or You Have.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label text-info fw-bold">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                @error('password')
                    <small class="text-danger fw-bold">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="checkbox" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1"><small>remember me</small></label>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="text-white btn btn-info">Login To Account</button>
            </div>
        </form>
    </div>
@endsection
