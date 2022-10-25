@extends('reclamation.layout')

@section('content')
<br><br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center text-success">Show</h3>
                    <br/>
                    <h2>{{ $complaint->title }}</h2>
                    <p>
                        {{ $complaint->description }}
                    </p>
                      <p>
                        {{ $complaint->status }}
                    </p>
                      <p>
                        {{ $complaint->classification }}
                    </p>
                    <hr />
                    <h4>Display Comments</h4>

                    @include('reclamation.commentsDisplay', ['comments' => $complaint->comments, 'complaintId' => $complaint->id])

                    <hr />
                    <h4>Add comment</h4>
                    <form method="post" action="{{ route('commentAdd.store'   ) }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="body"></textarea>
                            <input type="hidden" name="complaint_id" value="{{ $complaint->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Add Comment" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
