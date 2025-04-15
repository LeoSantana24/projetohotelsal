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
</style>

<header class="site-header js-site-header">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-6 col-lg-4 site-logo" data-aos="fade">
        <a href="{{ url('/') }}">Sal Paradise Hotel</a>
      </div>

      <div class="col-6 col-lg-8 d-flex justify-content-lg-end justify-content-between align-items-center">

          <!-- Botão Carrinho -->
          <div class="col-6 col-lg-8">
    <div class="d-flex justify-content-end align-items-center w-100 gap-3">

      <!-- Carrinho -->
      <button id="cartToggleBtn" class="btn btn-outline-dark me-2">
        🛒 <span class="d-none d-lg-inline"></span> ({{ count($cart ?? []) }})
      </button>

      <!-- Login/Registro -->
      @if (Route::has('login'))
        @auth
          <x-app-layout />
        @else
          <div class="d-flex gap-2">
            <button onclick="window.location.href='/login'" class="btn btn-warning">Entrar</button>
            @if (Route::has('register'))
              <button onclick="window.location.href='/register'" class="btn btn-secondary">Registar</button>
            @endif
          </div>
        @endauth
      @endif
        <!-- Menu Hamburguer -->
        <div class="site-menu-toggle js-site-menu-toggle d-flex align-items-center ms-3">
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
</header>

<!-- ✅ Painel lateral do carrinho -->
<div id="cartPanel" class="cart-panel">
  <div class="cart-header">
    <h5>Carrinho de Reservas</h5>
    <button id="closeCartBtn" class="btn-close" aria-label="Fechar">&times;</button>
  </div>
  <div class="cart-body">
    @if(count($cart ?? []) > 0)

  
    
      @foreach($cart as $index => $item)
      


        @php
        
          $start = \Carbon\Carbon::parse($item['start_date']);
          $end = \Carbon\Carbon::parse($item['end_date']);
          $nights = $start->diffInDays($end);
          $pricePerNight = isset($item['price']) ? floatval($item['price']) : 100;
          $hasCrib = isset($item['baby_crib']) && $item['baby_crib'];
          $cribFee = $hasCrib ? 12 : 0;
          $total = ($nights * $pricePerNight) + $cribFee;

        @endphp

        <div class="mb-3 p-3 border rounded shadow-sm bg-white">
        <div class="mb-3 p-3 border rounded shadow-sm bg-white position-relative">
  <a href="{{ url('/cart/remove/' . $index) }}" class="btn-close position-absolute" style="top: 10px; right: 10px;" aria-label="Remover">X</a>

  <h6>Reserva {{ $index + 1 }}</h6>
  <!-- resto das infos -->
</div>
          <p><strong>Room:</strong> {{ $item['room_title'] }}</p>
          <p><strong>Name:</strong> {{ $item['name'] }}</p>
          <p><strong>Email:</strong> {{ $item['email'] }}</p>
          <p><strong>Check-in:</strong> {{ $item['start_date'] }}</p>
          <p><strong>Check-out:</strong> {{ $item['end_date'] }}</p>
          <p><strong>Adults:</strong> {{ $item['number_adults'] }}</p>
          <p><strong>Children:</strong> {{ $item['number_children'] }}</p>
          @if($hasCrib)
            <p><strong>Berço:</strong> +12,00 €</p>
          @endif
          <p><strong>Nights:</strong> {{ $nights }} night{{ $nights > 1 ? 's' : '' }}</p>
          <p><strong>Price per night:</strong> {{ number_format($pricePerNight, 2, ',', '.') }} €</p>
          <p><strong>Total:</strong> {{ number_format($total, 2, ',', '.') }} €</p>
        </div>
      @endforeach
      <a  style="margin-bottom:5px;" href="{{ url('/cart/reset') }}" class="btn btn-danger w-100 mt-2">🗑️ Limpar Carrinho</a>
      <a href="{{ route('cart') }}" class="btn btn-primary w-100">Checkout</a>
    @else
      <p>O seu carrinho está vazio.</p>
    @endif
  </div>
</div>

<!-- ✅ JavaScript para abrir/fechar -->
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
