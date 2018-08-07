@extends('layouts.master')

@section('title', 'About Us')

@section('content')

    @if($location=='about')
    <div class="alert alert-warning alert-dismissible fade show" role="alert" style='float:right;'>
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
            });
        }, 4000);
    </script>
    @endif

    <h1>Santa Fe Stand-Alone SHS</h1>
    <p>under construction  {{ $location }}</p>
@endsection