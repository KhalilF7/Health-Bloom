@extends('complaintsAdmin.layout')
@section('content')
<div class="card">
  <div class="card-header">Complaints Page</div>
  <div class="card-body">

      <form action="{{ url('AdminComplaint') }}" method="post">
        {!! csrf_field() !!}
        <label>Title</label></br>
        <input type="text" name="title" id="title" class="form-control"></br>
        <label>Description</label></br>
        <input type="text" name="description" id="description" class="form-control"></br>
        <label>status</label></br>
      <select name="status" id="status" class="form-control">>
            <option value="">--Please choose an option--</option>
            <option value="En cours de traitement">En cours de traitement</option>
            <option value="traité">traité</option>
        </select></br>
        <label>classification</label></br>

               <select name="classification" id="classification" class="form-control">>
            <option value="">--Please choose an option--</option>
            <option value="Faible">Grave</option>
            <option value="Moyen">Faible</option>
        </select></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>
@stop

