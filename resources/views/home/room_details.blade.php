<!DOCTYPE HTML>
<html>
  <head>
    <base href="/public">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sal Paradise Hotel</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sal Paradise Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/fancybox.min.css">
    
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Lora:wght@400;600&display=swap" rel="stylesheet">


    <style>


      input.form-control {
        border-radius: 0.5rem;
        border: 1px solid #ced4da;
        transition: all 0.2s ease-in-out;
        box-shadow: none;
      }

      input.form-control:focus {
        border-color: #fcb045;
        box-shadow: 0 0 0 0.2rem rgba(252, 176, 69, 0.25);
        outline: none;
      }

      .btn-primary {
        background-color: #fcb045;
        border-color: #fcb045;
        border-radius: 999px;
        font-weight: 600;
        transition: background-color 0.3s ease;
      }

      .btn-primary:hover {
        background-color: #ffa726;
        border-color: #ffa726;
      }

    </style>

  </head>

  <body>
    <header>
    @include('home.header')

   
    </header>
    <section class="site-hero inner-page overlay" style="background-image: url(images/sm.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade">
            <h1 class="heading mb-3">Reservation</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="/home">Home</a></li>
              <li>&bullet;</li>
              <li>Reservation</li>
            </ul>
          </div>
        </div>
      </div>

      <a class="mouse smoothscroll" href="#next">
        <div class="mouse-icon">
          <span class="mouse-wheel"></span>
        </div>
      </a>
    </section>
  



    

   
    
    <section class="section contact-section" id="next">
  <div class="container min-vh-100 d-flex align-items-center justify-content-center mt-5">
    <div class="row w-100 justify-content-center">
      <div class="col-md-8 col-lg-6">
        <form action="{{ url('add_booking', $room->id) }}" method="post"
          class="bg-white p-md-5 p-4 mb-5 border rounded-3 shadow-sm" style="max-width: 800px; margin: auto;">
          
          @csrf

          @if(session()->has('message'))
            @php
              $message = session()->get('message');
              $isError = str_contains($message, 'reservado');
            @endphp

            <div class="alert {{ $isError ? 'alert-danger' : 'alert-success' }}">
              <button type="button" class="close" data-bs-dismiss="alert">X</button>
              {{ $message }}
            </div>
          @endif


          <div class="row">
            <div class="col-md-6 form-group">
              <label for="name" class="text-black font-weight-bold">Name</label>
              <input type="text" id="name" name="name" class="form-control"
                @if(Auth::id()) value="{{ Auth::user()->name }}" @endif>
            </div>
            <div class="col-md-6 form-group">
              <label for="phone" class="text-black font-weight-bold">Phone</label>
              <input type="tel" id="phone" name="phone" class="form-control"
                @if(Auth::id()) value="{{ Auth::user()->phone }}" @endif>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 form-group">
              <label for="email" class="text-black font-weight-bold">Email</label>
              <input type="email" id="email" name="email" class="form-control"
                @if(Auth::id()) value="{{ Auth::user()->email }}" @endif>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 form-group">
              <label for="start_date" class="text-black font-weight-bold">Date Check In</label>
              <input type="date" id="start_date" name="start_date" class="form-control">
            </div>
            <div class="col-md-6 form-group">
              <label for="end_date" class="text-black font-weight-bold">Date Check Out</label>
              <input type="date" id="end_date" name="end_date" class="form-control">
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 form-group">
              <label for="number_adults" class="font-weight-bold text-black">Adults</label>
              <input type="number" name="number_adults" id="number_adults" class="form-control" min="1" value="1" required>
            </div>
            <div class="col-md-6 form-group">
              <label for="number_children" class="font-weight-bold text-black">Children</label>
              <input type="number" name="number_children" id="number_children" class="form-control" min="0" value="0">
            </div>
          </div>

          <div class="row">
            <input type="submit" name="action" value="Reservar" class="btn btn-primary py-2 px-4 text-white">
            <input style="margin-left:10px;" type="submit" name="action" value="Adicionar ao Carrinho" class="btn btn-primary py-2 px-4 text-white">

          </div>
        </form>
      </div>

      <!-- Bloco de informações de contato -->
      <div class="col-md-5" data-aos="fade-up" data-aos-delay="200">
        <div class="row">
          <div class="col-md-10 ml-auto contact-info">
            <p><span class="d-block">Address:</span> <span class="text-black">98 West 21th Street, Suite 721 New York NY 10016</span></p>
            <p><span class="d-block">Phone:</span> <span class="text-black">(+238) 9842580</span></p>
            <p><span class="d-block">Email:</span> <span class="text-black">info@salparadisehotel.cv</span></p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
  
</body>



    <footer class="section footer-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Terms &amp; Conditions</a></li>
              <li><a href="#">Privacy Policy</a></li>
             <li><a href="#">Rooms</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">The Rooms &amp; Suites</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Restaurant</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5 pr-md-5 contact-info">
            <!-- <li>198 West 21th Street, <br> Suite 721 New York NY 10016</li> -->
            <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Address:</span> <span> 198 West 21th Street, <br> Suite 721 New York NY 10016</span></p>
            <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-primary"></span>Phone:</span> <span> (+1) 435 3533</span></p>
            <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>Email:</span> <span> info@domain.com</span></p>
          </div>
          <div class="col-md-3 mb-5">
            <p>Sign up for our newsletter</p>
            <form action="#" class="footer-newsletter">
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Email...">
                <button type="submit" class="btn"><span class="fa fa-paper-plane"></span></button>
              </div>
            </form>
          </div>
        </div>
        <div class="row pt-5">
          <p class="col-md-6 text-left">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
            
          <p class="col-md-6 text-right social">
            <a href="#"><span class="fa fa-tripadvisor"></span></a>
            <a href="#"><span class="fa fa-facebook"></span></a>
            <a href="#"><span class="fa fa-twitter"></span></a>
            <a href="#"><span class="fa fa-linkedin"></span></a>
            <a href="#"><span class="fa fa-vimeo"></span></a>
          </p>
        </div>
      </div>

    </footer>
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    
    
    <script src="js/aos.js"></script>
    
    <script src="js/bootstrap-datepicker.js"></script> 
    <script src="js/jquery.timepicker.min.js"></script> 

    

    <script src="js/main.js"></script>

    <script type="text/javascript">
    $(function() {
      var dtToday = new Date();
      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();

      if (month < 10) month = '0' + month.toString();
      if (day < 10) day = '0' + day.toString();

      var maxDate = year + '-' + month + '-' + day;
      $('#startDate').attr('min', maxDate);
      $('#endDate').attr('min', maxDate);
    });

</script>



    
    
  
</html>