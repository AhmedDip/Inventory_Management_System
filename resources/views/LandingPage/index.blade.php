<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>হিসাব কিতাব </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('template/img/taka.jpg')}}" rel="icon">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('template/Frontend/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('template/Frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('template/Frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('template/Frontend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('template/Frontend/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('template/Frontend/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('template/Frontend/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('template/Frontend/assets/css/style.css')}}" rel="stylesheet">

</head>

<body>


  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto">
        <img src="{{asset('template/img/main_logo_yl.png')}}" alt="">
      </h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Products</a></li>

          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted login" href="{{route('login')}}">Login</a></li>
          <li><a class="register scrollto" href="{{route('registration')}}">Register</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-8 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Inventory <span style="color:yellow">Management</span> System</h1>
          <h2 style="color:rgb(255, 255, 255)"><span style="color:yellow">হিসাব কিতাব</span> ইনভেন্টরি ম্যানেজমেন্ট সফ্টওয়্যার আপনাকে আপনার ব্যবসার রিয়েল-টাইম ডেটা বিশ্লেষণ করতে সহায়তা করবে ।</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="{{route('login')}}" class="btn-get-started scrollto">Get Started</a>
            <a href="https://www.youtube.com/watch?v=phcyuakEMDg" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
        </div>
        <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="100">
          <img src="{{asset('template/Frontend/assets/img/portfolio/inventory-hero.svg')}}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Products Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container">

        <div class="row" data-aos="zoom-in">

          @foreach ($partners as $partner)

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset(Storage::url($partner->image)) }}" class="img-fluid" alt="">
          </div>
            
          @endforeach
        

        </div>

      </div>
    </section><!-- End Cliens Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>এই অ্যাপ্লিকেশন সম্পর্কে</h2>
        </div>

        <div class="row content">
          <div class="col-lg-8">
            <p>
              যেকোনো ছোট বা বড় প্রতিষ্ঠানের জন্য এই ওয়েব এপ্লিকেশনটি আদর্শ। আপনি সবে শুরু করছেন, একটি ছোট বা বড় প্রতিষ্ঠান এই অ্যাপটি থেকে আপনি উপকৃত হতে পারেন । ইনভেন্টরি অডিট করতে, স্টকআউট এড়াতে এবং ইনভেন্টরি লেভেল বজায় রাখতে হিসাব কিতাব সফটওয়্যারটি ব্যবহার করা যেতে পারে । 
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> রিয়েল-টাইম ডেটা সহ সম্পূর্ণ ইনভেন্টরি নিয়ন্ত্রণ করা যাবে এই সফ্টওয়্যারটি ব্যবহার করে স্টকআউট, ভুল স্টক গণনা এবং অনুপস্থিত সরঞ্জামের ঝামেলা এড়ানো যাবে এবং আপনাকে আপনার ইনভেন্টরির দায়িত্বকে সঠিক ভাবে পরিচালনা করতে সহায়তা করবে । </li>
          
              <li><i class="ri-check-double-line"></i>প্রোডাক্ট ক্রয়ের,বিক্রয়ের এবং পেমেন্ট দেয়া নেয়ার হিসাব খুব সহজেই সংরক্ষণ করা যাবে । </li>
              <a href="#" class="btn-learn-more">Learn More</a>
            </ul>
          </div>
          <div class="col-lg-4 pt-4 pt-lg-0">
            <img src="{{asset('template/img/Capture.PNG')}}" style="height: 280px; width: 100%;" class="img-thumbnail" alt="">
           
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->




    <!-- ======= Latest Products Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>লেটেস্ট প্রোডাক্টস </h2>
        
        </div>

        <div class="row">
          @foreach ($products as $product)
          <div class="col-md-4  mb-2 ">
          <div class="card ml-4" style="width: 20rem;">
            <img class="card-img-top mx-auto d-block" style="height: 200px; width: 200px;" src="{{ asset(Storage::url($product->image)) }}" alt="Card image cap">
            <div class="card-body" style="background-color:  #000000

            ">
              <h6 class="card-title" style="color:#ffffff">Product Name: {{$product->title}}</h6>

            </div>
          </div>
        </div>
          
        @endforeach

      


        </div>

      </div>
    </section><!-- End Services Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>যোগাযোগ</h2>
        </div>

        <div class="row">

          <div class="col-lg-6 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>{{$user->address}}</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>{{$user->email}}</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>{{$user->phone}}</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d230.04529160025004!2d90.36158349120718!3d22.70129141943302!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1665009782237!5m2!1sen!2sbd"  frameborder="0" style="border:0; width: 100%; height: 290px;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"  allowfullscreen ></iframe>

              {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d230.04529160025004!2d90.36158349120718!3d22.7012914191918!421323m!419191233m! 5e0!3m2!1sen!2sbd!4v1665009782237!5m2!1sen!2sbd" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe> --}}
            </div>

          </div>

          <div class="col-lg-6 mt-5 mt-lg-0 d-flex align-items-stretch">
            <div class="info">
              <form action="{{url('/')}}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="name">Your Name</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="name">Your Email</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="name">Subject</label>
                  <input type="text" class="form-control" name="subject" id="subject" required>
                </div>
                <div class="form-group">
                  <label for="name">Message</label>
                  <textarea class="form-control" name="message" rows="10" required></textarea>
                </div>
               
                <div class="text-center mt-3"><button type="submit" class="btn btn-outline-info">Send Message</button></div>
              </form>
            </div>
     
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <img src="{{asset('template/img/main_logo_bl.png')}}" alt="" style="width: 150px;">
            <p>
              <strong>ঠিকানা:</strong>{{$user->address}}<br>
              <strong>ফোন:</strong>{{$user->phone}}<br>
              <strong>ই-মেইল:</strong>{{$user->email}}<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#hero">হোম </a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">এই অ্যাপ্লিকেশন সম্পর্কে</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">প্রোডাক্টস </a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="">Inventory Checkouts</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="">Purchase Orders</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="">Reports</a></li>

            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p></p>
            <div class="social-links mt-3">
              <a href="https://www.facebook.com/medipahmed/" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="https://github.com/AhmedDip/" class="github"><i class="bx bxl-github"></i></a>
              <a href="https://www.youtube.com/channel/UCR5UBWd5dt4NuUxX08yBxCA" class="google-plus"><i class="bx bxl-youtube"></i></a>
              <a href="https://www.linkedin.com/in/rasidun/" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Ahmed Rasidun Bari Dip</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('template/Frontend/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('template/Frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('template/Frontend/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('template/Frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('template/Frontend/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('template/Frontend/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('template/Frontend/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('template/Frontend/assets/js/main.js')}}"></script>

</body>

</html>