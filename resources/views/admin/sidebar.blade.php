
@php $activePage = $activePage ?? ''; @endphp

<div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
        <li class="{{ $activePage == 'home' ? 'active' : '' }}">
  <a href="{{ url('home') }}"> <i class="icon-home"></i>Página Inicial</a>
</li>

<li>
  <a href="#exampledropdownDropdown" aria-expanded="{{ $activePage == 'quartos' ? 'true' : 'false' }}" data-toggle="collapse" class="{{ $activePage == 'quartos' ? '' : 'collapsed' }}">
    <i class="icon-windows"></i>Quartos Hotel
  </a>
  <ul id="exampledropdownDropdown" class="collapse list-unstyled {{ $activePage == 'quartos' ? 'show' : '' }}">
    <li><a href="{{ url('create_room') }}">Adicionar Quartos</a></li>
    <li><a href="{{ url('view_room') }}">Ver Quartos</a></li>
  </ul>
</li>

<li>
  <a href="#massagemDropdown" aria-expanded="{{ $activePage == 'massagens' ? 'true' : 'false' }}" data-toggle="collapse" class="{{ $activePage == 'massagens' ? '' : 'collapsed' }}">
    <i class="icon-windows"></i>Massages Hotel
  </a>
  <ul id="massagemDropdown" class="collapse list-unstyled {{ $activePage == 'massagens' ? 'show' : '' }}">
    <li><a href="{{ url('create_type_massage') }}">Adicionar Massagens</a></li>
    <li><a href="{{ url('view_massages') }}">Ver Massagens</a></li>
  </ul>
</li>

<li class="{{ $activePage == 'reservasquarto' ? 'active' : '' }}">
  <a href="{{ url('bookings') }}"> <i class="icon-home"></i>Reservas Quarto</a>
</li>
<li class="{{ $activePage == 'reservasmassagem' ? 'active' : '' }}">
  <a href="{{ url('massageBookings') }}"> <i class="icon-home"></i>Reservas Massagens</a>
</li>

<li class="{{ $activePage == 'galeria' ? 'active' : '' }}">
  <a href="{{ url('view_gallery') }}"> <i class="icon-home"></i>Galeria</a>
</li>

                
        </ul>
      </nav>




      <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
