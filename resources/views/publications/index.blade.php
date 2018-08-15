
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
    @endif

    @if($publications)
       
            <div class="jumbotron">
                <h1>School Publications</h1>
                {{ $publications->links() }}
                <div class="card-columns">
                @foreach($publications as $publication)
                
                    <div class="card">
                        <img class="card-img-top" src="{{ asset("../images/") }}/{{$publication->pubpic}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$publication->title}}</h5>
                            <p class="text-muted"><small>{{$publication->datepub}}</small></p>        
                            <p class="card-text">{{substr($publication->body, 0, 150)}}...
                            <small><a href="/publications/{{$publication->id}}">continue reading</a></small>
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">by: {{$publication->author}}</small>
                        </div>
                </div>
                @endforeach
                </div>
                {{ $publications->links() }}
           </div>
            
           
    @endif
    <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
                });
            }, 4000);
    </script>
@endsection

        