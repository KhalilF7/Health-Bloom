    @extends('admin.center.layoutAdmin')
    @section('content')
        
        <div class=" grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <ul class="navbar-nav ">
              <li class="nav-item ">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Search products">
                </form>
              </li>
            </ul>
                    <h4 class="card-title">Centers List</h4>
                    <a href="{{ url('/center/create') }}" type="button" class="btn btn-primary btn-fw">Ajouter un nouveau centre</a>

                    </p>
          
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                             @foreach($centers as $item)
                          <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{$item->phone }}</td>
                            <td>
                                <a href="{{ url('/center/' . $item->id . '/edit') }}" title="Edit Center"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                     <form method="POST" action="{{ url('/center' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                            <a href="{{ url('/center/serviceAdmin/' . $item->id) }}" title="List Service"><button class="btn btn-warning btn-sm "><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Services List</button></a>
                                            <a href="{{ url('/center/serviceAdmin/' . $item->id . '/create') }}" title="create Service"><button class="btn btn-success btn-sm "><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add New Service</button></a>
                            </td>                      
                            </tr>
                           @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
  @endsection