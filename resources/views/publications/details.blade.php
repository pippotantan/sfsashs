@extends('layouts.master')

@section('title', 'School Publication')

@section('content')

 <div class="blog-post">
            <h2 class="blog-post-title">{{$publication->title}}</h2>
            <p class="blog-post-meta">{{$publication->datepub}} by <a href="#">{{$publication->author}}</a></p>

    <p>{{$publication->body}}</p>
</div>
@endsection
