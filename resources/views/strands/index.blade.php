
@extends('layouts.master')

@section('title', 'Strands Offered')

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

    @if($strands)
       
            <div class="jumbotron">
                <h1>Strands Offered</h1>
                {{ $strands->links() }}
               
                @foreach($strands as $strand)
                
                    <div class="card">
                        <div class="row no-gutters">
                            <div class="col-auto">
                                <img class="img-fluid" src="{{ asset("../images/thumbnail/") }}/{{$strand->strandpic}}" alt="{{$strand->strand}}">
                            </div>
                            <div class="col">
                                <div class="card-block px-2">
                                    <h5 class="card-title">{{$strand->strand}}</h5>
                                    <strong class="text-muted">updated by: {{$strand->created_by}}</strong>
                                    <p class="card-text">{{$strand->short_desc}}
                                        <small><a href="/strands/{{$strand->id}}">view full...</a></small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                                <p><a href="{{action('StrandController@edit', $strand->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDel{{$strand->id}}">
                                <i class="fa fa-trash"></i> Delete
                                    </button>
                                </p>
                                <!--delete modal-->
                                  

                                    <!-- Modal -->
                                        <div class="modal fade" id="confirmDel{{$strand->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure to delete this strand?
                                                <h5> {{$strand->strand}}</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <form action="{{action('StrandController@destroy', $strand->id)}}" method="post">
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
                    </div>
                    @endforeach
                {{ $strands->links() }}
           </div>
            
           
    @endif
    
@endsection

        