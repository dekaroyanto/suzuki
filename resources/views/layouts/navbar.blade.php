<!doctype html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content=width='device-width, initial-scale=1'>
    <title>Deka</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css'>
</head>

<body>
    <nav class='navbar navbar-expand-lg bg-body-tertiary'>
        <div class='container-fluid'>
            <a class='navbar-brand' href=''>Navbar</a>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse'
                data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false'
                aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                    <li class='nav-item'>
                        <a class='nav-link @if (Route::currentRouteName() === 'dashboard') active @endif' aria-current='page'
                            href='{{ route('dashboard') }}'>Home</a>
                    </li>

                    @if (Auth::user()->role === 'admin')
                        <li class='nav-item'>
                            <a class='nav-link @if (Route::currentRouteName() === 'product.index') active @endif' aria-current='page'
                                href='{{ route('product.index') }}'>Product</a>
                        </li>
                    @endif


                    <li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle' href='' role='button' data-bs-toggle='dropdown'
                            aria-expanded='false'>
                            Dropdown
                        </a>
                        <ul class='dropdown-menu'>
                            <li><a class='dropdown-item' href=''>Action</a></li>
                            <li>
                                <hr class='dropdown-divider'>
                            </li>
                            <li><a class='dropdown-item' href=''>Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <div class='dropdown'>
                    <button class='btn btn-secondary dropdown-toggle' type='button' data-bs-toggle='dropdown'
                        aria-expanded='false'>
                        {{ Auth::user()->name }}
                    </button>
                    <ul class='dropdown-menu'>
                        <li><a class='dropdown-item' href='{{ route('profile.edit') }}'>Profile</a></li>
                        <li><a class='dropdown-item' href='#'>Another action</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        @yield('content')
    </div>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz' crossorigin='anonymous'>
    </script>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}'
            })
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}'
            })
        </script>
    @endif
</body>

</html>
