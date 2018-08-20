@extends('layouts.master')

@section('title', 'Home')

@section('content')

    
<!--Main Content-->
<!-- Heading Row -->
<div class="row my-4">
        <div class="col-lg-8">
        <!-- Carousel-->
        <div id="main" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
            <li data-target="#main" data-slide-to="0" class="active"></li>
            <li data-target="#main" data-slide-to="1"></li>
            <li data-target="#main" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="img-fluid rounded" src="http://placehold.it/900x400" alt="">
                <div class="carousel-caption d-none d-md-block">
                    <h3>First Slide</h3>
                    <p>This is a description for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="img-fluid rounded" src="http://placehold.it/900x400" alt="">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Second Slide</h3>
                    <p>This is a description for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="img-fluid rounded" src="http://placehold.it/900x400" alt="">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Third Slide</h3>
                    <p>This is a description for the third slide.</p>
                </div>
            </div>
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
          <div class="card h-100">
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
              <h2 class="card-title">Event Calendar</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod tenetur ex natus at dolorem enim! Nesciunt pariatur voluptatem sunt quam eaque, vel, non in id dolore voluptates quos eligendi labore.</p>
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

<!-- Card -->
<div class="card card-image w-25" style="background-image: url(https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2814%29.jpg);">

    <!-- Content -->
    <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
        <div>
            <h5 class="pink-text"><i class="fa fa-pie-chart"></i> Marketing</h5>
            <h3 class="card-title pt-2"><strong>This is card title</strong></h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat fugiat, laboriosam, voluptatem,
                optio vero odio nam sit officia accusamus minus error nisi architecto nulla ipsum dignissimos.
                Odit sed qui, dolorum!.</p>
            <a class="btn btn-pink"><i class="fa fa-clone left"></i> View project</a>
        </div>
    </div>
    <!-- Content -->
</div>
<!-- Card -->

<h1>Santa Fe Stand-Alone SHS</h1>
<p>under construction  {{ $location }}</p>

@endsection