<div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="admin/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="active"><a href="index.html"> <i class="icon-home"></i>Página Inicial </a></li>
                
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Quartos Hotel </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{url('create_room')}}">Adicionar Quartos</a></li>
                    <li><a href="{{url('view_room')}}">Ver Quartos</a></li>
                  </ul>
                </li>
                <li><a href="#massagemDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Massages Hotel </a>
                <ul id="massagemDropdown" class="collapse list-unstyled ">
                    <li><a href="{{url('create_type_massage')}}">Adicionar Massagens</a></li>
                    <li><a href="{{url('view_room')}}">Ver Massagens</a></li>
                  </ul>

                <li> 
                <a href="{{url('bookings')}}"> <i class="icon-home"></i>Reservas </a>
              </li>

              <li> 
                <a href="{{url('view_gallery')}}"> <i class="icon-home"></i>Galeria </a>
              </li>
                
        </ul>
      </nav>




      <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
