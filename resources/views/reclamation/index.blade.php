@extends('reclamation.layout')

@section('content')
<br/><br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<div class="container">
    <div class="row justify-content-center">
<br/>
<br/>
<br/>
<br/>
        <div class="col-md-12">
            <h1>Manage Complaints</h1>
            <a href="{{ route('reclamation.create') }}" class="btn btn-success" style="float: right">Create Complaint</a>
            <table class="table table-bordered">
                <thead>
                    <th width="80px">Id</th>
                    <th>Title</th>
                    <th>Classification</th>
                    <th>Status</th>
                    <th width="150px">Action</th>
                </thead>
                <tbody>
                @foreach($complaints as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->classification }}</td>
                    <td>{{ $post->status }}</td>
                    <td>
                        <a href="{{ route('reclamation.show', $post->id) }}" class="btn btn-primary">View Complaint</a>
                    </td>
                </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection
