
@extends('complaintsAdmin.layout')
@section('content')
<div class="card">
  <div class="card-header">complaints Page</div>
  <div class="card-body">

        <div class="card-body">
        <h5 class="card-title">Title : {{ $complaint->title }}</h5>
        <p class="card-text">Description : {{ $complaint->description }}</p>
        <p class="card-text">Status : {{ $complaint->status }}</p>
        <p class="card-text">classification : {{ $complaint->classification }}</p>

        @if(is_null($comments))
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
        @else
            <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                        <h5 class="card-title">Response : {{ $comments->string }}</h5>
                        <p class="card-text">Likes : {{ $comments->likes }}</p>
                        <p class="card-text">Dislikes : {{ $comments->dislikes }}</p>
                        <a href="{{ url('/AdminComment/' . $comments->id . '/edit') }}" title="Edit complaint"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        <form method="POST" action="{{ url('/AdminComplaint' . '/' . $complaint->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete complaint" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                    </div>
                    </hr>
                </div>
            </div>
        @endif

  </div>

    </hr>

  </div>
</div>
