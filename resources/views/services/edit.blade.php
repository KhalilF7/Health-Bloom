@extends('services.layoutAdmin')
@section('content')
<div class="card">
  <div class="card-body editForm">
      
      <form action="{{ url('/serviceAdmin/'.$services->id) }}" method="post" >
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$services->id}}" id="id" />
        <input type="hidden" name="center_id" id="center_id" value="{{$services->center_id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$services->name}}" class="form-control"></br>
        
        <label>Description</label></br>
        <input type="text" name="description" id="description" value="{{$services->description}}" class="form-control"></br>
        
        <label for="duration">Duration</label>
                        <select class="js-example-basic-single" style="width:100%; color:#0090e7" id='duration' value="{{$services->duration}}" name='duration' required="required">
                        <option value="30min">30 min</option>
                        <option value="1h">1h</option>
                        <option value="2h">2h</option>
                        <option value="3h">3h</option>
                        <option value="4h">4h</option>
                      </select>
        
        <label>Price</label></br>
        <input type="number" name="price" id="price" value="{{$services->price}}" class="form-control"></br>
        
        <input type="submit" value="Update" class="btn btn-success">
        <a href="{{ url('/center/serviceAdmin/'.$services->center_id) }}" class="btn btn-primary" title="Back">
    <i class="fa fa-plus" aria-hidden="true" ></i> Back
  </a>
  </br>
    </form>
  
  </div>
</div>
@endsection