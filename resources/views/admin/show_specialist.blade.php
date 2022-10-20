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
                    <h3 class="page-title">All Specialists</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Specialists</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Specialists List</li>
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
                            <th>Specialist Image</th>
                            <th>Specialist Name</th>
                            <th>Phone Number</th>
                            <th>Speciality</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($specialists as $specialist)

                          <tr>
                            <td><img src="specialistimage/{{$specialist->image}}" style="width: 100px; height:100px"/></td>
                            <td>{{$specialist->name}}</td>
                            <td>{{$specialist->phone}}</td>
                            <td>{{$specialist->speciality}}</td>
                            <td>
                                <a style="margin:10px" class="btn btn-info" href="{{url('editspecialist', $specialist->id)}}">Edit</a>    
                                <a class="btn btn-danger" onClick="return confirm('Are you sure to DELETE this Specialist ?')" href="{{url('deletespecialist', $specialist->id)}}">Delete</a>
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