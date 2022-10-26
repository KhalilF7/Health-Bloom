<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>One Health - Medical Center HTML5 Template</title>

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
        <li class="nav-item">
          <a class="nav-link" href="{{url('home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.html">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('specialists')}}">Specialists</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact</a>
        </li>

        @if(Route::has('login'))

        @auth
        
        <li class="nav-item">
          <a class="nav-link active" href="{{url('myappointment')}}">My Appointment</a>
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
            <li class="breadcrumb-item active" aria-current="page">My Appointment</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Appointments</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

    <div class="page-section">
        <div class="container">
            <table class="text-center wow fadeInUp" align="center" width="90%">
                <tr style="padding: 6px 12px; background-color: #00D9A5; color: #fff; border-radius: 4px;">
                    <th style="padding: 10px; font-size: 20px;">Specialist Name</th>
                    <th style="padding: 10px; font-size: 20px;">Date</th>
                    <th style="padding: 10px; font-size: 20px;">Message</th>
                    <th style="padding: 10px; font-size: 20px;">Status</th>
                    <th style="padding: 10px; font-size: 20px;">Cancel Appointment</th>
                </tr>

                @foreach($appoints as $appoint)

                <tr style="padding: 6px 12px; background-color: #E1EBE8; color: #6E807A; border-radius: 4px;">
                    <td>{{$appoint->specialist->name}}</td>
                    <td>{{$appoint->date}}</td>
                    <td>{{$appoint->message}}</td>
                    <td class="tag-cloud-link">{{$appoint->status}}</td>
                    <td><a class="btn btn-warning" onClick="return confirm('Are you sure to cancel this appointment ?')" href="{{url('cancel_appointment', $appoint->id)}}">Cancel</a></td>
                </tr>

                @endforeach

            </table>
        </div> <!-- .container -->
    </div> <!-- .page-section -->

    @include('user.appointment')
 

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