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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .container {
    margin-top: 0; /* Remove a margem superior de 40px */
    padding-top: 0; /* Remove o padding superior se houver */
}

    html, body {
        margin: 0;
        padding: 0;
    }
    header{
        .btn{
            background-color:transparent;
            color:#343A40;
        }
    }
  
    /* Espaçamento geral da seção */
.massage-section {
    padding: 60px 0; /* 60px top/bottom, 0 left/right */
    margin: 0 auto;
}

/* Container principal */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Títulos e texto */
.container h2 {
    margin-bottom: 15px;
    padding-top: 20px;
    font-size: 2rem;
}

.container p {
    margin-bottom: 40px;
    line-height: 1.6;
    color: #555;
}

/* Grid de cards */
.massage-types {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-bottom: 40px;
}

/* Cards individuais */
.massage-card {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

/* Espaçamento interno dos cards */
.massage-content {
    padding: 25px;
}

/* Responsividade */
@media (max-width: 768px) {
    .massage-section {
        padding: 40px 0;
    }
    
    .container h2 {
        font-size: 1.8rem;
        padding-top: 10px;
    }
    
    .massage-types {
        gap: 20px;
    }
}
    .container {
        margin-top: 0;
        padding-top: 0;
    }
    h1, h2, h3 {
        margin-bottom: 20px;
    }
    .massage-types {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
    }
    .massage-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
        margin-top: 40px;
    }
    .massage-card {
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    .massage-card:hover {
        transform: translateY(-5px);
    }
    .massage-image {
        width: 100%;
        height: 250px; /* Altura fixa para todas as imagens */
        overflow: hidden;
    }
    .massage-image img {
        
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.3s ease;
    }
    .massage-card:hover .massage-image img {
        transform: scale(1.05);
    }

    .massage-content {
        padding: 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    .massage-content h3 {
        color: #3a6351;
        margin-bottom: 10px;
    }
    .massage-content p {
        margin-bottom: 15px;
        line-height: 1.5;
        flex-grow: 1;
    }
    .price {
        font-weight: bold;
        color: #FFBA5A;
        font-size: 1.2rem;
        margin-bottom: 15px;
    }
    .btn {
        display: inline-block;
        background-color:rgba(33, 37, 41, 0.9);
        color: white;
        padding: 10px 20px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 500;
        transition: background-color 0.3s ease;
        align-self: flex-start;
        margin-top: auto;
    }
    .btn:hover {
        background-color: #FFBA5A;
        cursor: pointer;
    }
    .booking-form {
        background-color: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        max-width: 600px;
        margin: 50px auto;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
    }
    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
    }
    .duration-options {
        display: flex;
        gap: 10px;
        margin-bottom: 15px;
    }
    .duration-option {
        flex: 1;
    }
    .duration-option input[type="radio"] {
        display: none;
    }
    .duration-option label {
        display: block;
        text-align: center;
        padding: 10px;
        background-color: #f5f5f5;
        border: 1px solid #ddd;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .duration-option input[type="radio"]:checked + label {
        background-color: #FFBA5A;
        color: white;
        border-color: #FFBA5A;
    }
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.5);
        overflow: auto;
    }
    .modal-content {
        background-color: white;
        margin: 5% auto;
        padding: 30px;
        width: 90%;
        max-width: 800px;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.2);
    }
    .booking-form {
        width: 90%;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }
    .close:hover {
        color: black;
    }
</style>
  </head>
  <body>   
   @include('home.header')
    <!-- END head -->
    <section class="site-hero inner-page overlay" style="background-image: url(images/sm.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade">
            <h1 class="heading mb-3">Massages</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="index.html">Home</a></li>
              <li>&bullet;</li>
              <li>Massages</li>
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
   
        </div>

      </div>
    </section>

    <div class="container">
        <h2>Nossos Tipos de Massagens</h2>
        <p>Conheça nossas opções de massagens e escolha a ideal para você:</p>
        


        
        <div class="massage-types">
    @foreach($massages as $type_massage)
    <div class="massage-card">
        <div class="massage-image">
            <figure>
                <img src="{{ asset('Type_massage/' . $type_massage->image) }}" alt="Imagem de {{$type_massage->massage_title}}">
            </figure>
        </div>
        <div class="massage-content">
            <h3>{{$type_massage->massage_title}}</h3>
            <p>{{ $type_massage->description }}</p>
            <div class="price">From {{ $type_massage->price }}€</div>
            <button class="btn book-btn" data-id="{{ $type_massage->id }}" data-massage="{{ $type_massage->massage_title }}" data-price-30="80" data-price-60="120" data-price-90="160">Scheduler</button>
        </div>
    </div>
    @endforeach
</div>

<!-- Modal de reserva -->
<div id="bookingModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Agendar Massagem</h2>
        <h3 id="selectedMassage"></h3>
        
        <form id="bookingForm" method="POST">
            @csrf
            <input type="hidden" name="massage_id" id="massageIdInput">
            
            <div class="form-group">
                <label>Duração da Sessão:</label>
                <div class="duration-options">
                    <div class="duration-option">
                        <input type="radio" id="duration30" name="duration" value="30min" required>
                        <label for="duration30">30min</label>
                    </div>
                    <div class="duration-option">
                        <input type="radio" id="duration60" name="duration" value="60min" checked required>
                        <label for="duration60">60min</label>
                    </div>
                    <div class="duration-option">
                        <input type="radio" id="duration90" name="duration" value="90min" required>
                        <label for="duration90">90min</label>
                    </div>
                </div>
                <div class="price-info">Valor: € <span id="priceValue">0.00</span></div>
            </div>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" required>
      </div>

      <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" required>
      </div>

      <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" value="{{ Auth::user()->phone }}" required>
      </div>

      <div class="form-group">
        <label for="date">Date of Massage:</label>
        <input type="date" id="date" name="date" required>
      </div>

      <div class="form-group">
        <label for="time">Hour:</label>
        <select id="time" name="hour" required>
          <option value="">Select one hour</option>
          <option value="09:00">09:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
          <option value="12:00">12:00</option>
          <option value="14:00">14:00</option>
          <option value="15:00">15:00</option>
          <option value="16:00">16:00</option>
          <option value="17:00">17:00</option>
          <option value="18:00">18:00</option>
        </select>
      </div>

      <button type="submit" class="btn">Confirmar Reserva</button>
        </form>
    </div>
</div>

  </div>  
    
   

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
    

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Elementos do DOM
    const modal = document.getElementById("bookingModal");
    const bookBtns = document.querySelectorAll(".book-btn");
    const closeBtn = document.querySelector(".close");
    const bookingForm = document.getElementById("bookingForm");
    const durationOptions = document.querySelectorAll('input[name="duration"]');
    const priceValue = document.getElementById("priceValue");
    
    // Armazena os preços do serviço atual
    let currentPrices = {
        '30min': 0,
        '60min': 0,
        '90min': 0
    };

    // Configura os eventos dos botões de reserva
    bookBtns.forEach(btn => {
        btn.addEventListener("click", function() {
            // Obtém os dados do serviço
            const massageId = this.getAttribute("data-id");
            const massageName = this.getAttribute("data-massage");
            
            // Atualiza os preços
            currentPrices = {
                '30min': parseFloat(this.getAttribute("data-price-30")) || 0,
                '60min': parseFloat(this.getAttribute("data-price-60")) || 0,
                '90min': parseFloat(this.getAttribute("data-price-90")) || 0
            };
            
            // Atualiza o formulário
            document.getElementById("massageIdInput").value = massageId;
            document.getElementById("selectedMassage").textContent = massageName;
            bookingForm.action = `/massagens/reservar/${massageId}`;
            
            // Seleciona 60min por padrão e atualiza o preço
            document.getElementById("duration60").checked = true;
            updatePrice();
            
            // Abre o modal
            modal.style.display = "block";
        });
    });

    // Atualiza o preço quando muda a duração
    durationOptions.forEach(option => {
        option.addEventListener("change", updatePrice);
    });

    // Função para atualizar o preço exibido
    function updatePrice() {
        const selectedDuration = document.querySelector('input[name="duration"]:checked').value;
        priceValue.textContent = currentPrices[selectedDuration].toFixed(2);
    }

    // Fecha o modal
    closeBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });
    window.addEventListener("click", (event) => {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });

    // Envio do formulário
    bookingForm.addEventListener("submit", async function(e) {
        e.preventDefault();
        
        const submitBtn = this.querySelector('button[type="submit"]');
        submitBtn.disabled = true;
        submitBtn.textContent = 'Enviando...';
        
        try {
            const formData = new FormData(this);
            const response = await fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });
            
            const result = await response.json();
            
            if (result.success) {
                alert(result.message);
                modal.style.display = "none";
                window.location.reload();
            } else {
                alert(result.message);
            }
        } catch (error) {
            console.error('Erro:', error);
            alert('Ocorreu um erro ao processar sua reserva.');
        } finally {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Confirmar Reserva';
        }
    });
});
</script>


        
    
  </body>
</html>