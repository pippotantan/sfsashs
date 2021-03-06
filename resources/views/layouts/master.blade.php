<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Sta. Fe Stand-Alone SHS - @yield('title')</title>

        <link rel="icon" href="{{ asset("../images/") }}/favicon.ico">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @yield('links')
        
        
    <body>
            <div class="icon-bar lambong">
                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a> 
                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a> 
                    <a href="#" class="google"><i class="fa fa-google"></i></a> 
                    <!--  <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>-->
                    <a href="#" class="youtube"><i class="fa fa-youtube"></i></a> 
            </div>

            <img class="topPic" src="{{ asset("../layoutpic/") }}/students2.png">
        
    
    <div class='container px-2'>
                    
        @include('layouts.partials.nav')
        @yield('content')
        @include('layouts.partials.footer')
    </div>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
        <script>CKEDITOR.replace('body');</script>

            <script>
                $(document).ready(function(){

                    getStrands();
                    getActivity();
                    
                    function getStrands(query = '')
                    {
                        $.ajax({
                        url:"{{ route('fetch.strand') }}",
                        method:'GET',
                        data:{query:query},
                        dataType:'json',
                        success:function(data)
                            {
                                $('#footstrand').html(data.footer_strand_data);
                                $('.carousel-indicators').html(data.corousel_indic_data);
                                $('.carousel-inner').html(data.strand_corou_data);
                                $('.strand_submenu').html(data.strand_sub_menu);
                            
                            }
                    })
                    } //end function
                    
                    function getActivity()
                    {
                        $.ajax({
                        url:"{{ route('fetch.activity') }}",
                        method:'GET',
                        success:function(data)
                            {
                                //$('#calendar').html(data);
                                $('#calendar').fullCalendar({
                                    header: null,
                                    events: $.parseJSON(data),
                                    });
                                
                                    
                                
                            },
                        error: function(){
                            $('#calendar').html('No events posted!');
                        }
                    })
                    } //end function

                //$(document).on('keyup', '#search1', function(){
                    //var query = $(this).val();
                //    getStrands();
                //    });

                }); //end document ready function

                window.setTimeout(function() {
                    $(".jojofader").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                    });
                }, 4000);

            </script>

        @yield('jscripts')
        

    </body>
</html>