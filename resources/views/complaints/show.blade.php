
@extends('complaints.layout')
@section('content')
<div class="card">
  <div class="card-header">complaints Page</div>
  <div class="card-body">

        <div class="card-body">
        <h5 class="card-title">Title : {{ $complaints->title }}</h5>
        <p class="card-text">Description : {{ $complaints->description }}</p>
        <p class="card-text">Status : {{ $complaints->status }}</p>
        <p class="card-text">classification : {{ $complaints->classification }}</p>

{{$comments}}

  </div>

    </hr>

  </div>
</div>
