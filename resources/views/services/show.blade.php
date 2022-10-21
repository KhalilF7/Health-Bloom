@extends('services.layout')
@section('content')
<div class="card">
  <div class="card-header">Services Page</div>
  <div class="card-body">
        <div class="card-body">
        <h5 class="card-title">Name : {{ $services->name }}</h5>
        <p class="card-text">Date : {{ $services->date }}</p>
        <p class="card-text">Time : {{ $services->time }}</p>
        <p class="card-text">Duration : {{ $services->duration }}</p>
        <p class="card-text">Price : {{ $services->price }}</p>
        <p class="card-text">Status : {{ $services->status }}</p>
  </div>
      
    </hr>
  </div>
</div>
@endsection