<!DOCTYPE HTML>
<html>
  <head>
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
  </head>
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
      body {
    padding-top: 85px; 
}


  </style>
  <body>
    
   <header class="not-home">@include('home.header')</header>
    <!-- END head -->

   
    <!-- END section -->
     

    <section class="section contact-section" id="next">
     
      <div class="container">
   
        <div class="row">
          
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
                   @if(session()->has('message'))
     <div class="alert alert-success">
      <button type="button" class="close" data-bs-dismiss='alert'>X</button>
       {{session()->get('message')}}
     </div>
     
     @endif
            
            <form id="request" action="{{url('sendcontact')}}" method="post" class="bg-white p-md-5 p-4 mb-5 border">

              @csrf
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="name">Name</label>
                  <input type="text" id="name" name="name" class="form-control " required>
                </div>
                <div class="col-md-6 form-group">
                  <label for="phone">Phone</label>
                  <input type="text" id="phone" name="phone" class="form-control " required>
                </div>
              </div>
          
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" name="email" class="form-control " required>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col-md-12 form-group">
                  <label for="message">Write Message</label>
                  <textarea name="message" id="message" class="form-control " cols="30" rows="8" required></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="submit" value="Send Message" class="btn btn-primary text-white font-weight-bold">
                </div>
              </div>
            </form>

          </div>
          <div class="col-md-5" data-aos="fade-up" data-aos-delay="200">
            <div class="row">
              <div class="col-md-10 ml-auto contact-info">
                <p><span class="d-block">Address:</span> <span> Hotels Avenue
                  Santa Maria 4111, Cape Verde</span></p>
                <p><span class="d-block">Phone:</span> <span> (+238) 984 25 80</span></p>
                <p><span class="d-block">Email:</span> <span> infosalparadisehotel@gmail.com</span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    
            <!-- END slider -->
        </div>

      </div>
    </section>

    
    
    <section class="section bg-image overlay" style="background-image: url('images/sm.jpg');">
        <div class="container" >
          <div class="row align-items-center">
            <div class="col-12 col-md-6 text-center mb-4 mb-md-0 text-md-left" data-aos="fade-up">
              <h2 class="text-white font-weight-bold">A Best Place To Stay. Reserve Now!</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right" data-aos="fade-up" data-aos-delay="200">
              <a href="reservation.html" class="btn btn-outline-white-primary py-3 text-white px-5">Reserve Now</a>
            </div>
          </div>
        </div>
      </section>

    @include('home.footer')
    
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>