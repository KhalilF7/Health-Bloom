@extends('complaints.layout')
@section('content')

<br/>
<br/>
      <form action="{{ url('complaint/' .$complaints->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$complaints->id}}" id="id" />
        <label>Title</label></br>
        <input type="text" name="title" id="title" value="{{$complaints->title}}" class="form-control"></br>
        <label>description</label></br>
        <input type="text" name="description" id="description" value="{{$complaints->description}}" class="form-control"></br>
        <label>status</label></br>
       <select name="status" id="status" class="form-control">>
            <option value="">--Please choose an option--</option>
            <option value="En cours de traitement">En cours de traitement</option>
            <option value="traité">traité</option>
        </select></br>
        <label>classification</label></br>

               <select name="classification" id="classification" class="form-control">>
            <option value="">--Please choose an option--</option>
            <option value="Faible">Grave/option>
            <option value="Moyen">Faible</option>
        </select></br>
            <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
<br/>
<br/>

@stop
