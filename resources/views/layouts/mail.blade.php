<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('Datatables/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('Datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body class="bg-light">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <h3 class="navbar-brand text-uppercase font-weight-bold">
                    {{('Marketplace Business referral') }}
                </h3>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
<script type="text/javascript" src="{{ asset('Datatables/jquery-3.5.1.js') }}"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('Datatables/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('Datatables/dataTables.bootstrap4.min.js') }}"></script>
