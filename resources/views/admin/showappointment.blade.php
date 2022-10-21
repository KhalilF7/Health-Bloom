<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title"> Appointments Management </h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Appointments</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Appointments List</li>
                        </ol>
                    </nav>
                </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" align="center">
                      <table class="table table-contextual">
                        <thead>
                          <tr>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Specialist Name</th>
                            <th>Date</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($data as $appoint)

                          <tr>
                            <td>{{$appoint->name}}</td>
                            <td>{{$appoint->email}}</td>
                            <td>{{$appoint->phone}}</td>
                            <td>{{$appoint->specialist->name}}</td>
                            <td>{{$appoint->date}}</td>
                            <td>{{$appoint->message}}</td>
                            <td>{{$appoint->status}}</td>
                            <td>
                                <a class="btn btn-success" href="{{url('approved', $appoint->id)}}">Approved</a>
                                <a class="btn btn-danger" href="{{url('canceled', $appoint->id)}}">Canceled</a>
                                <a class="btn btn-info" href="{{url('emailview', $appoint->id)}}">Send Mail</a>
                            </td>
                          </tr>

                          @endforeach

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>