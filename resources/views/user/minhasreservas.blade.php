<section class="section">
    <div class="container">
        <div class="header-section fade-in">
            <h1><i class="fas fa-calendar-check"></i> Minhas Reservas</h1>
            <p>Gerencie e acompanhe todas as suas reservas</p>
        </div>
        
        <div class="reservas-container fade-in">
            @if($reservas->isEmpty())
                <div class="empty-state">
                    <i class="fas fa-calendar-times"></i>
                    <h3>Nenhuma reserva encontrada</h3>
                    <p>Você ainda não fez nenhuma reserva. Que tal fazer sua primeira reserva?</p>
                </div>
            @else
                <div class="reservas-list">
                    @foreach($reservas as $reserva)
                    <div class="reserva-card">
                        <div class="reserva-id">#{{ $reserva->id }}</div>
                        
                        <div class="room-info">
                            @isset($reserva->room)
                                @if($reserva->room->images->isNotEmpty())
                                    <img src="{{ asset('room/'.$reserva->room->images->first()->image) }}" 
                                         alt="Quarto" class="room-image">
                                @else
                                    <div class="room-image-placeholder">
                                        <i class="fas fa-bed"></i>
                                    </div>
                                @endif
                                <div class="room-name">{{ $reserva->room->typeRoom->nome ?? 'N/A' }}</div>
                            @else
                                <div class="room-image-placeholder">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <div class="room-name">Quarto removido</div>
                            @endisset
                        </div>
                        
                        <div class="date-info">
                            <div>
                                <div class="date-label">Check-in</div>
                                <div class="date-value">{{ \Carbon\Carbon::parse($reserva->start_date)->format('d/m/Y') }}</div>
                            </div>
                            <div>
                                <div class="date-label">Check-out</div>
                                <div class="date-value">{{ \Carbon\Carbon::parse($reserva->end_date)->format('d/m/Y') }}</div>
                            </div>
                        </div>
                        
                        <div class="status-badge status-{{ $reserva->status }}">
                            {{ ucfirst($reserva->status) }}
                        </div>
                        
                        <div class="price-info">R$ {{ number_format($reserva->price, 2, ',', '.') }}</div>
                        
                        <div class="actions">
                            <a href="{{ route('user.reservadetalhes', $reserva->id) }}" 
                               class="action-btn btn-view" title="Ver detalhes">
                                <i class="fas fa-eye"></i>
                            </a>
                            @if($reserva->status == 'pendente')
                                <a href="#" 
                                   class="action-btn btn-cancel" title="Cancelar reserva"
                                   onclick="return confirm('Tem certeza que deseja cancelar esta reserva?')">
                                    <i class="fas fa-times"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="pagination">
                    {{ $reservas->links() }}
                </div>
            @endif
        </div>
    </div>
</section>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    .section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        padding: 20px;
    }
    
    .container {
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .header-section {
        text-align: center;
        margin-bottom: 40px;
        color: white;
    }
    
    .header-section h1 {
        font-size: 2.5rem;
        font-weight: 300;
        margin-bottom: 10px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }
    
    .header-section p {
        font-size: 1.1rem;
        opacity: 0.9;
    }
    
    .reservas-container {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        overflow: hidden;
        backdrop-filter: blur(10px);
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
    
    .reserva-card {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        padding: 25px;
        border-bottom: 1px solid #f1f5f9;
        transition: all 0.3s ease;
        position: relative;
    }
    
    .reserva-card:hover {
        background: #f8fafc;
        transform: translateX(5px);
    }
    
    .reserva-card:last-child {
        border-bottom: none;
    }
    
    .reserva-id {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 8px 15px;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.9rem;
        margin-right: 20px;
        min-width: 100px;
        text-align: center;
    }
    
    .room-info {
        display: flex;
        align-items: center;
        flex: 1;
        min-width: 200px;
        margin: 10px 0;
    }
    
    .room-image {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        object-fit: cover;
        margin-right: 15px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .room-image-placeholder {
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
    
    .room-name {
        font-weight: 600;
        color: #1e293b;
        font-size: 1.1rem;
    }
    
    .date-info {
        display: flex;
        flex-direction: column;
        align-items: center;
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
    
    .status-badge {
        padding: 8px 16px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: capitalize;
        margin: 10px;
    }
    
    .status-aprovado {
        background: #dcfce7;
        color: #166534;
    }
    
    .status-pendente {
        background: #fef3c7;
        color: #d97706;
    }
    
    .status-cancelado {
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
    
    .pagination {
        padding: 30px;
        text-align: center;
        background: #f8fafc;
    }
    
    .pagination .pagination {
        display: flex;
        justify-content: center;
        gap: 5px;
    }
    
    .pagination a,
    .pagination span {
        display: inline-block;
        padding: 10px 15px;
        background: white;
        color: #667eea;
        text-decoration: none;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
    }
    
    .pagination a:hover {
        background: #667eea;
        color: white;
        transform: translateY(-2px);
    }
    
    .pagination .active span {
        background: #667eea;
        color: white;
    }
    
    @media (max-width: 768px) {
        .reserva-card {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }
        
        .room-info, .date-info, .price-info {
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
        
        .header-section h1 {
            font-size: 2rem;
        }
    }
    
    .fade-in {
        animation: fadeIn 0.6s ease-out;
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<script>
    // Animação de entrada suave
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