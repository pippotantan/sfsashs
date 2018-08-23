@extends('layouts.master')

<style>
    .display-comment {
        margin-left: 40px
    }
</style>

@section('title', 'School Publication')

@section('content')

 <!-- new layout -->
<div class="row blog-post">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Preview Image -->
          <img class="card-img-top" src="{{ asset("../images/") }}/{{$publication->pubpic}}" alt="{{$publication->title}}">

          <hr>
          <h2 class="blog-post-title">{{$publication->title}}</h2>
          <!-- Date/Time -->
          <p>{{$publication->datepub}} by <a href="#">{{$publication->author}}</a></p>

          <hr>

          <!-- Post Content -->
          <p class="lead">{!!$publication->body!!}</p>

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
      
          <!--comment area-->
          
         @if( $publication->comments->count() < 1 )
                    <strong class="text-muted">Be the first to comment!</strong>
         @endif

      <div class="w-50">
                <hr />
                    @auth
                    <p>Comment as <small class="text-muted">{{ Auth::user()->name }}</p></p>
                    <form method="post" action="{{ route('comment.add') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="comment_body" class="form-control" required/>
                            <input type="hidden" name="pub_id" value="{{ $publication->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-warning btn-sm" value="Post Comment" />
                        </div>
                    </form>
                    @else
                    
                    <a class="btn btn-info btn-sm" href="{{ route('login') . '?previous=' . Request::fullUrl() }}">
                        Login to comment...
                    </a>
                    @endauth

                          @include('layouts.partials._comment_replies', ['comments' => $publication->comments, 'pub_id' => $publication->id])
          
                    <!--single comment
                    @foreach($publication->comments as $comment)
                        <div class="display-comment">
                            <strong>{{ $comment->user->name }}</strong>
                            <p>{{ $comment->body }}</p>
                        </div>
                    @endforeach
                    -->
          </div>
          <!--end comment area-->
<!--end new layout-->
@endsection
