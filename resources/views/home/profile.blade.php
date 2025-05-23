@extends('layouts.app')

@section('content')
    <main class="user-dashboard">
        <div class="dashboard-header">
            <h1 class="dashboard-title">Painel do Usuário</h1>
            <p class="dashboard-subtitle">Gerencie suas reservas e informações pessoais</p>
        </div>

        <div class="dashboard-content">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Minhas Reservas</h2>
                </div>
                <div class="card-body">
                    <ul class="reservations-list">
                        @forelse ($data as $data)
                            <li class="reservation-item">
                                <div class="reservation-header">
                                    <div class="reservation-title">SalParadiseHotel</div>
                                    <span class="reservation-status 
                                        @if($data->status == 'confirmada') status-confirmed
                                        @elseif($data->status == 'pendente') status-pending
                                        @elseif($data->status == 'cancelada') status-cancelled
                                        @endif">
                                        {{ ucfirst($data->status) }}
                                    </span>
                                </div>
                                <div class="reservation-details">
                                    <div class="detail-item">
                                        <span class="detail-label">Data de Entrada</span>
                                        <span class="detail-value">{{ \Carbon\Carbon::parse($data->start_date)->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <span class="detail-label">Data de Saída</span>
                                        <span class="detail-value">{{ \Carbon\Carbon::parse($data->end_date)->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <span class="detail-label">Nº de Hóspedes</span>
                                        <span class="detail-value">{{ $data->number_adults }} hóspedes</span>
                                    </div>
                                    <div class="detail-item">
                                        <span class="detail-label">Valor Total</span>
                                        <span class="detail-value">R$ {{ number_format($data->valor_total, 2, ',', '.') }}</span>
                                    </div>
                                </div>
                                <div class="reservation-actions">
                                    <a href="{{ route('reservas.show', $data->id) }}" class="btn btn-outline">Ver Detalhes</a>
                                </div>
                            </li>
                        @empty
                            <li class="reservation-item">
                                <p>Você ainda não possui reservas.</p>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection
