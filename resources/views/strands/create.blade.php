@extends('layouts.master')

@section('title', 'Create New Strand')

@section('content')



<div class="container">
      <h2>Create New Strand</h2><br/>
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
        <form method="post" action="{{url('strands')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="strand">Strand Name:</label>
            <input type="text" class="form-control" name="strand" value="{{ old('strand') }}" required>
        </div>
        </div>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="short_desc">Short Description:</label>
            <input type="text" class="form-control" name="short_desc" value="{{ old('short_desc') }}" required>
        </div>
        </div>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="long_desc">Full Description:</label>
            <textarea id="body" type="text" class="form-control" name="long_desc" required>{{ old('long_desc') }}</textarea>
        </div>
        </div>
        
                
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
          <label for="image">Upload Picture:</label>
            <input type="file" name="image">    
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