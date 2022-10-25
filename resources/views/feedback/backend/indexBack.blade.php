
@extends('feedback.backend.layoutBack')
@section('content')

    <div class="card-body p-0">
        <table class="table table-striped table-hover m-0">
           <thead>
               <tr>
                   <th>User Name</th>
                   <th>Center Name</th>
                   <th>Feedback</th>
                   <th>Description</th>
                   <th>Rating</th>
                   <th>Action</th>
               </tr>
           </thead>
            <tbody>@foreach ($feedbacks as $feedback )
                
               
                   <tr>
                       <td>
                        @foreach ($users as $user )
                        
                            @if($user->id == $feedback->user_id)
                                {{ $user->name }}
                            @endif
                        @endforeach
                        
                    </td>
                       <td>{{ $feedback->center_id }}</td>
                       <td>{{ $feedback->name }}</td>
                       <td>{{ $feedback->description }}</td>
                       <td>{{ $feedback->rating }}</td>
                        <td>
                            <a href="{{ route('feedbackAdmin.show',['feedbackAdmin'=>$feedback->id])}}" class="btn btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="{{ url('feedbackAdmin/download/'.$feedback->id)}}" class="btn btn-sm">
                                <i class="fas fa-download">Download</i>
                            </a>
                        </td>

                       
                   </tr>
               
               @endforeach
           </tbody>
        </table>
    </div>
</div>

@endsection