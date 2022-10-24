@extends('services.layoutAdmin')
@section('content')
<div class="card">
  <div class="card-header">Services Page</div>
  <div class="card-body">
        <div class="card-body">
        <h5 class="card-title">Name : {{ $services->name }}</h5>
        <p class="card-text">Description : {{ $services->description }}</p>
        <p class="card-text">Duration : {{ $services->duration }}</p>
        <p class="card-text">Price : {{ $services->price }}</p>
        <p class="card-text">Like : {{ $services->like }}</p>
        <p class="card-text">Dislike : {{ $services->dislike }}</p>
        <p class="card-text">Status : {{ $services->status }}</p>
  </div>
  <a href="{{ url('/center/serviceAdmin/'.$services->center_id) }}" class="btn btn-success btn-sm" title="Back">
    <i class="fa fa-plus" aria-hidden="true"></i> Back
  </a>
    </hr>
  </div>
</div>
@endsection