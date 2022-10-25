
@extends('complaintsAdmin.layout')
@section('content')


    <div class="card">
        <div class="card-header">complaints Page</div>
        <div class="card-body">
            <div class="card-body">
                <h5 class="card-title">Response : {{ $comments->string }}</h5>
                    <p class="card-text">Likes : {{ $comments->likes }}</p>
                    <p class="card-text">Dislikes : {{ $comments->dislikes }}</p>
                    <a href="{{ url('/AdminComment/' . $comments->id) }}" title="View complaint"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                    <a href="{{ url('/AdminComment/' . $comments->id . '/edit') }}" title="Edit complaint"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                    <form method="POST" action="{{ url('/AdminComment' . '/' . $comments->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete complaint" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                </div>

            </hr>

        </div>
    </div>
@stop
