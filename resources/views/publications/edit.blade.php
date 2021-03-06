
@extends('layouts.master')

@section('title', 'School Publication')

@section('content')

<div class="container">
      <h2>Publish New Article</h2><br/>

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

      <form method="post" action="{{action('PublicationController@update', $id)}}" enctype="multipart/form-data">
       
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" value="{{old('title') ? old('title'):$publication->title}}" required>
        </div>
        </div>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="author">Author:</label>
            <input type="text" class="form-control" name="author" value="{{old('author') ? old('author'): $publication->author}}" required>
        </div>
        </div>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="datepub">Date Published:</label>
            <input type="date" class="form-control" name="datepub" value="{{old('datepub') ? old('datepub'):$publication->datepub}}" required>
        </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="body">Body:</label>
            <textarea id = "body" type="text" class="form-control" name="body" required>{{old('body') ? old('body'):$publication->body}}</textarea>
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
            <button type="submit" class="btn btn-success">Update</button>
            <a class="btn btn-info" href="/publications/">Cancel</a>
          </div>
        </div>
      </form>
    </div>
    
@endsection