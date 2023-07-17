<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Scholifee</title>
    <link rel="stylesheet" href="{{ asset('template/assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/pages/auth.css') }}">
    <link rel="shortcut icon" href="{{ asset('template/assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('template/assets/images/logo/favicon.png') }}" type="image/png">
</head>

<body>
    <div id="auth">

<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <h1 class="auth-title">Register</h1>
            <p class="auth-subtitle mb-5">Pendaftaran Admin Baru</p>

            <form action="{{ route('regisProses') }}" method="POST">
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" name="nama" placeholder="Nama Lengkap">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                    @error('nama')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" name="username" placeholder="Username">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                    @error('username')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" name="pw" placeholder="Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    @error('pw')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" name="confirm" placeholder="Confirm Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    @error('confirm')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    @if ($pesan = Session::get('error'))
                        <div class="alert alert-danger mt-1" role="alert">
                            {{ $pesan }}
                        </div>
                    @endif
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Submit</button>
            </form>
            <div class="text-center mt-3 text-lg fs-4">
                <p class='text-gray-600'>Sudah punya akun? <a href="{{ url('/') }}" class="font-bold">Log
                        in</a>.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>
</body>

</html>
