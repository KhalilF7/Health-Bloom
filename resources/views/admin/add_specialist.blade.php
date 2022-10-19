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
          
        @if(session()->has('message'))
        <div class="alert alert-success">
          <button type="button" class="close" data-bs-dismiss="alert">X</button>
          {{session()->get('message')}}
        </div>
        @endif
        
        <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Add Specialist </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Specialists</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Specialist</li>
                </ol>
              </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{url('upload_specialist')}}" method="POST" enctype="multipart/form-data">

                    @csrf

                      <div class="form-group">
                        <label for="specialistname">Specialist Name</label>
                        <input type="text" class="form-control" style="color:#0090e7" name="specialistname" placeholder="Specialist Name" required="">
                      </div>
                      <div class="form-group">
                        <label for="phonenumber">Phone Number</label>
                        <input type="number" class="form-control" style="color:#0090e7" name="phonenumber" placeholder="Phone Number" required="">
                      </div>
                      <div class="form-group">
                        <label for="speciality">Speciality</label>
                        <select class="js-example-basic-single" style="width:100%; color:#0090e7" name='speciality' required="">
                        <option>--Select Speciality-- </option>
                        <option value="Paramedic">Paramedic</option>
                        <option value="Nutritionist">Nutritionist</option>
                        <option value="Physiotherapist">Physiotherapist</option>
                        <option value="Advisor">Advisor</option>
                        <option value="Fitness Trainer">Fitness Trainer</option>
                      </select>
                      </div>
                      <div class="form-group">
                        <label>Specialist Image</label>
                        <input type="file" name="file" required="" ><!-- class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>-->
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <button class="btn btn-dark">Cancel</button>
                    </form>
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