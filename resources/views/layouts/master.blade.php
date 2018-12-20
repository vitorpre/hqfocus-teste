<html>
    <head>
        <link rel="stylesheet" href="{{ url('dist/bootstrap/dist/css/bootstrap.css') }}" />
        <script src="{{ url("dist/jquery/dist/jquery.min.js") }}"></script>
        <script src="{{ url("dist/bootstrap/dist/js/bootstrap.js") }}"></script>

        @yield('imports')
    </head>
    <body>

        @yield('content')

    </body>
</html>
