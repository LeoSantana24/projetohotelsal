<!DOCTYPE HTML>
<html>
  <head>
    <base href="/public">
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

body {
            font-family: 'Poppins', sans-serif;
        }
        .room-info h2 {
            font-size: 36px;
            font-weight: 700;
            color: #333;
        }
        .room-info p {
            font-size: 20px;
            font-weight: 400;
            color: #444;
            line-height: 1.6;
        }
        .room-info h4 {
            font-size: 22px;
            font-weight: 600;
            color: #555;
            margin-top: 10px;
        }
        .room-info h3 {
            font-size: 28px;
            font-weight: 700;
            color: #d9534f;
            margin-top: 15px;


      .container{
        display:inline-block;
        width: 200px;
      }
      input{
        width: 100%;
      }

    
    header{
      padding-bottom:200px;
    }
    

    .room-details-page header {
    background-color: white !important;  
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);  
    position: fixed; 
    width: 100%;
    top: 0;
    left: 0;
    z-index: 1000;
}

.room-details-page .navbar-brand,
.room-details-page .navbar-toggler-icon {
    color: black !important;
}

.room-details-page .navbar-toggler-icon svg,
.room-details-page .navbar-toggler-icon path {
    fill: black !important;
    stroke: black !important;
}

    .room-details-page header {
    background-color: white !important;  /* Garante que o fundo do header seja branco */
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Adiciona um leve sombreado */
}

.room-details-page .navbar-brand,
.room-details-page .navbar-toggler-icon {
    color: black !important;
}

.room-details-page .navbar-toggler-icon svg {
    fill: black !important;
}

footer{
      padding-top:200px;
    }

    </style>

    
  </head>

  
    <header>
    @include('home.header')
    
    <section class="site-hero inner-page overlay" style="background-image: url(images/sm.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade">
            <h1 class="heading mb-3">Rooms</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="/home">Home</a></li>
              <li>&bullet;</li>
              <li>Rooms</li>
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
    </header>



    

    <body>
    <div class="container mt-5 d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="row justify-content-center align-items-center gap-5 w-100"> 
            
            <!-- Coluna com as informações do quarto -->
            <div class="col-md-5" data-aos="fade-up"> 
                <a href="#" class="room">
                    <div class="img-wrap text-center" style="padding: 20px;">
                        <img src="/room/{{$room->image}}" alt="Room Image" class="img-fluid mb-3"
                             style="height: 400px; width: 100%; max-width: 500px; object-fit: cover; border-radius: 10px;">
                    </div>  
                    <div class="p-3 text-center room-info">
                        <h2>{{$room->room_title}}</h2>
                        <p style="color:black; font-size: 18px; padding: 12px;">{{$room->description}}</p>
                        <h4 style="padding: 12px;"> Free Wi-Fi: {{$room->wifi}}</h4>
                        <h4 style="padding: 12px;"> Room Type: {{$room->room_type}}</h4>
                        <h3 style="padding: 12px;"> Price: {{$room->price}}</h3>
                    </div>
                </a>
            </div>

            <!-- Formulário menor e centralizado -->
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <form action="#" method="post" class="bg-white p-3 border rounded shadow">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="text-black font-weight-bold" for="name">Name</label>
                            <input type="text" id="name" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="text-black font-weight-bold" for="phone">Phone</label>
                            <input type="text" id="phone" class="form-control form-control-sm">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label class="text-black font-weight-bold" for="email">Email</label>
                            <input type="email" id="email" class="form-control form-control-sm">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="text-black font-weight-bold" for="checkin_date">Date Check In</label>
                            <input type="text" id="checkin_date" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="text-black font-weight-bold" for="checkout_date">Date Check Out</label>
                            <input type="text" id="checkout_date" class="form-control form-control-sm">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="font-weight-bold text-black">Adults</label>
                            <select id="adults" class="form-control form-control-sm">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4+</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="font-weight-bold text-black">Children</label>
                            <select id="children" class="form-control form-control-sm">
                                <option>0</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3+</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12 form-group">
                            <label class="text-black font-weight-bold" for="message">Notes</label>
                            <textarea id="message" class="form-control form-control-sm" cols="30" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <input type="submit" value="Reserve Now" class="btn btn-primary text-white py-2 px-4 font-weight-bold">
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
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
  
</html>