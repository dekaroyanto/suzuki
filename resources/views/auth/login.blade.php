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
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                Login
            </div>
            <div class="card-body">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-floating mb-2">
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                        <label for="email">Email</label>
                    </div>

                    <div class="form-floating mb-2">
                        <input type="password" class="form-control" id="password" placeholder="Password"
                            name="password">
                        <label for="password">Password</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                </form>
            </div>
        </div>
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
