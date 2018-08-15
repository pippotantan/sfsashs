@extends('layouts.master')

@section('title', 'Home')

@section('content')
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