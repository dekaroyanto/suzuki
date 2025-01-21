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
            <div class="card-header">
                Register
            </div>
            <div class="card-body">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            placeholder="Name" name="name" value="{{ old('name') }}">
                        <label for="name">Nama Lengkap</label>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-floating mb-2">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            placeholder="Email" name="email" value="{{ old('email') }}">
                        <label for="email">Email</label>
                    </div>

                    <div class="form-floating mb-2">
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Password">
                        <label for="password">Password</label>
                    </div>

                    <div class="form-floating mb-2">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Confirm Password">
                        <label for="password_confirmation">Confirm Password</label>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                    <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
                </form>
            </div>
        </div>
    </div>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz' crossorigin='anonymous'>
    </script>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
</body>

</html>
