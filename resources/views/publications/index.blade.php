
@extends('layouts.master')

@section('title', 'School Publication')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" style='float:right;'>
            <strong>Success!</strong> {{$message}}
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

    @if($publications)
        <h1>School Publications</h1>
        {{ $publications->links() }}
        <ul>
            
            @foreach($publications as $publication)
                <!--<li><a href="/publications/{{$publication->id}}">{{$publication->title}}</a></li>-->  

            <div class="col-md-5">
            <div class="card flex-md-row mb-2 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                <strong class="d-inline-block mb-2 text-primary">{{$publication->author}}</strong>
                <h3 class="mb-0">
                    <a class="text-dark" href="#">{{$publication->title}}</a>
                </h3>
                <div class="mb-1 text-muted">{{$publication->datepub}}</div>
                <p class="card-text mb-auto">{{substr($publication->body, 0, 100)}}...</p>
                <a href="/publications/{{$publication->id}}">Continue reading</a>
                </div>
                <img class="card-img-right flex-auto d-none d-md-block img-thumbnail" src="{{ asset("../images/") }}/{{$publication->pubpic}}" alt="Image">
            </div>
            </div>      
            @endforeach
           
            </ul>
            {{ $publications->links() }}
    @endif
@endsection

        