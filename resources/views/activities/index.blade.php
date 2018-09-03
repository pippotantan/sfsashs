
@extends('layouts.master')

@section('title', 'School Activity Calendar')

@section('links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection

@section('content')

    @if ($message = Session::get('success'))
        <div class="jojofader alert alert-warning alert-dismissible fade show" role="alert" style='float:right;'>
            <strong>Success!</strong> {{$message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

     @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif


<div class="container">
   <div class="panel panel-default">
         <div class="panel-heading">
             <h2>School Activities-Calendar</h2>
         </div>
         <div class="panel-body" style="font-size: 20px;">
            {!! $calendar->calendar() !!}
        </div>
    </div>
</div>
@endsection

@section('jscripts')
          <!-- Calendar -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    {!! $calendar->script() !!}

@endsection
       
      