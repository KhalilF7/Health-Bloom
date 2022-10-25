@extends('reclamation.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Complaint</div>
                <div class="card-body">
      <form action="{{ url('/reclamation/'.$complaint->id) }}" method="post" >
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$complaint->id}}" id="id" />
        <input type="hidden" name="user_id" id="user_id" value="{{$complaint->user_id}}" id="id" />

        <div class="">
                            @csrf
                            <label class="label">Complaint Title: </label>
                            <input type="text" name="title" class="form-control" required/>
                                    @error('title')
                                        {{ $message}}
                                    @enderror
                        </div>
                        <div class="form-group">
                            <label class="label">Complaint Description: </label>
                            <textarea name="description" rows="10" cols="30" class="form-control" required></textarea>
                                    @error('description')
                                        {{ $message}}
                                    @enderror
                        </div>

                        <div>
                                <label class="label">Classification: </label>
                                <select name="classification" id="classification" class="form-control">>
                                <option value="">--Please choose an option--</option>
                                    <option value="Faible">Grave</option>
                                    <option value="Moyen">Faible</option>
                                </select>
                                    @error('classification')
                                        {{ $message}}
                                    @enderror
                        </div><br>
                        <div>
                                <label class="label">status: </label>
                                <select name="status" id="status" class="form-control">>
                                <option value="">--Please choose an option--</option>
                                    <option value="Faible">traité</option>
                                    <option value="Moyen">non traité</option>
                                </select>
                                    @error('status')
                                        {{ $message}}
                                    @enderror
                        </div>
        <input type="submit" value="Edit" class="btn btn-success">

        <a href="{{ url('/reclamation/'.$complaint->id) }}" class="btn btn-primary" title="Back">
            <i class="fa fa-plus" aria-hidden="true" ></i> Back
        </a>
    </form>

            </div>
        </div>
    </div>
</div>
<br/><br/><br/><br/><br/>
@endsection
