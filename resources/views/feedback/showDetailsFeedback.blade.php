
@extends('feedback.layout')
@section('content')
    <div class="row">
    <div class="col-md-6 col-lg-4">
    <div class="card">
        <div class="card-header">
            Details Feedback
        </div>
    </div>
    <div class="card-body">
    <p>ID : {{ $feedback->id }}</p>
    <p>Name : <strong>{{ $feedback->name }}</strong></p>
    <p>Description : {{ $feedback->description }}</p>
    <p>Created : <small class="text-muted">{{ $feedback->created_at?->format('d/m/Y H:i:s') }}</small></p>
    <p>Last Update : <small class="text-muted">{{ $feedback->updated_at?->format('d/m/Y H:i:s') }}</small></p>

    </div>
  
                    @include('feedback.commentsDisplay', ['comments' => $feedback->comments, 'feedback_id' => $feedback->id]) 

                    <hr />
                    
                    <form method="post" action="{{ route('comments.store') }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="body" placeholder="Add comment..."></textarea>
                            <input type="hidden" name="feedback_id" value="{{ $feedback->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Add Comment" />
                        </div>
                    </form>

</div>
</div>
@endsection