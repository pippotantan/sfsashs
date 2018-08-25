@extends('layouts.master')

<style>
    .display-comment {
        margin-left: 40px
    }
</style>

@section('title', 'Strand - ' . $strand->strand)

@section('content')

 <!-- new layout -->
<div class="row blog-post">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Preview Image -->
          <img class="card-img-top w-25" src="{{ asset("../images/") }}/{{$strand->strandpic}}" alt="{{$strand->strand}}">

          <hr>
          <h2 class="">{{$strand->strand}}</h2>
          <!-- Date/Time -->
          <p>created/updated by <a href="#">{{$strand->created_by}}</a></p>
          <hr>

          <h5>{{$strand->short_desc}}</h5>

          <!-- Post Content -->
          <p class="lead">{!!$strand->long_desc!!}</p>

        </div>    

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card mb-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">Web Design</a>
                    </li>
                    <li>
                      <a href="#">HTML</a>
                    </li>
                    <li>
                      <a href="#">Freebies</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">JavaScript</a>
                    </li>
                    <li>
                      <a href="#">CSS</a>
                    </li>
                    <li>
                      <a href="#">Tutorials</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->
<!--end new layout-->
@endsection
