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

    <style>
        * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
        }

        html, body {
          margin: 0;
          padding: 0;
        }
       
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }
        h1, h2, h3 {
            margin-bottom: 20px;
        }
        .massage-types {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        .massage-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .massage-card:hover {
            transform: translateY(-5px);
        }
        .massage-image {
            height: 200px;
            background-color: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #888;
        }
        .massage-content {
            padding: 20px;
        }
        .massage-content h3 {
            color: #3a6351;
            margin-bottom: 10px;
        }
        .massage-content p {
            margin-bottom: 15px;
            line-height: 1.5;
        }
        .price {
            font-weight: bold;
            color: #5c916e;
            font-size: 1.2rem;
            margin-bottom: 15px;
        }
        .btn {
            display: inline-block;
            background-color: #3a6351;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #5c916e;
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
            background-color: #3a6351;
            color: white;
            border-color: #3a6351;
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
            margin: 5% auto; /* reduz a margem superior pra melhor centralização */
            padding: 30px;
            width: 90%;         /* aumentei de 80% para 90% */
            max-width: 800px;   /* aumentei o limite para deixar mais largo */
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
            <h1 class="heading mb-3">Serviços</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="index.html">Home</a></li>
              <li>&bullet;</li>
              <li>Serviços</li>
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
            <div class="massage-card">
                <div class="massage-image">
                    <p>Imagem de Massagem Relaxante</p>
                </div>
                <div class="massage-content">
                    <h3>Massagem Relaxante</h3>
                    <p>Movimentos suaves que aliviam a tensão muscular, promovem relaxamento profundo e diminuem o estresse.</p>
                    <div class="price">A partir de R$ 80,00</div>
                    <button class="btn book-btn" data-massage="Massagem Relaxante" data-price-30="80" data-price-60="120" data-price-90="160">Agendar</button>
                </div>
            </div>
            
            <div class="massage-card">
                <div class="massage-image">
                    <p>Imagem de Massagem Terapêutica</p>
                </div>
                <div class="massage-content">
                    <h3>Massagem Terapêutica</h3>
                    <p>Técnica que combina pressão profunda com alongamentos para aliviar dores crônicas e melhorar a postura.</p>
                    <div class="price">A partir de R$ 100,00</div>
                    <button class="btn book-btn" data-massage="Massagem Terapêutica" data-price-30="100" data-price-60="150" data-price-90="200">Agendar</button>
                </div>
            </div>
            
            <div class="massage-card">
                <div class="massage-image">
                    <p>Imagem de Massagem com Pedras Quentes</p>
                </div>
                <div class="massage-content">
                    <h3>Massagem com Pedras Quentes</h3>
                    <p>Pedras vulcânicas aquecidas são utilizadas para relaxar músculos tensos e melhorar a circulação sanguínea.</p>
                    <div class="price">A partir de R$ 120,00</div>
                    <button class="btn book-btn" data-massage="Massagem com Pedras Quentes" data-price-30="120" data-price-60="180" data-price-90="240">Agendar</button>
                </div>
            </div>
            
            <div class="massage-card">
                <div class="massage-image">
                    <p>Imagem de Drenagem Linfática</p>
                </div>
                <div class="massage-content">
                    <h3>Drenagem Linfática</h3>
                    <p>Movimentos suaves e ritmados que estimulam o sistema linfático, reduzindo edemas e auxiliando na desintoxicação.</p>
                    <div class="price">A partir de R$ 90,00</div>
                    <button class="btn book-btn" data-massage="Drenagem Linfática" data-price-30="90" data-price-60="140" data-price-90="190">Agendar</button>
                </div>
            </div>
            
            <div class="massage-card">
                <div class="massage-image">
                    <p>Imagem de Massagem Shiatsu</p>
                </div>
                <div class="massage-content">
                    <h3>Shiatsu</h3>
                    <p>Técnica japonesa que utiliza pressão dos dedos em pontos específicos para equilibrar a energia vital do corpo.</p>
                    <div class="price">A partir de R$ 110,00</div>
                    <button class="btn book-btn" data-massage="Shiatsu" data-price-30="110" data-price-60="160" data-price-90="210">Agendar</button>
                </div>
            </div>
            
            <div class="massage-card">
                <div class="massage-image">
                    <p>Imagem de Reflexologia Podal</p>
                </div>
                <div class="massage-content">
                    <h3>Reflexologia Podal</h3>
                    <p>Massagem nos pés que estimula pontos reflexos correspondentes a órgãos e sistemas do corpo, promovendo equilíbrio.</p>
                    <div class="price">A partir de R$ 70,00</div>
                    <button class="btn book-btn" data-massage="Reflexologia Podal" data-price-30="70" data-price-60="100" data-price-90="140">Agendar</button>
                </div>
            </div>
        </div>
    </div>
    
    <div id="bookingModal" class="modal">
        <div class="modal-content" style="width: 80%; max-width: 800px; height: auto; max-height: 90vh; overflow-y: auto;">
            <span class="close">&times;</span>
            <h2>Agendar Massagem</h2>
            <h3 id="selectedMassage"></h3>
            
            <form id="bookingForm" class="booking-form">
                <div class="form-group">
                    <label>Duração da Sessão:</label>
                    <div class="duration-options">
                        <div class="duration-option">
                            <input type="radio" id="duration30" name="duration" value="30" required>
                            <label for="duration30">30min</label>
                        </div>
                        <div class="duration-option">
                            <input type="radio" id="duration60" name="duration" value="60" checked required>
                            <label for="duration60">60min</label>
                        </div>
                        <div class="duration-option">
                            <input type="radio" id="duration90" name="duration" value="90" required>
                            <label for="duration90">90min</label>
                        </div>
                    </div>
                    <div id="priceDisplay" class="price-info">Valor: R$ <span id="priceValue">0</span>,00</div>
                </div>
                
                <div class="form-group">
                    <label for="name">Nome Completo:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="phone">Telefone:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                
                <div class="form-group">
                    <label for="date">Data da Massagem:</label>
                    <input type="date" id="date" name="date" required>
                </div>
                
                <div class="form-group">
                    <label for="time">Horário:</label>
                    <select id="time" name="time" required>
                        <option value="">Selecione um horário</option>
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
                
                <button type="submit" class="btn">Confirmar Agendamento</button>
            </form>
        </div>
    </div>
    
    
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
    


    <script>
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("bookingModal");
    const bookBtns = document.querySelectorAll(".book-btn");
    const closeBtn = document.querySelector(".close");
    const selectedMassageText = document.getElementById("selectedMassage");
    const bookingForm = document.getElementById("bookingForm");
    const priceValue = document.getElementById("priceValue");
    const durationOptions = document.querySelectorAll('input[name="duration"]');

    let currentMassagePrices = { '30': 0, '60': 0, '90': 0 };

    const dateInput = document.getElementById("date");
    const today = new Date();
    const yyyy = today.getFullYear();
    const mm = String(today.getMonth() + 1).padStart(2, '0');
    const dd = String(today.getDate()).padStart(2, '0');
    dateInput.min = `${yyyy}-${mm}-${dd}`;

    bookBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            const massageType = btn.getAttribute("data-massage");
            currentMassagePrices['30'] = btn.getAttribute("data-price-30");
            currentMassagePrices['60'] = btn.getAttribute("data-price-60");
            currentMassagePrices['90'] = btn.getAttribute("data-price-90");

            selectedMassageText.textContent = massageType;
            modal.style.display = "block";
            document.getElementById("duration60").checked = true;
            updatePrice();
        });
    });

    durationOptions.forEach(option => {
        option.addEventListener("change", updatePrice);
    });

    function updatePrice() {
        const selectedDuration = document.querySelector('input[name="duration"]:checked').value;
        priceValue.textContent = currentMassagePrices[selectedDuration];
    }

    closeBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });

    window.addEventListener("click", (event) => {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });

    bookingForm.addEventListener("submit", (e) => {
        e.preventDefault();
        const formData = new FormData(bookingForm);
        const massageType = selectedMassageText.textContent;
        const bookingDate = formData.get("date");
        const bookingTime = formData.get("time");
        const duration = formData.get("duration");
        const price = currentMassagePrices[duration];

        alert(`Agendamento realizado com sucesso!\n\nMassagem: ${massageType}\nDuração: ${duration} minutos\nValor: R$ ${price},00\nData: ${bookingDate}\nHorário: ${bookingTime}\n\nEnviaremos um e-mail de confirmação em breve.`);

        modal.style.display = "none";
        bookingForm.reset();
    });
});
</script>

        
    
  </body>
</html>