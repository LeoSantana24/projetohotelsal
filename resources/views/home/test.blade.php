<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sal Paradise Hotel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Sans:400,700|Playfair+Display:400,700" />
  <!-- Adicione Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">




  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Plugins CSS -->
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">
  <link rel="stylesheet" href="css/fancybox.min.css">

  <!-- Fonts -->
  <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

  <!-- Custom Theme Style -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


  <style>

 
   

    /* Adicione este estilo para evitar que o conteúdo fique escondido atrás do header */
   .site-header {
  position: fixed;
  top: 0;
  width: 100%;
  padding: 60px 0;
  z-index: 2;
  -webkit-transition: .3s all ease-in-out;
  -o-transition: .3s all ease-in-out;
  transition: .3s all ease-in-out; }

    /* Mantenha os outros estilos que já existem */
    .owl-prev, .owl-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0,0,0,0.5);
        color: white;
        padding: 10px 15px;
        border-radius: 50%;
        font-size: 20px;
        cursor: pointer;
        z-index: 999;
    }

    .owl-prev {
        left: 10px;
    }

    .owl-next {
        right: 10px;
    }

    .image-carousel .owl-stage-outer,
    .image-carousel .owl-item {
        height: 100%;
    }

    .cart-panel {
    position: fixed;
    top: 70px;
    right: -400px;
    width: 350px;
    height: calc(100vh - 70px);
    background: #f8f9fa;
    box-shadow: -2px 0 10px rgba(0, 0, 0, 0.2);
    padding: 20px;
    z-index: 1050;
    overflow-y: auto;
    transition: right 0.3s ease;
  }

  .cart-panel.open {
    right: 0;
  }

  .cart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .btn-close {
    background: transparent;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
  }
  .container-row{
    display: flex;
    width: 90%;
    margin: auto;
    justify-content: space-between;
  }
  .col-title,
  .col-menu{
    width: auto;
  }
  .col-title a{
    text-decoration: none;
  }
  .btn-card{
    background: transparent;
    border: 2px solid gray;
  }
  .site-menu-toggle span{
    margin: 7px;
    margin-right: 10px;
  }
</style>
</head>



  <header class="not-home">@include('home.header')</header>
 <body >

    <a class="mouse smoothscroll" href="#next">
      <div class="mouse-icon">
        <span class="mouse-wheel"></span>
      </div>
    </a>
  </section>

  <section class="section bg-light">
    @foreach($rooms as $index => $room)
    <div class="site-block-half d-block d-lg-flex bg-white p-4 mb-5" data-aos="fade" data-aos-delay="100">
      @if($index % 2 === 0)
      <div class="owl-carousel image-carousel" style="width: 50%; min-height: 400px;">
        @foreach($room->images as $img)
        <div>
          <img src="{{ asset('room/' . $img->image) }}" class="image d-block w-100 h-100" style="min-height: 400px; object-fit: cover; border-radius: 10px;">
        </div>
        @endforeach
      </div>

      <div class="text p-4" style="width: 50%;">
        <h2 class="mb-3" style="font-size: 2.5rem; color: #1d3c6e;">{{optional($room->typeRoom)->nome }}</h2>
        <p>{{ $room->description }}</p>
        <div class="mt-4 d-flex justify-content-start gap-3">
          <a href="javascript:void(0);" class="btn btn-outline-dark px-4 py-2 mr-2" onclick="openModal({{ $room->id }})">See Room Features</a>
          <a href="{{ url('room_details', $room->id) }}" class="btn btn-dark text-white px-4 py-2">Reserve</a>
        </div>
      </div>
      @else
      <div class="text p-4" style="width: 50%;">
        <h2 class="mb-3" style="font-size: 2.5rem; color: #1d3c6e;">{{ optional($room->typeRoom)->nome }}</h2>
        <p>{{ $room->description }}</p>
       <span class="fw-bold mt-3 mb-2" style="font-size: 18px; color: #e6a900;">{{$room->price}}€ / Per night</span>
        <div class="mt-4 d-flex justify-content-start gap-3">
          <a href="javascript:void(0);" class="btn btn-outline-dark px-4 py-2 mr-2" onclick="openModal({{ $room->id }})">See Room Features</a>
          <a href="{{ url('room_details', $room->id) }}" class="btn btn-dark text-white px-4 py-2">Reserve</a>
        </div>
      </div>

      <div class="owl-carousel image-carousel" style="width: 50%; min-height: 400px;">
        @foreach($room->images as $img)
        <div>
          <img src="{{ asset('room/' . $img->image) }}" class="image d-block w-100 h-100" style="min-height: 400px; object-fit: cover; border-radius: 10px;">
        </div>
        @endforeach
      </div>
      @endif
    </div>
    @endforeach
  </section>

  <section class="section bg-image overlay" style="background-image: url('images/sm.jpg');">
    <div class="container">
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

  <!-- Modal de Características -->
  <div class="modal fade" id="featuresModal" tabindex="-1" aria-labelledby="featuresModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-4">
        <div class="modal-header">
          <h5 class="modal-title" id="featuresModalLabel">Room Features</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>


        </div>
        <div class="modal-body">
          <ul id="featuresList" class="list-unstyled">
            <!-- Preenchido por JS -->
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


  <script>
    $(document).ready(function () {
      $('.image-carousel').owlCarousel({
        items: 1,
        loop: true,
        nav: true,
        dots: true,
        navText: ['<span class="owl-prev">&lt;</span>', '<span class="owl-next">&gt;</span>'],
        autoplay: false
      });
    });

    function openModal(roomId) {
      fetch(`/room-features/${roomId}`)
        .then(response => response.json())
        .then(data => {
          const list = document.getElementById('featuresList');
          list.innerHTML = '';
          if (data.length === 0) {
            list.innerHTML = '<li>Sem características cadastradas.</li>';
          } else {
            data.forEach(feature => {
              const item = document.createElement('li');
              item.innerHTML = `<i class="${feature.icon_class} me-2"></i> ${feature.name}`;
              list.appendChild(item);
            });
          }
          new bootstrap.Modal(document.getElementById('featuresModal')).show();
        })
        .catch(error => {
          console.error('Erro ao buscar características:', error);
        });
    }
    
  </script>
</body>
</html>
