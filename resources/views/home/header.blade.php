<style>
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

  <header class= "site-header js-site-header">
    <div class="container-fluid">
      <div class="container-row row align-items-center">
        <div class="site-logo col-title" data-aos="fade">
          <a href="{{ url('/') }}">Sal Paradise Hotel</a>
        </div>

        <div class="col-menu">
          <div class="col-lg-12">
            <div class="d-flex align-items-center">
              <button id="cartToggleBtn" class="btn btn-card">
                🛒<span class="d-none d-lg-inline"></span> ({{ count($cart ?? []) }})
              </button>

              <!-- Login/Registro -->
              @if (Route::has('login'))
                @auth
                  <x-app-layout class="btn btn-profile" />
                @else
                  <div class="d-flex">
                    <button onclick="window.location.href='/login'" class="btn btn-warning">Login</button>
                    @if (Route::has('register'))
                      <button onclick="window.location.href='/register'" class="btn btn-secondary">Register</button>
                    @endif
                  </div>
                @endauth
              @endif

              <!-- Menu Hamburguer -->
              <div class="site-menu-toggle js-site-menu-toggle">
                <span></span><span></span><span></span>
              </div>

              <!-- Navegação -->
              <div class="site-navbar js-site-navbar">
                <nav role="navigation">
                  <div class="container">
                    <div class="row full-height align-items-center">
                      <div class="col-md-6 mx-auto">
                        <ul class="list-unstyled menu">
                          <li class="active"><a href="{{ url('/') }}">Home</a></li>
                          <li><a href="{{ url('/test') }}">Rooms</a></li>
                          <li><a href="about.html">About</a></li>
                          <li><a href="{{ url('/massagens') }}">Massages</a></li>
                          <li><a href="{{ url('/contact') }}">Contact</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div> 
    </div> 
  </header>

<!--  Painel lateral do carrinho -->
<div id="cartPanel" class="cart-panel">
  <div class="cart-header">
    <h5>Reservation cart</h5>
    <button id="closeCartBtn" class="btn-close" aria-label="Fechar">&times;</button>
  </div>
  <div class="cart-body">
  @if(count($cart ?? []) > 0)
    @php
        $grandTotal = 0;
    @endphp

    @foreach($cart as $index => $item)
        @php
            $start = \Carbon\Carbon::parse($item['start_date']);
            $end = \Carbon\Carbon::parse($item['end_date']);
            $nights = $start->diffInDays($end);
            $room = isset($item['room_id']) ? \App\Models\Room::with('typeRoom')->find($item['room_id']) : null;
           $pricePerNight = $room ? floatval($room->price) : 100;
           $price = $room->price;
            $hasCrib = isset($item['baby_crib']) && $item['baby_crib'];
            $cribFee = $hasCrib ? 12 : 0;
            $total = ($nights * $pricePerNight) + $cribFee;
            $grandTotal += $total;

            // Busca o quarto com o tipo (usa o caminho completo da classe Room)
            
        @endphp

        <div class="mb-3 p-3 border rounded shadow-sm bg-white">
            <div class="mb-3 p-3 border rounded shadow-sm bg-white position-relative">
                <a href="{{ url('/cart/remove/' . $index) }}" class="btn-close position-absolute" style="top: 10px; right: 10px;color:red;" aria-label="Remover">X</a>
                <h6>Reserve {{ $index + 1 }}</h6>
            </div>

            <p><strong>Room type:</strong>
                @if ($room && $room->typeRoom)
                    {{ $room->typeRoom->nome }}
                
            </p>

            <p><strong>Name:</strong> {{ $item['name'] }}</p>
            <p><strong>Email:</strong> {{ $item['email'] }}</p>
            <p><strong>Phone:</strong> {{ $item['phone'] }}</p>
            <p><strong>Check-in:</strong> {{ $item['start_date'] }}</p>
            <p><strong>Check-out:</strong> {{ $item['end_date'] }}</p>
            <p><strong>Adults:</strong> {{ $item['number_adults'] }}</p>
            <p><strong>Children:</strong> {{ $item['number_children'] }}</p>

            @if($hasCrib)
                <p><strong>Cradle:</strong> +12,00 €</p>
            @endif

            <p><strong>Nights:</strong> {{ $nights }} night{{ $nights > 1 ? 's' : '' }}</p>
            <p><strong>Price per night:</strong> {{ number_format($pricePerNight, 2, ',', '.') }} €</p>
            <p><strong>Total:</strong> {{ number_format($total, 2, ',', '.') }} €</p>
        </div>
        @endif
    @endforeach






      {{-- Total geral --}}
      <div class="p-3 border-top mt-2">
        <h5><strong>Grand total:</strong> {{ number_format($grandTotal, 2, ',', '.') }} €</h5>
      </div>

      <a style="margin-bottom:5px;" href="{{ url('/cart/reset') }}" class="btn btn-danger w-100 mt-2">🗑️ Clean cart</a>
      <a href="{{ url('/checkout') }}" class="btn btn-primary w-100">Checkout</a>
    @else
      <p>Your cart is empty.</p>
    @endif
  </div>
</div>


<script>
  const cartPanel = document.getElementById('cartPanel');
  const toggleBtn = document.getElementById('cartToggleBtn');
  const closeBtn = document.getElementById('closeCartBtn');

  toggleBtn.addEventListener('click', () => {
    cartPanel.classList.toggle('open');
  });

  closeBtn.addEventListener('click', () => {
    cartPanel.classList.remove('open');
  });
</script>
