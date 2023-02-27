<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Mazer Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('template/assets/css/main/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/assets/css/main/app-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/assets/css/pages/auth.css') }}" />
    <link rel="shortcut icon" href="{{ asset('template/assets/images/logo/favicon.svg') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('template/assets/images/logo/favicon.png') }}" type="image/png" />
</head>

<body>
    <script src="assets/js/initTheme.js"></script>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left" style="margin-top: 5rem">
                    <h1 class="auth-title mb-0">Log in.</h1>
                    <img style="width: 200px; margin-left: -10px;" src="{{ asset('template/assets/images/logo/schoolifee.png') }}" alt="">
                    <form action="{{ route('loginProses') }}" class="mt-3" method="POST">
                    @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-md" placeholder="Username" value="{{ Session::get('username') }}" name="username" />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control form-control-md" placeholder="Password" />
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-md shadow-lg">
                            Log in
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                    {{-- <img src="{{ asset('template/assets/images/logo/xavier.png') }}" style="width: 100%; height: 740px;" alt=""> --}}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
