<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1 class="text-2xl text-gray-700 text-center">You have been successfully logged out</h1>

    <p class='mt-8 text-xl text-indigo-800 text-center underline'><a href="{{ route('loginform') }}">Login?</a></p>

    <script type="text/javascript">
        history.pushState(null, null, `{{ route('logout') }}`);
        window.addEventListener('popstate', function () {
            history.pushState(null, null, `{{ route('logout') }}`);
        });
    </script>
</body>
</html>