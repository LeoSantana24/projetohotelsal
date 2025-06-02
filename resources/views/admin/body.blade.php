
<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
        </div>
    </div>
    <section class="no-padding-top no-padding-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <div class="icon"><i class="icon-user-1"></i></div><strong>Novos Clientes</strong>
                            </div>
                            <div class="number dashtext-1">{{ $novosClientes }}</div>
                        </div>
                        <div class="progress progress-template">
                            <div role="progressbar" style="width: {{ min($percentualClientes, 100) }}%" aria-valuenow="{{ $percentualClientes }}" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <div class="icon"><i class="icon-contract"></i></div><strong>Novas reservas de quarto</strong>
                            </div>
                            <div class="number dashtext-2">{{ $reservasQuarto }}</div>
                        </div>
                        <div class="progress progress-template">
                            <div role="progressbar" style="width: {{ min($percentualReservasQuarto, 100) }}%" aria-valuenow="{{ $percentualReservasQuarto }}" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>Novas reservas de massagens</strong>
                            </div>
                            <div class="number dashtext-3">{{ $reservasMassagem }}</div>
                        </div>
                        <div class="progress progress-template">
                            <div role="progressbar" style="width: {{ min($percentualReservasMassagem, 100) }}%" aria-valuenow="{{ $percentualReservasMassagem }}" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <div style="padding:30px; 20px;" class="col-lg-6">                                           
        <div class="messages-block block">
            <div class="title"><strong>Novas mensagens</strong></div>
            <div class="messages">
                @forelse($mensagens as $mensagem)
                    <a href="{{ route('admin.mensagens.show', $mensagem->id) }}" class="message d-flex align-items-center">
                        <div class="profile">
                            <div class="status {{ $mensagem->status == 'lida' ? 'away' : 'online' }}"></div>
                        </div>
                        <div class="content">
                            <strong class="d-block">{{ $mensagem->name }}</strong>
                            <span class="d-block">{{ \Illuminate\Support\Str::limit($mensagem->message, 50) }}</span>
                            <small class="date d-block">{{ $mensagem->created_at->format('H:i') }}</small>
                        </div>
                    </a>
                @empty
                    <div class="message d-flex align-items-center">
                        <div class="content text-center w-100">
                            <span class="d-block">Nenhuma mensagem recente</span>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

