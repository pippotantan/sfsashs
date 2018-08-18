@extends('layouts.master')

@section('title', 'School Publication')

@section('content')



<div class="container">
      <h2>Publish New Article</h2><br/>
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
        <form method="post" action="{{url('publications')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
        </div>
        </div>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="author">Author:</label>
            <input type="text" class="form-control" name="author" value="{{ old('author') }}" required>
        </div>
        </div>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="datepub">Date Published:</label>
            <input type="date" class="form-control" name="datepub" value="{{ old('datepub', date('Y-m-d')) }}" required>
        </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="body">Body:</label>
            <textarea type="text" class="form-control" name="body" required>{{ old('body') }}</textarea>
        </div>
        </div>
        
                
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <input type="file" name="filename">    
         </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Save</button>
          </div>
        </div>
      </form>
    </div>
    
@endsection