<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Checkout</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        body {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #ffffff; /* fundo branco */
    font-size: 0.8rem;
}

.card {
    max-width: 1000px;
    margin: 2vh;
    box-shadow: 0 0 38px rgba(0, 0, 0, 0.1); /* sombra leve */
    border-radius: 10px; /* cantos arredondados */
}

        .card-top {
            padding: 0.7rem 5rem;
        }
        .card-top a {
            float: left;
            margin-top: 0.7rem;
        }
        #logo {
            font-family: 'Dancing Script';
            font-weight: bold;
            font-size: 1.6rem;
        }
        .card-body {
            padding: 0 5rem 5rem 5rem;
            background-image: url("https://i.imgur.com/4bg1e6u.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }
        @media(max-width:768px) {
            .card-body {
                padding: 0 1rem 1rem 1rem;
            }
            .card-top {
                padding: 0.7rem 1rem;
            }
        }
        .left {
            background-color: #ffffff;
            padding: 2vh;
        }
        .right {
            background-color: #ffffff;
            padding: 2vh;
        }
        input {
            width: 100%;
            padding: 1vh;
            margin-bottom: 4vh;
            border: 1px solid rgba(0, 0, 0, 0.137);
            background-color: rgb(247, 247, 247);
        }
       .btn {
    background-color: #4da6ff; /* azul claro */
    color: white;
    width: 100%;
    font-size: 0.9rem;
    margin: 4vh 0 1.5vh 0;
    padding: 1.5vh;
    border: none;
    transition: background-color 0.3s ease;
    font-size:18px;
    
}

.btn:hover {
    background-color: #fcb045; /* laranja no hover */
    color: white;
}

        #cvv {
            background-image: linear-gradient(to left, rgba(255,255,255,0.6), rgba(255,255,255,0.6)), url("https://img.icons8.com/material-outlined/24/000000/help.png");
            background-repeat: no-repeat;
            background-position-x: 95%;
            background-position-y: center;
        }
        .header {
    font-size: 1.4rem;
    font-weight: bold;
    margin-bottom: 1rem;
}

.right .item small {
    font-size: 1rem;
}

.right .text-right b,
.right .row .col {
    font-size: 1rem;
}

    </style>
</head>
<body>
    <div class="card">
        <div class="card-top border-bottom text-center">
            <a href="{{ url('/') }}">← Back</a>
            <span id="logo">Payment</span>
        </div>

        <div class="card-body">
            <div class="row">
                <!-- LEFT: FORMULÁRIO DE PAGAMENTO -->
                <div class="col-md-7">
                    <div class="left border">
                        <div class="row mb-3">
                            <span class="header">Payment</span>
                            <div class="ml-auto">
                                <img src="https://img.icons8.com/color/48/000000/visa.png"/>
                                <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png"/>
                                <img src="https://img.icons8.com/color/48/000000/maestro.png"/>
                            </div>
                        </div>
                       @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


                        <form action="{{ url('finishcheckout') }}" method="post" onsubmit="return validateCardForm();">
                            @csrf
                            <span>Card name:</span>
                            <input type="text" name="card_name" placeholder="Ex: Maria Silva" required>

                            <span>Card number:</span>
                            <input type="text" name="card_number" placeholder="0123456789012345" required pattern="\d{16}" title="O número do cartão deve conter 16 dígitos">

                            <div class="row">
                                <div class="col-6">
                                    <span>Validity date (MM/YY):</span>
                                    <input type="text" name="card_expiry" placeholder="12/26" required pattern="(0[1-9]|1[0-2])\/\d{2}" title="Formato: MM/YY">
                                </div>
                                <div class="col-6">
                                    <span>CVV:</span>
                                    <input type="password" name="card_cvv" id="cvv" placeholder="123" required pattern="\d{3}" title="O CVV deve ter 3 dígitos">
                                </div>
                            </div>

 <div class="form-group mb-4">
    <div class="custom-control custom-checkbox d-flex align-items-center">
        <input type="checkbox" class="custom-control-input" id="save_card" name="save_card">
        <label class="custom-control-label" for="save_card">Save card</label>
    </div>
</div>



                            <input type="submit" name="action" value="Finalize payment" class="btn btn-primary py-2 px-4 text-white">
                        </form>
                    </div>
                </div>

                <!-- RIGHT: RESUMO DO PEDIDO -->
                <div class="col-md-5">
                    <div class="right border">
                        <div class="header">Booking summary</div>

                        @php
                            $grandTotal = 0;
                        @endphp

                        @foreach($cart ?? [] as $item)
                            @php
                                $start = \Carbon\Carbon::parse($item['start_date']);
                                $end = \Carbon\Carbon::parse($item['end_date']);
                                $nights = $start->diffInDays($end);
                                 $room = isset($item['room_id']) ? \App\Models\Room::with('typeRoom')->find($item['room_id']) : null;
                                $pricePerNight = $room ? floatval($room->price) : 100;
                                $cribFee = (!empty($item['baby_crib'])) ? 12 : 0;
                                $total = ($nights * $pricePerNight) + $cribFee;
                                $grandTotal += $total;
                            @endphp

                            <div class="row item mb-2">
                                <div class="col-8">
                                    <small>{{ $nights }} noite(s)</small><br>
                                    <small>Check-in: {{ $item['start_date'] }}</small><br>
                                    <small>Check-out: {{ $item['end_date'] }}</small><br>
                                    @if(!empty($item['baby_crib']))
                                        <small>Crib: +12,00 €</small>
                                    @endif
                                </div>
                                <div class="col-4 text-right">
                                    <b>{{ number_format($total, 2, ',', '.') }} €</b>
                                </div>
                            </div>
                        @endforeach

                        <hr>
                        <div class="row">
                            <div class="col">Subtotal</div>
                            <div class="col text-right">{{ number_format($grandTotal, 2, ',', '.') }} €</div>
                        </div>
                        <div class="row font-weight-bold">
                            <div class="col">Total to pay</div>
                            <div class="col text-right">{{ number_format($grandTotal, 2, ',', '.') }} €</div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPT DE VALIDAÇÃO -->
    <script>
        function validateCardForm() {
            const cardNumber = document.querySelector('input[name="card_number"]').value.replace(/\s+/g, '');
            const expiry = document.querySelector('input[name="card_expiry"]').value;
            const cvv = document.querySelector('input[name="card_cvv"]').value;

            if (!/^\d{16}$/.test(cardNumber)) {
                alert("Número do cartão inválido (precisa ter 16 dígitos).");
                return false;
            }

            if (!/^(0[1-9]|1[0-2])\/\d{2}$/.test(expiry)) {
                alert("Data de validade inválida (use o formato MM/YY).");
                return false;
            }

            if (!/^\d{3}$/.test(cvv)) {
                alert("CVV inválido (precisa ter 3 dígitos).");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
