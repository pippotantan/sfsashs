
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
                        <img class="card-img-top" src="{{ asset("../images/") }}/{{$publication->pubpic}}" alt="{{$publication->title}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$publication->title}}</h5>
                            <p class="text-muted"><small>{{$publication->datepub}}</small></p>        
                            <p class="card-text">{{substr($publication->body, 0, 150)}}...
                            <small><a href="/publications/{{$publication->id}}">continue reading</a></small>
                            </p>
                        </div>
                        <div class="card-footer">
                            
                            <small class="text-muted">by: {{$publication->author}}</small>
                                <p><a href="{{action('PublicationController@edit', $publication->id)}}" class="btn btn-warning">Edit</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDel">
                                        Delete
                                    </button>
                                </p>
                                <!--delete modal-->
                                  

                                    <!-- Modal -->
                                        <div class="modal fade" id="confirmDel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure to delete this publication?
                                                <h5> {{$publication->title}}</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <form action="{{action('PublicationController@destroy', $publication->id)}}" method="post">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn btn-danger" type="submit">Yes</button>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                        </div>  
                        <!--end delete modal-->
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

        