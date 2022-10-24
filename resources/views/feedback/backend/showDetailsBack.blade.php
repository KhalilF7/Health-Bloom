
@extends('feedback.backend.layoutBack')
@section('content')
<div class="card">
    <div class="card-header">Feedback details</div>
    <div class="card-body">
    <div class="card-body">

    {{-- <p>ID : {{ $feedback->id }}</p> --}}
    <p>Name : <strong>{{ $feedback->name }}</strong></p>
    <p>Description : {{ $feedback->description }}</p>
    <p>Created : <small class="text-muted">{{ $feedback->created_at?->format('d/m/Y H:i:s') }}</small></p>
    <p>Last Update : <small class="text-muted">{{ $feedback->updated_at?->format('d/m/Y H:i:s') }}</small></p>

    </div>

</div>
</div>
</div>
@endsection