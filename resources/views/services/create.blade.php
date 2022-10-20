@extends('services.layout')
@section('content')
<div class="card">
  <div class="card-header">Service Page</div>
  <div class="card-body">
      
      <form action="{{ url('service') }}" method="post">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>

        <label>Date</label></br>
        <input type="date" name="date" id="date" class="form-control"></br>
        
        <label>Time</label></br>
        <input type="text" name="time" id="time" class="form-control"></br>
        
        <label>Duration</label></br>
        <input type="text" name="duration" id="duration" class="form-control"></br>
        
        <label>Price</label></br>
        <input type="number" name="price" id="price" class="form-control"></br>
        
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop