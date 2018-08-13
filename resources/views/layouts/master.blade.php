<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset("../images/") }}/favicon.ico">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    
        <title>Sta. Fe Stand-Alone SHS - @yield('title')</title>
    
    <body>

       @include('layouts.partials.nav')
       
        <div class='container-fluid'>
            @yield('content')
        </div>

        @include('layouts.partials.footer')
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>