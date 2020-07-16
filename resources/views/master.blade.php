<html>
<html lang="{{ config('app.locale') }}">
<head>
    <title> @yield('title') </title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--    Material    Design    fonts    -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Rob
oto:300,400,500,700">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Ma
terial+Icons">
    <!--    Bootstrap    -->
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3
.3.7/css/bootstrap.min.css">
    <!--    Bootstrap    Material    Design    -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-material-design.css">
    <link rel="stylesheet" type="text/css" href="/css/ripples.min.css">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
<div id="app">
    @include('shared.navbar')
    @yield('content')
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>
        <script src = "/js/ripples.min.js">
    </script>
    <script src="/js/material.min.js"></script>
    <script>
    $(document).ready(function() {
        //    This    command    is    used    to    initialize    some    elements    and    make    them    work    properly
        $.material.init();
    });
    </script> -->
     <!-- <script src="{{ mix('js/app.js') }}"></script> -->
</div>
</body>
</html>