<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    
        <title>Sta. Fe Stan Alone SHS - @yield('title')</title>
    
    <body>

       @include('layouts.partials.nav')
       
        <div class='container-fluid'>
            @yield('content')
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>