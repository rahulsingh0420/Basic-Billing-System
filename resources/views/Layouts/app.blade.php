<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demo Biller @yield('title', '')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>

<body class="bg-dark-subtle">

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">Demo Biller</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="mx-auto mb-2 navbar-nav mb-lg-0">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active text-primary fw-bold' : '' }}"
                                aria-current="page" href="{{ route('dashboard') }}">Home</a>
                        </li>
                        @if (auth()->user()->role === 'admin')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('products.index') ? 'active text-primary fw-bold' : '' }}"
                                    href="{{ route('products.index') }}">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('users.index') ? 'active text-primary fw-bold' : '' }}"
                                    href="{{ route('users.index') }}">Users</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('invoices.index') ? 'active text-primary fw-bold' : '' }}"
                                href="{{ route('invoices.index') }}">Invoices</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('users.edit') ? 'active text-primary fw-bold' : '' }}"
                                href="{{ route('users.edit') }}">Profile</a>
                        </li>
                    @endauth

                </ul>
                <div class="d-flex">
                    @auth
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn d-flex align-items-center text-danger fw-bold"> Log Out <i
                                    class='ms-1 bx bx-log-out fs-5'></i></button>
                        </form>
                    @endauth
                    @guest
                        <a class="btn d-flex align-items-center text-info fw-bold" href="{{ route('login') }}"> Login <i
                                class='ms-1 bx bx-log-in fs-5'></i></a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    @if (session('true'))
        <x-toast type="info" title="Notification">
            {{ session('true') }}
        </x-toast>
    @endif

    @if (session('false'))
        <x-toast type="danger" title="Notification">
            {{ session('false') }}
        </x-toast>
    @endif

    <header class="container p-0 mt-3">
        <h1 class="fw-bold text-primary">@yield('header')</h1>
    </header>

    <main>
        <div class="container py-2 mt-3 rounded bg-light">
            @yield('content')
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
