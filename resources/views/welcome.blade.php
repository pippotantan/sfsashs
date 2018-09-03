@extends('layouts.master')

@section('title', 'Home')

@section('links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection

@section('content')
<!--Main Content-->
<!-- Heading Row -->
<div class="row my-4">
        <div class="col-lg-8">
        <!-- Carousel-->
        <div id="main" class="carousel slide lambong" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
            <li data-target="#main" data-slide-to="0" class="active"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
            
            <img src="{{ asset("../layoutpic/") }}/loader.gif" alt="loading" class="img-fluid ml-10">
            
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#main" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#main" data-slide="next">
            <span class="carousel-control-next-icon"></span>
            </a>

        </div>
        <!--carousel end-->
         <!-- <img class="img-fluid rounded" src="http://placehold.it/900x400" alt="">-->
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-md-4 mb-4">
          <div class="card h-100 lambong">
            <div class="card-body">
              <h2 class="card-title">Principal's Message</h2>
              <img class="img-fluid d-block mx-auto float-right px-2" src="http://placehold.it/200x200" alt="">
              <p class="card-text text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod tenetur ex natus at dolorem enim! Nesciunt pariatur voluptatem sunt quam eaque, vel, non in id dolore voluptates quos eligendi labore. Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consectetur</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Juan Tamad, Ph.D.</small>
            </div>
          </div>
        </div><!-- /.col-md-4 -->
      </div><!-- /.row -->

      <!-- Call to Action Well -->
      <div class="card text-white bg-secondary my-4 text-center">
        <div class="card-body">
          <p class="text-white m-0">This call to action card is a great place to showcase some important information or display a clever tagline!</p>
        </div>
       
      </div>
        
      <!-- Content Row -->
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title">Featured Publication</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">More Info</a>
            </div>
          </div>
        </div>
        <!-- /.col-md-4 -->
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title">School Calendar</h2>
              <div class="card-text"  id="calendar"></div>
            </div>
            <div class="card-footer">
              <a href="/activities" class="btn btn-primary">Show Full Calendar</a>
            </div>
          </div>
        </div>
        <!-- /.col-md-4 -->
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title">Announcements</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">More Info</a>
            </div>
          </div>
        </div>
        <!-- /.col-md-4 -->

      </div>
      <!-- /.row -->
<!--End Main Content-->

@endsection

@section('jscripts')
          <!-- Calendar -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    
@endsection
