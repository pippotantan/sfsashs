
@extends('layouts.master')

@section('title', 'School Publication')

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

    @if($publications)
       
            <div class="jumbotron mt-3">
                <h1>School Publications</h1>
                {{ $publications->links() }}
               
                @foreach($publications as $publication)
                
                    <div class="card">
                        <div class="row no-gutters p-2">
                            <div class="col-auto">
                                <img class="img-fluid" src="{{ asset("../images/thumbnail/") }}/{{$publication->pubpic}}" alt="{{$publication->title}}">
                            </div>
                            <div class="col">
                                <div class="card-block px-2">
                                    <h5 class="card-title">{{$publication->title}}</h5>
                                    <strong class="text-muted">by: {{$publication->author}} <small>{{$publication->datepub}}</small></strong>
                                    <p class="card-text">{!!substr($publication->body, 0, 150)!!}...
                                        <small><a href="/publications/{{$publication->id}}">continue reading</a></small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @auth
                        <div class="card-footer">
                            
                                <p><a href="{{action('PublicationController@edit', $publication->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDel{{$publication->id}}">
                                <i class="fa fa-trash"></i> Delete
                                    </button>
                                </p>
                                <!--delete modal-->
                                  

                                    <!-- Modal -->
                                        <div class="modal fade" id="confirmDel{{$publication->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span> Yes</button>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                        </div> 
                        
                        <!--end delete modal-->
                        </div>
                        @endauth 
                    </div>
                    @endforeach
                {{ $publications->links() }}
           </div>
            
           
    @endif
    
@endsection

        