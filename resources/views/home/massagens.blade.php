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
    
   
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Sans:400,700|Playfair+Display:400,700" />

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

   
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/fancybox.min.css">
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
    
        * { margin: 0; padding: 0; box-sizing: border-box; }
        header.not-home { position: fixed; z-index: 10; }
        body { padding-top: 150px; }
        .container { margin-top: 0; padding-top: 0; }
        header{ .book-btn{ background-color:transparent; color:#343A40; } }
        .massage-section { padding: 60px 0; margin: 0 auto; }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        .container h2 { margin-bottom: 15px; padding-top: 20px; font-size: 2rem; }
        .container p { margin-bottom: 40px; line-height: 1.6; color: #555; }
        .massage-types { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr  )); gap: 30px; margin-bottom: 40px; }
        .massage-card { background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease; display: flex; flex-direction: column; height: 100%; }
        .massage-card:hover { transform: translateY(-5px); }
        .massage-image { width: 100%; height: 250px; overflow: hidden; }
        .massage-image img { width: 100%; height: auto; object-fit: contain; transition: transform 0.3s ease; }
        .massage-card:hover .massage-image img { transform: scale(1.05); }
        .massage-content { padding: 25px; flex: 1; display: flex; flex-direction: column; }
        .massage-content h3 { color: #3a6351; margin-bottom: 10px; }
        .massage-content p { margin-bottom: 15px; line-height: 1.5; flex-grow: 1; }
        .price { font-weight: bold; color: #FFBA5A; font-size: 1.2rem; margin-bottom: 15px; }
        .book-btn { display: inline-block; background-color:rgba(33, 37, 41, 0.9); color: white; padding: 10px 20px; border-radius: 50px; text-decoration: none; font-weight: 500; transition: background-color 0.3s ease; align-self: flex-start; margin-top: auto; }
        .book-btn:hover { background-color: #FFBA5A; cursor: pointer; }
        .booking-form { background-color: white; padding: 30px; border-radius: 10px; box-shadow: 0 3px 10px rgba(0,0,0,0.1); max-width: 600px; margin: 50px auto; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 500; }
        .form-group input, .form-group select, .form-group textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem; }
        .duration-options { display: flex; gap: 10px; margin-bottom: 15px; }
        .duration-option { flex: 1; }
        .duration-option input[type="radio"] { display: none; }
        .duration-option label { display: block; text-align: center; padding: 10px; background-color: #f5f5f5; border: 1px solid #ddd; border-radius: 5px; cursor: pointer; transition: all 0.3s ease; }
        .duration-option input[type="radio"]:checked + label { background-color: #FFBA5A; color: white; border-color: #FFBA5A; }
        .modal { display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); overflow: auto; }
        .modal-content { background-color: white; margin: 5% auto; padding: 30px; width: 90%; max-width: 800px; border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.2); }
        .close { color: #aaa; float: right; font-size: 28px; font-weight: bold; cursor: pointer; }
        .close:hover { color: black; }
    </style>
  </head>
  <body>   
    <header class="not-home">@include('home.header')</header>
  
    <div class="container">
        
        <h2>Our Types of Massages</h2>
        <p>Discover our massage options and choose the ideal one for you:</p>
        
        <div class="massage-types">
            @foreach($massages as $type_massage)
            <div class="massage-card">
                <div class="massage-image">
                    <figure>
                        <img src="{{ asset('Type_massage/' . $type_massage->image) }}" alt="Imagem de {{$type_massage->massage_title}}">
                    </figure>
                </div>
                <div class="massage-content">
                    <h2>{{$type_massage->massage_title}}</h2>
                    <p>{{ $type_massage->description }}</p>
                    <div class="price">From {{ $type_massage->price }}€</div>
                    @if (Route::has('login'))
                        @auth
                            <button class="btn book-btn" 
                                    data-id="{{ $type_massage->id }}" 
                                    data-massage="{{ $type_massage->massage_title }}" 
                                    data-price-30="80" 
                                    data-price-60="120" 
                                    data-price-90="160">Scheduler</button>
                        @endauth
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <!-- Modal de reserva -->
        @if (Route::has('login'))
            @auth
                <div id="bookingModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2>Schedule a Massage</h2>
                        <h3 id="selectedMassage"></h3>
                        
                        <form id="bookingForm" method="POST">
                            @csrf
                            <input type="hidden" name="type_massage_id" id="massageIdInput">
                            <input type="hidden" name="price" id="priceInput">
                            
                            <div class="form-group">
                                <label>Session Duration:</label>
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
                            <button type="submit" class="btn book-btn">Confirm reservation</button>
                        </form>
                    </div>
                </div>
            @endauth
        @endif
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
            const modal = document.getElementById("bookingModal");
            const bookBtns = document.querySelectorAll(".book-btn");
            const closeBtn = document.querySelector(".close");
            const bookingForm = document.getElementById("bookingForm");
            const durationOptions = document.querySelectorAll('input[name="duration"]');
            const priceValue = document.getElementById("priceValue");
            const priceInput = document.getElementById("priceInput");

            let currentPrices = { '30min': 0, '60min': 0, '90min': 0 };

            bookBtns.forEach(btn => {
                btn.addEventListener("click", function() {
                    const massageId = this.getAttribute("data-id");
                    const massageName = this.getAttribute("data-massage");

                    if (!massageId) { console.error("ID da massagem não encontrado"); return; }

                    currentPrices = {
                        '30min': parseFloat(this.getAttribute("data-price-30")) || 0,
                        '60min': parseFloat(this.getAttribute("data-price-60")) || 0,
                        '90min': parseFloat(this.getAttribute("data-price-90")) || 0
                    };

                    document.getElementById("massageIdInput").value = massageId;
                    document.getElementById("selectedMassage").textContent = massageName;
                    
                    updatePrice();
                    modal.style.display = "block";
                });
            });

            durationOptions.forEach(option => {
                option.addEventListener("change", updatePrice);
            });

            function updatePrice() {
                const selectedDuration = document.querySelector('input[name="duration"]:checked');
                if (!selectedDuration) {
                    priceValue.textContent = "0.00";
                    priceInput.value = "";
                    return;
                }
                const duration = selectedDuration.value;
                if (currentPrices[duration] !== undefined) {
                    const finalPrice = currentPrices[duration];
                    priceValue.textContent = finalPrice.toFixed(2);
                    priceInput.value = finalPrice;
                } else {
                    priceValue.textContent = "0.00";
                    priceInput.value = "";
                }
            }

            closeBtn.addEventListener("click", () => { modal.style.display = "none"; });
            window.addEventListener("click", (event) => { if (event.target === modal) { modal.style.display = "none"; } });

            bookingForm.addEventListener("submit", async function(e) {
                e.preventDefault();
                const submitBtn = this.querySelector('button[type="submit"]');
                submitBtn.disabled = true;
                submitBtn.textContent = 'Sending...';

                const formData = new FormData(this);
                
                if (!formData.get('type_massage_id') || !formData.get('price')) {
                    alert('An error has occurred. Please close and reopen the form..');
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Confirm reservation';
                    return;
                }

                try {
                    const response = await fetch("{{ url('add_massage_booking') }}", {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    });
                    
                    const result = await response.json();

                    if (!response.ok) {
                        
                        throw new Error(result.message || `Erro HTTP: ${response.status}`);
                    }

                    if (result.success) {
                        alert(result.message);
                        modal.style.display = "none";
                        window.location.reload();
                    } else {
                        
                        alert(result.message || 'Error processing reservation.');
                    }
                } catch (error) {
                    console.error('Erro no fetch:', error);
                    
                    alert(error.message || 'We were unable to complete your reservation. The date/time is already taken..');
                } finally {
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Confirm reservation';
                }
            });
        });
    </script>
  </body>
</html>
