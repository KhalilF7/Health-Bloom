@extends('complaintsAdmin.layout')
@section('content')
<div class="card">
  <div class="card-header">Complaints Page</div>
  <div class="card-body">

      <form action="{{ url('AdminComplaint') }}" method="post">
        {!! csrf_field() !!}
        <label>Title</label></br>
        <input type="text" name="title" id="title" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>
@stop

