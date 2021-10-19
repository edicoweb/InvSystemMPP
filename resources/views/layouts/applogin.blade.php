<!DOCTYPE html>
<html lang="ES">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>INVENTARIO</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
</head>
<body>
        @yield('content')

    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>


</body>
</html>
