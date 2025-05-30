@extends('user.profile')

@section('title', 'Detalhes da Reserva')

@section('page-title', 'Reservation Details')
@section('page-subtitle', 'Complete information about your reservation')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Reservation Information #{{ $reserva->id }}</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6 class="text-muted">Status</h6>
                        <span class="badge bg-{{ $reserva->status == 'confirmada' ? 'success' : ($reserva->status == 'pendente' ? 'warning' : 'secondary') }} px-3 py-2">
                            {{ ucfirst($reserva->status ?? 'Pending') }}
                        </span>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted">Booking Date</h6>
                        <p>{{ \Carbon\Carbon::parse($reserva->created_at)->format('d/m/Y H:i') }}</p>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6 class="text-muted">Check-in</h6>
                        <p class="fw-bold">{{ \Carbon\Carbon::parse($reserva->start_date)->format('d/m/Y') }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted">Check-out</h6>
                        <p class="fw-bold">{{ \Carbon\Carbon::parse($reserva->end_date)->format('d/m/Y') }}</p>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6 class="text-muted">Adults</h6>
                        <p>{{ $reserva->number_adults ?? 1 }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted">Children</h6>
                        <p>{{ $reserva->number_children ?? 0 }}</p>
                    </div>
                </div>
                
                <hr>
                
                <h6 class="mb-3">Guest Information</h6>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6 class="text-muted">Name</h6>
                        <p>{{ $reserva->name }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted">E-mail</h6>
                        <p>{{ $reserva->email }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6 class="text-muted">Phone</h6>
                        <p>{{ $reserva->phone ?? 'Não informado' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        @isset($reserva->room)
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0"><i class="fas fa-bed me-2"></i>Room Information</h5>
            </div>
            <div class="card-body">
                @if(isset($reserva->room->images) && $reserva->room->images->isNotEmpty())
                    <div class="room-image-container">
                        <img src="/room/{{ $reserva->room->images->first()->image }}" 
                             alt="Quarto" class="img-fluid rounded mb-3">
                    </div>
                @else
                    <div class="room-image-placeholder w-100 mb-3" style="height: 150px;">
                        <i class="fas fa-bed"></i>
                    </div>
                @endif
                
                <h5>{{ isset($reserva->room->typeRoom) ? ($reserva->room->typeRoom->nome ?? 'Room') : 'Room' }}</h5>
                <p class="text-muted">{{ isset($reserva->room->typeRoom) ? ($reserva->room->typeRoom->descricao ?? '') : '' }}</p>
                
                <hr>
                
                <div class="d-flex justify-content-between mb-2">
                    <span>Capacity:</span>
                    <span>{{ isset($reserva->room->typeRoom) ? ($reserva->room->typeRoom->capacidade ?? '2') : '2' }} people</span>
                </div>
                
                @php
                    // Obter o preço do quarto - verificando várias possibilidades
                    $pricePerNight = 0;
                    
                    // Verificar se o preço está diretamente na reserva
                    if (isset($reserva->price) && $reserva->price > 0) {
                        $pricePerNight = $reserva->price;
                    }
                    // Verificar se o preço está no typeRoom
                    elseif (isset($reserva->room->typeRoom->preco) && $reserva->room->typeRoom->preco > 0) {
                        $pricePerNight = $reserva->room->typeRoom->preco;
                    }
                    // Verificar se o preço está no próprio room
                    elseif (isset($reserva->room->preco) && $reserva->room->preco > 0) {
                        $pricePerNight = $reserva->room->preco;
                    }
                    // Verificar se o preço está em price (outra possibilidade)
                    elseif (isset($reserva->room->price) && $reserva->room->price > 0) {
                        $pricePerNight = $reserva->room->price;
                    }
                    // Verificar se o preço está em typeRoom->price
                    elseif (isset($reserva->room->typeRoom->price) && $reserva->room->typeRoom->price > 0) {
                        $pricePerNight = $reserva->room->typeRoom->price;
                    }
                @endphp
                
                <div class="d-flex justify-content-between mb-2">
                    <span>Daily:</span>
                    <span class="fw-bold">{{ number_format($pricePerNight, 2, ',', '.') }}€</span>
                </div>
            </div>
        </div>
        @endisset
        
        <div class="card">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0"><i class="fas fa-receipt me-2"></i>Summary of Values</h5>
            </div>
            <div class="card-body">
                @php
                    // Cálculo do número de noites
                    $startDate = \Carbon\Carbon::parse($reserva->start_date);
                    $endDate = \Carbon\Carbon::parse($reserva->end_date);
                    $nights = $startDate->diffInDays($endDate);
                    
                    // Obter o preço do quarto - já definido acima
                    // Calcular o total
                    $totalValue = $nights * $pricePerNight;
                    
                    // Verificar se há berço (se aplicável)
                    $hasCrib = isset($reserva->baby_crib) && $reserva->baby_crib;
                    $cribFee = $hasCrib ? 12 : 0;
                    
                    // Adicionar taxa de berço se aplicável
                    $totalValue += $cribFee;
                @endphp
                
                <div class="d-flex justify-content-between mb-2">
                    <span>Daily:</span>
                    <span>{{ $nights }} {{ $nights > 1 ? 'nights' : 'nights' }}</span>
                </div>
                
                <div class="d-flex justify-content-between mb-2">
                    <span>Daily rate:</span>
                    <span>{{ number_format($pricePerNight, 2, ',', '.') }}€</span>
                </div>
                
                @if($hasCrib)
                <div class="d-flex justify-content-between mb-2">
                    <span>Cradle:</span>
                    <span> {{ number_format($cribFee, 2, ',', '.') }}€</span>
                </div>
                @endif
                
                <hr>
                
                <div class="d-flex justify-content-between mb-2">
                    <span class="fw-bold">Total:</span>
                    <span class="fw-bold fs-5 text-success"> {{ number_format($totalValue, 2, ',', '.') }}€</span>
                </div>
                
                @if(($reserva->status ?? 'Pending') == 'Pending')
                <div class="mt-4">
                    <a href="#" class="btn btn-danger w-100" onclick="return confirm('Tem certeza que deseja cancelar esta reserva?')">
                        <i class="fas fa-times me-2"></i>Cancel Reservation
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="mt-4">
    <a href="{{ route('user.minhasreservas') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to My Bookings
    </a>
</div>
@endsection

@section('styles')
<style>
    .room-image-placeholder {
        background: #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #64748b;
        font-size: 2rem;
        border-radius: 8px;
    }
    
    .room-image-container {
        width: 100%;
        height: 150px;
        overflow: hidden;
        border-radius: 8px;
        margin-bottom: 15px;
    }
    
    .room-image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
@endsection
