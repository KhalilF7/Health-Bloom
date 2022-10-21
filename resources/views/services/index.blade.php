
    @extends('services.layout')
    @section('content')
    <div class="page-section">
        <div class="container">
            @if(count($services) !==0)
            <table class="text-center wow fadeInUp" align="center" width="90%">
                <tr style="padding: 6px 12px; background-color: #00D9A5; color: #fff; border-radius: 4px;">
                    <th style="padding: 10px; font-size: 20px;">Name</th>
                    <th style="padding: 10px; font-size: 20px;">Description</th>
                    <th style="padding: 10px; font-size: 20px;">Duration</th>
                    <th style="padding: 10px; font-size: 20px;">Price</th>
                    <th style="padding: 10px; font-size: 20px;">Like</th>
                    <th style="padding: 10px; font-size: 20px;">Dislike</th>
                    <th style="padding: 10px; font-size: 20px;"></th>
                </tr>

                @foreach($services as $item)

                
                <tr style="padding: 6px 12px; background-color: #E1EBE8; color: #6E807A; border-radius: 4px;">
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->duration }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->like }}</td>
                <td>{{ $item->dislike }}</td>

                <!-- <td class="tag-cloud-link">{{ $item->status }}</td> -->
                <td>
                @if($item->status=="Active")
                                            <!-- <a href="{{ url('/service/' . $item->id) }}" title="View Service"><button class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a> -->
                                            <a href="{{ url('/service/' . $item->id . '/edit') }}" title="Edit Service"><button class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Negociate</button></a>
                                            <button type="submit" class="btn btn-success" title="Like Service" onclick="return confirm(&quot;Confirm like?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                            <a href="{{url('/service/like', $item->id)}}">Like</a>
                                            </button>
                                            <button type="submit" class="btn btn-success" title="Dislike Service" onclick="return confirm(&quot;Confirm dislike?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                            <a href="{{url('/service/dislike', $item->id)}}">Dislike</a>
                                            </button>
                                            @endif
                                        </td>
                                        
</tr>
                @endforeach

            </table>
            @else
            <h2> Nothing to show</h2>
            @endif
        </div> <!-- .container -->
    </div>
  @endsection

