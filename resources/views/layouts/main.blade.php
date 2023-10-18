<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/build/assets/app-2c3366f8.css') }}">
</head>
<body>
    @include('partials.navbar')

    <div class="p-8 lg:px-32">
        @yield('content')
    </div>

    <script src="{{ asset('/build/assets/app-ac13ce32.js') }}"></script>
</body>
</html>