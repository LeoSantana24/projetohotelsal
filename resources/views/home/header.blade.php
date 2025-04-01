

<header  class="site-header js-site-header">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-6 col-lg-4 site-logo" data-aos="fade">
        <a href="{{url('/')}}">Sal Paradise Hotel</a>
      </div>

      <!-- Container flexível para alinhar elementos no mesmo nível de altura -->
      <div class="col-6 col-lg-8 d-flex justify-content-end align-items-center">

        <!-- Menu Hambúrguer (alinhado com os botões) -->
        <div class="site-menu-toggle js-site-menu-toggle d-flex align-items-center me-3">
          <span></span>
          <span></span>
          <span></span>
        </div>

        <!-- Botões de login e registro (alinhados com o menu hambúrguer) -->
        @if (Route::has('login'))
                          @auth
                            <x-app-layout>

                            </x-app-layout>
                          @else
                            <div class="menu-buttons d-flex align-items-center">
                              <button onclick="window.location.href='/login'" class="btn btn-primary me-2">Entrar</button>
                              @if (Route::has('register'))
                                <button onclick="window.location.href='/register'" class="btn btn-secondary">Registar</button>
                              @endif
                            </div>
                          @endauth
                        @endif
        <div class="site-navbar js-site-navbar">
              <nav role="navigation">
                <div class="container">
                  <div class="row full-height align-items-center">
                    <div class="col-md-6 mx-auto">
                      <ul class="list-unstyled menu">
                        <li class="active"><a href="index.html">Home</a></li>
                        <li><a href="rooms.html">Rooms</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="reservation.html">Reservation</a></li>
                        

                      </div>
</div>

    </div>
  </div>
</header>



















