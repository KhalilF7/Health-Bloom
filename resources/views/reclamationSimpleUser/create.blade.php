@extends('reclamationSimpleUser.layout')

@section('content')
<br/><br/><br/>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Complaint</div>
                <div class="card-body">
                    <form method="post" action="{{ route('complaint.store') }}">
                        <div class="form-group">
                            @csrf
                            <label class="label">Complaint Title: </label>
                            <input type="text" name="title" class="form-control" required/>
                            @error('title')
                                {{ $message}}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="label">Post Description: </label>
                            <textarea name="description" rows="10" cols="30" class="form-control" required></textarea>
                            @error('description')
                                {{ $message}}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="label">Status : </label>
                            <select name="status" id="status" class="form-control">>
                                <option value="">--Please choose an option--</option>
                                <option value="En cours de traitement">En cours de traitement</option>
                                <option value="traité">traité</option>
                            </select>
                            @error('status')
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
                        </div>
                        <br/>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br/><br/><br/><br/><br/>
@endsection
