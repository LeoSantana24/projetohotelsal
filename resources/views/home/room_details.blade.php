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
          body {
    padding-top: 85px; 
    }


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
    <header class="not-home">
    @include('home.header')

   
    </header>
    
  



    

   
    
    <section class="section contact-section" id="next">
  <div class="container min-vh-100 d-flex align-items-center justify-content-center mt-5">
    <div class="row w-100 justify-content-center">
      <div class="col-md-8 col-lg-6">
        <form action="{{ url('add_booking', $room->id) }}" method="post"
          class="bg-white p-md-5 p-4 mb-5 border rounded-3 shadow-sm" style="max-width: 800px; margin: auto;">
          
          @csrf

          @if(session()->has('message') || session()->has('error'))
    @php
        $message = session()->get('message') ?? session()->get('error');
        $isError = session()->has('error') || str_contains($message, 'reserved');
    @endphp

    <div class="alert {{ $isError ? 'alert-danger' : 'alert-success' }}">
        <button type="button" class="close" data-bs-dismiss="alert">×</button>
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
              <input type="date" id="start_date" name="start_date" class="form-control" required>
            </div>
            <div class="col-md-6 form-group">
              <label for="end_date" class="text-black font-weight-bold">Date Check Out</label>
              <input type="date" id="end_date" name="end_date" class="form-control" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 form-group">
              <label for="number_adults" class="font-weight-bold text-black">Adults</label>
              <input type="number" name="number_adults" id="number_adults" class="form-control"  value="1" min="1" max="2"  required>
              <p>max 2</p>
            </div>
            <div class="col-md-6 form-group">
              <label for="number_children" class="font-weight-bold text-black">Children</label>
              <input type="number" name="number_children" id="number_children" class="form-control" value="0"  max="2">
              <p>max 2- child from 0 to 10 years old</p>
            </div>
          </div>
          <div class="mb-3" id="cribOption" style="display: none;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="baby_crib" id="baby_crib" value="1">
              <label class="form-check-label" for="baby_crib">
                add crib (+12,00 €)
              </label>
            </div>
          </div>



          <div class="row">
            <input style="margin-left:10px;" type="submit" name="action" value="Add to cart" class="btn btn-primary py-2 px-4 text-white">

          </div>
        </form>
      </div>

      <!-- Bloco de informações de contato -->
      <div class="col-md-5" data-aos="fade-up" data-aos-delay="200">
        <div class="row">
          <div class="col-md-10 ml-auto contact-info">
            <p><span class="d-block">Address:</span> <span class="text-black">Hotels Avenue
Santa Maria 4111, Cape Verde</span></p>
            <p><span class="d-block">Phone:</span> <span class="text-black">(+238) 9842580</span></p>
            <p><span class="d-block">Email:</span> <span class="text-black">infosalparadisehotel@gmail.com</span></p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
  
</body>



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

    
  const childrenInput = document.getElementById('number_children');
  const cribOption = document.getElementById('cribOption');

  function toggleCribOption() {
    const value = parseInt(childrenInput.value);
    cribOption.style.display = value > 0 ? 'block' : 'none';
  }

  // Executa ao mudar o campo
  childrenInput.addEventListener('input', toggleCribOption);

  // Garante que já mostre se o valor vier preenchido (por exemplo, no editar)
  window.addEventListener('DOMContentLoaded', toggleCribOption);



</script>



    
    
  
</html>