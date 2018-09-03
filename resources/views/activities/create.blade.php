@extends('layouts.master')

@section('title', 'Create New School Activity')

@section('content')

<div class="container">
        <h2>Create New Activity</h2><br/>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                <strong>Error!</strong> There were some problems with the following.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
                @endif
        
      <form method="post" action="{{url('activities')}}">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Title">Activity Title:</label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="body">Details:</label>
            <textarea id="body" type="text" class="form-control" name="details" required>{{ old('details') }}</textarea>
        </div>
        </div>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <strong> Start Date : </strong>  
            <input class="form-control"  type="date" id="startdate" name="startdate" value="{{ old('startdate') }}" required>   
         </div>
        </div>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <strong> End Date : </strong>  
            <input class="form-control"  type="date" id="enddate" name="enddate" value="{{ old('enddate') }}" required>   
         </div>
        </div>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success"><li class="fa fa-save"></li> Save Activity</button>
          </div>
        </div>
      </form>
    </div>
@endsection