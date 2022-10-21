@extends('services.layoutAdmin')
@section('content')
<div class="card">
  <div class="card-body">
      
      <form action="{{ url('serviceAdmin/' .$services->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$services->id}}" id="id" />
        
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$services->name}}" class="form-control"></br>
        
        <label>Date</label></br>
        <input type="date" name="date" id="date" value="{{$services->date}}" class="form-control"></br>
        
        <label>Time</label></br>
        <input type="text" name="time" id="time" value="{{$services->time}}" class="form-control"></br>
        
        <label>Duration</label></br>
        <input type="text" name="duration" id="duration" value="{{$services->duration}}" class="form-control"></br>
        
        <label>Price</label></br>
        <input type="number" name="price" id="price" value="{{$services->price}}" class="form-control"></br>
        
        <input type="submit" value="Update" class="btn btn-success">
        <a href="{{ url('/serviceAdmin') }}" class="btn btn-primary" title="Back">
    <i class="fa fa-plus" aria-hidden="true"></i> Back
  </a>
  </br>
    </form>
  
  </div>
</div>
@endsection