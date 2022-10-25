@extends('commentsAdmin.layout')
@section('content')

<br/>
<br/>
      <form action="{{ url('AdminComment/' .$comments->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$comments->id}}" id="id" />
        <br/><br/><br/><br/><br/><br/>
        <label>Update Response</label></br>
        <input type="text" name="string" id="string" value="{{$comments->string}}" class="form-control"></br>

        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
<br/>
<br/>

@stop
