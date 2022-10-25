@foreach($comments as $comment)
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->body }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('commentAdd.store') }}">
            @csrf
            <div class="form-group">
                <input type="body" name="body" class="form-control" />
                <input type="hidden" name="complaint_id" value="{{ $comment->complaint_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        @include('reclamationSimpleUser.commentsDisplay', ['comments' => $comment->replies])
    </div>
@endforeach