
    @extends('services.layout')
    @section('content')
    <div class="page-section">
        <div class="container">
            <table class="text-center wow fadeInUp" align="center" width="90%">
                <tr style="padding: 6px 12px; background-color: #00D9A5; color: #fff; border-radius: 4px;">
                    <th style="padding: 10px; font-size: 20px;">Name</th>
                    <th style="padding: 10px; font-size: 20px;">Date</th>
                    <th style="padding: 10px; font-size: 20px;">Time</th>
                    <th style="padding: 10px; font-size: 20px;">Duration</th>
                    <th style="padding: 10px; font-size: 20px;">Price</th>
                    <th style="padding: 10px; font-size: 20px;">Status</th>
                    <th style="padding: 10px; font-size: 20px;"></th>
                </tr>

                @foreach($services as $item)

                <tr style="padding: 6px 12px; background-color: #E1EBE8; color: #6E807A; border-radius: 4px;">
                <td>{{ $item->name }}</td>
                <td>{{ $item->date }}</td>
                <td>{{ $item->time }}</td>
                <td>{{ $item->duration }}</td>
                <td>{{ $item->price }}</td>
                <td class="tag-cloud-link">{{ $item->status }}</td>
                <td>
                                            <!-- <a href="{{ url('/service/' . $item->id) }}" title="View Service"><button class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a> -->
                                            @if($item->status=="unrealized")
                                            <a href="{{ url('/service/' . $item->id . '/edit') }}" title="Edit Service"><button class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Negociate</button></a>
                                            <button type="submit" class="btn btn-success" title="Approve Service" onclick="return confirm(&quot;Confirm approve?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                            <a href="{{url('/service/approve', $item->id)}}">Approve</a>
                                            </button>
                                            @else
                                            <button type="submit" class="btn btn-success" title="Approve Service" onclick="return confirm(&quot;Confirm approve?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                            <a href="{{url('/service/like', $item->id)}}">Like</a>
                                            </button>
                                            <button type="submit" class="btn btn-success" title="Approve Service" onclick="return confirm(&quot;Confirm approve?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                            <a href="{{url('/service/dislike', $item->id)}}">Dislike</a>
                                            </button>

                                            @endif

                                        </td>

                @endforeach

            </table>
        </div> <!-- .container -->
    </div>
  @endsection

