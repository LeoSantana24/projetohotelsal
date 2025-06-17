@extends('user.profile')

@section('title', 'Minhas Reservas de Massagem')

@section('page-title', 'My Massage Bookings')
@section('page-subtitle', 'View and manage your massage bookings')

@section('content')
<style>
    /* Cards para reservas de massagem */
    .reserva-card {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 15px;
        transition: all 0.3s ease;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        position: relative;
    }
    
    .reserva-card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }
    
    .reserva-id {
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        color: white;
        padding: 8px 15px;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.9rem;
        margin-right: 20px;
        min-width: 100px;
        text-align: center;
    }
    
    .massage-info {
        display: flex;
        align-items: center;
        flex: 1;
        min-width: 200px;
        margin: 10px 0;
    }
    
    .massage-icon-container {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        background: #dbeafe;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        color: #1d4ed8;
        font-size: 1.5rem;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .massage-icon-placeholder {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        background: #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        color: #64748b;
        font-size: 1.5rem;
    }
    
    .massage-name {
        font-weight: 600;
        color: #1e293b;
        font-size: 1.1rem;
        margin-bottom: 5px;
    }
    
    .massage-duration {
        font-size: 0.9rem;
    }
    
    .date-info {
        display: flex;
        gap: 20px;
        margin: 10px 20px;
        min-width: 160px;
    }
    
    .date-label {
        font-size: 0.8rem;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 5px;
    }
    
    .date-value {
        font-weight: 600;
        color: #1e293b;
        font-size: 1rem;
    }
    
    .reserva-status {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
        text-transform: capitalize;
        margin: 10px;
    }
    
    .status-aprovado, .status-confirmada, .status-ativa {
        background: #dcfce7;
        color: #166534;
    }
    
    .status-pendente {
        background: #fef3c7;
        color: #d97706;
    }
    
    .status-cancelado, .status-cancelada {
        background: #f3f4f6;
        color: #6b7280;
    }
    
    .status-rejeitado {
        background: #fecaca;
        color: #dc2626;
    }
    
    .price-info {
        font-size: 1.3rem;
        font-weight: 700;
        color: #059669;
        margin: 10px 20px;
        min-width: 120px;
        text-align: center;
    }
    
    .actions {
        display: flex;
        gap: 10px;
        margin: 10px 0;
    }
    
    .action-btn {
        width: 40px;
        height: 40px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        text-decoration: none;
    }
    
    .btn-view {
        background: #dbeafe;
        color: #1d4ed8;
    }
    
    .btn-view:hover {
        background: #1d4ed8;
        color: white;
        transform: translateY(-2px);
    }
    
    .btn-cancel {
        background: #fecaca;
        color: #dc2626;
    }
    
    .btn-cancel:hover {
        background: #dc2626;
        color: white;
        transform: translateY(-2px);
    }
    
    .empty-state {
        text-align: center;
        padding: 80px 40px;
        color: #64748b;
    }
    
    .empty-state i {
        font-size: 4rem;
        margin-bottom: 20px;
        color: #cbd5e1;
    }
    
    .empty-state h3 {
        font-size: 1.5rem;
        margin-bottom: 10px;
        color: #475569;
    }
    
    @media (max-width: 768px) {
        .reserva-card {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }
        
        .massage-info, .date-info, .price-info {
            width: 100%;
            margin: 5px 0;
        }
        
        .date-info {
            flex-direction: row;
            justify-content: space-between;
            align-items: flex-start;
        }
        
        .actions {
            width: 100%;
            justify-content: center;
        }
    }
</style>
<h3><i class="fas fa-spa me-2"></i>My Massage Bookings</h3>
<hr class="my-4">

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(isset($reservasMassagem) && $reservasMassagem->isEmpty())
    <div class="empty-state">
        <i class="fas fa-spa"></i>
        <h3>No massage bookings found</h3>
        
    </div>
@elseif(isset($reservasMassagem))
    <div class="reservas-list fade-in">
        @foreach($reservasMassagem as $reserva)
        <div class="reserva-card">
            
            
            <div class="massage-info">
                @isset($reserva->typeMassage)
                    <div class="massage-icon-container">
                        <i class="fas fa-spa"></i>
                    </div>
                    <div>
                        <div class="massage-name">
                        @if($reserva->typeMassage)
                            {{ $reserva->typeMassage->massage_title }}
                        @else
                            Tipo não definido
                        @endif

                        </div>
                        <div class="massage-duration">
                            <span class="badge bg-info">{{ $reserva->duration }} </span>
                        </div>
                    </div>
                @else
                    <div class="massage-icon-placeholder">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="massage-name">Massage removed</div>
                @endisset
            </div>
            
            <div class="date-info">
                <div>
                    <div class="date-label">Date</div>
                    <div class="date-value">{{ \Carbon\Carbon::parse($reserva->date)->format('d/m/Y') }}</div>
                </div>
                <div>
                    <div class="date-label">Hour</div>
                    <div class="date-value">{{ $reserva->hour }}</div>
                </div>
            </div>
            
            <div class="reserva-status status-{{ $reserva->status ?? 'pendente' }}">
                {{ ucfirst($reserva->status ?? 'pendente') }}
            </div>
            
            <div class="price-info">
                @isset($reserva->typeMassage)
                     {{ number_format($reserva->typeMassage->price ?? 0, 2, ',', '.') }}€
                @else
                    0,00 €
                @endisset
            </div>
            
            <div class="actions">
                @if(($reserva->status ?? 'waiting') == 'waiting')
                    <a href="{{ route('user.cancelarmassagem', $reserva->id) }}" 
                       class="action-btn btn-cancel" title="Cancelar reserva"
                       onclick="return confirm('Are you sure you want to cancel this massage reservation?')">
                        <i class="fas fa-times"></i>
                    </a>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    
    <div class="pagination">
        {{ $reservasMassagem->links() }}
    </div>
@else
    <div class="empty-state">
        <i class="fas fa-spinner fa-spin"></i>
        <h3>Loading reservations...</h3>
        <p>Please wait while we retrieve your massage reservations..</p>
    </div>
@endif
@endsection

@section('styles')

@endsection

@section('scripts')
<script>
    // Animação de entrada suave para cards de reserva
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.reserva-card');
        cards.forEach((card, index) => {
            setTimeout(() => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'all 0.6s ease';
                
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 100);
            }, index * 150);
        });
    });
</script>
@endsection
