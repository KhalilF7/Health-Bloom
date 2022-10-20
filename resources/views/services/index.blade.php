<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>Health Bloom - Medical Center</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">Health</span>-Bloom</a>

        <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-link" href="{{url('')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="doctors.html">Doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.html">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
            <li class="nav-item active">
            <a class="nav-link" href="{{url('service')}}">Services</a>
            </li>

        @if(Route::has('login'))

        @auth
        
        <li class="nav-item">
          <a class="nav-link" href="{{url('myappointment')}}">My Appointment</a>
        </li>

        <x-app-layout>
        </x-app-layout>

        @else

        <li class="nav-item">
            <a class="btn btn-primary ml-lg-3" href="{{route('login')}}">Login</a>
        </li>
        <li class="nav-item">
            <a class="btn btn-primary ml-lg-3" href="{{route('register')}}">Register</a>
        </li>

        @endauth

        @endif

      </ul>
    </div> <!-- .navbar-collapse -->
  </div> <!-- .container -->
</nav>
</header>


      
      @if(session()->has('message'))
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">X</button>
        {{session()->get('message')}}
      </div>
      @endif


  <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">My service</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Services</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

<!-- <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Laravel 9 Crud</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/service/create') }}" class="btn btn-success btn-sm" title="Add New Service">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Duration</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($services as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>{{ $item->time }}</td>
                                        <td>{{ $item->duration }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <a href="{{ url('/service/' . $item->id) }}" title="View Service"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/service/' . $item->id . '/edit') }}" title="Edit Service"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <form method="POST" action="{{ url('/service' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Service" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
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
    </div> -->
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
                                            <a href="{{ url('/service/' . $item->id) }}" title="View Service"><button class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/service/' . $item->id . '/edit') }}" title="Edit Service"><button class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <form method="POST" action="{{ url('/service' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger" title="Delete Service" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>

                @endforeach

            </table>
        </div> <!-- .container -->
    </div> .page-section
 

<footer class="page-footer">
  <div class="container">
    <div class="row px-md-3">
      <div class="col-sm-6 col-lg-3 py-3">
        <h5>Company</h5>
        <ul class="footer-menu">
          <li><a href="#">About Us</a></li>
          <li><a href="#">Career</a></li>
          <li><a href="#">Editorial Team</a></li>
          <li><a href="#">Protection</a></li>
        </ul>
      </div>
      <div class="col-sm-6 col-lg-3 py-3">
        <h5>More</h5>
        <ul class="footer-menu">
          <li><a href="#">Terms & Condition</a></li>
          <li><a href="#">Privacy</a></li>
          <li><a href="#">Advertise</a></li>
          <li><a href="#">Join as Doctors</a></li>
        </ul>
      </div>
      <div class="col-sm-6 col-lg-3 py-3">
        <h5>Our partner</h5>
        <ul class="footer-menu">
          <li><a href="#">HB-Fitness</a></li>
          <li><a href="#">HB-Drugs</a></li>
          <li><a href="#">HB-Live</a></li>
        </ul>
      </div>
      <div class="col-sm-6 col-lg-3 py-3">
        <h5>Contact</h5>
        <p class="footer-link mt-2">351 Willow Street Franklin, MA 02038</p>
        <a href="#" class="footer-link">701-573-7582</a>
        <a href="#" class="footer-link">healthcare@temporary.net</a>

        <h5 class="mt-3">Social Media</h5>
        <div class="footer-sosmed mt-3">
          <a href="#" target="_blank"><span class="mai-logo-facebook-f"></span></a>
          <a href="#" target="_blank"><span class="mai-logo-twitter"></span></a>
          <a href="#" target="_blank"><span class="mai-logo-google-plus-g"></span></a>
          <a href="#" target="_blank"><span class="mai-logo-instagram"></span></a>
          <a href="#" target="_blank"><span class="mai-logo-linkedin"></span></a>
        </div>
      </div>
    </div>

    <hr>

    <p id="copyright">Copyright &copy; 2020 <a href="https://macodeid.com/" target="_blank">MACode ID</a>. All right reserved</p>
  </div>
</footer>

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  
</body>
</html>
    