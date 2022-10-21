@extends('services.layoutAdmin')
@section('content')
<div class="card">
  <div class="card-header">Service create</div>
  <div class="card-body">
      
      <form action="{{ url('serviceAdmin') }}" method="POST">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>

        <label>Description</label></br>
        <input type="text" name="description" id="description" class="form-control"></br>
        
        <label for="duration">Duration</label>
                        <select class="js-example-basic-single" style="width:100%; color:#0090e7" id='duration' name='duration' required="required">
                        <option value="30min">30 min</option>
                        <option value="1h">1h</option>
                        <option value="2h">2h</option>
                        <option value="3h">3h</option>
                        <option value="4h">4h</option>
                      </select>
        
        <label>Price</label></br>
        <input type="number" name="price" id="price" class="form-control"></br>
        
        <input type="submit" value="Save" class="btn btn-success">
        <a href="{{ url('/serviceAdmin') }}" class="btn btn-primary" title="Back">
          <i class="fa fa-plus" aria-hidden="true"></i> Back
        </a>
      </br>
    </form>
  
  </div>
</div>
@endsection