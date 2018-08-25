
@extends('layouts.master')

@section('title', 'Edit Strands')

@section('content')

<div class="container">
      <h2>Edit Strand</h2><br/>

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

      <form method="post" action="{{action('StrandController@update', $id)}}" enctype="multipart/form-data">
       
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="strand">Strand Name:</label>
            <input type="text" class="form-control" name="strand" value="{{old('strand') ? old('strand'):$strand->strand}}" required>
        </div>
        </div>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="short_desc">Short Description:</label>
            <input type="text" class="form-control" name="short_desc" value="{{old('short_desc') ? old('short_desc'): $strand->short_desc}}" required>
        </div>
        </div>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="long_desc">Body:</label>
            <textarea id = "body" type="text" class="form-control" name="long_desc" required>{{old('long_desc') ? old('long_desc'):$strand->long_desc}}</textarea>
        </div>
        </div>
        
                
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <input type="file" name="image">    
         </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Update</button>
            <a class="btn btn-info" href="/strands/">Cancel</a>
          </div>
        </div>
      </form>
    </div>
    
@endsection