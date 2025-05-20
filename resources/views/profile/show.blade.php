<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Painel do Usuário</title>
    <style>
        :root {
            --primary-color: #4a6fdc;
            --secondary-color: #e9ecef;
            --accent-color: #3a56b0;
            --text-color: #333;
            --light-text: #666;
            --danger-color: #dc3545;
            --success-color: #28a745;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f8f9fa;
            color: var(--text-color);
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        header {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-left: 5%;
            width: 90%;
        }
        
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: var(--primary-color);
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        
        .user-name {
            font-weight: bold;
        }
        
        .logout-btn {
            color: var(--light-text);
            text-decoration: none;
            margin-left: 15px;
            font-size: 14px;
        }
        
        .main-content {
            display: flex;
            margin-top: 30px;
            gap: 20px;
        }
        
        .sidebar {
            width: 250px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 20px;
            flex-shrink: 0;
        }
        
        .sidebar-menu {
            list-style: none;
        }
        
        .sidebar-menu li {
            margin-bottom: 10px;
        }
        
        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            text-decoration: none;
            color: var(--text-color);
            border-radius: 5px;
            transition: background-color 0.2s;
        }
        
        .sidebar-menu a:hover, .sidebar-menu a.active {
            background-color: var(--secondary-color);
            color: var(--primary-color);
        }
        
        .sidebar-menu a.active {
            font-weight: bold;
            border-left: 3px solid var(--primary-color);
        }
        
        .content-area {
            flex: 1;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 25px;
        }
        
        .content-header {
            border-bottom: 1px solid var(--secondary-color);
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        
        .content-header h2 {
            font-size: 20px;
            color: var(--text-color);
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }
        
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.2s;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--accent-color);
        }
        
        .reservations-list {
            list-style: none;
        }
        
        .reservation-item {
            border: 1px solid var(--secondary-color);
            border-radius: 6px;
            padding: 15px;
            margin-bottom: 15px;
        }
        
        .reservation-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        
        .reservation-title {
            font-weight: bold;
            font-size: 18px;
        }
        
        .reservation-status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
        }
        
        .status-confirmed {
            background-color: rgba(40, 167, 69, 0.2);
            color: var(--success-color);
        }
        
        .status-pending {
            background-color: rgba(255, 193, 7, 0.2);
            color: #ffc107;
        }
        
        .status-cancelled {
            background-color: rgba(220, 53, 69, 0.2);
            color: var(--danger-color);
        }
        
        .reservation-details {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-bottom: 15px;
        }
        
        .detail-item {
            display: flex;
            flex-direction: column;
        }
        
        .detail-label {
            font-size: 14px;
            color: var(--light-text);
        }
        
        .detail-value {
            font-weight: 500;
        }
        
        .reservation-actions {
            display: flex;
            gap: 10px;
        }
        
        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
        }
        
        .btn-outline:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        .btn-danger {
            background-color: var(--danger-color);
            color: white;
        }
        
        .btn-danger:hover {
            background-color: #c82333;
        }
        
        .alert {
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        
        .alert-success {
            background-color: rgba(40, 167, 69, 0.2);
            border: 1px solid var(--success-color);
            color: var(--success-color);
        }
        
        .alert-danger {
            background-color: rgba(220, 53, 69, 0.2);
            border: 1px solid var(--danger-color);
            color: var(--danger-color);
        }
        
        @media (max-width: 768px) {
            .main-content {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
            }
            
            .reservation-details {
                grid-template-columns: 1fr;
            }
        }

        /* Estilos para o formulário do Fortify */
        .update-password-form .form-group {
            margin-bottom: 1.5rem;
        }
        
        .update-password-form .form-control {
            width: 100%;
        }
    </style>
    @livewireStyles
</head>
<body>
    <header>
        <div class="container header-content">
            <div class="logo">SalParadiseHotel</div>
            <div class="user-info">
                <div class="user-avatar">JP</div>
                <div class="user-name">João Paulo</div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class="logout-btn" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
                </form>
            </div>
        </div>
    </header>
    
    <div class="container main-content" style="max-width: 90%; margin-left: 5%;">
        <aside class="sidebar" style="margin-right: 20px;">
            <ul class="sidebar-menu">
                <li><a href="javascript:void(0);" class="active" data-tab="dashboard">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4M3 8a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 3 8m10.5.5a.5.5 0 0 0 0-1h-2a.5.5 0 0 0 0 1z"/>
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                    </svg>
                    Painel
                </a></li>
                <li><a href="javascript:void(0);" data-tab="reservations">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v1H1zm14 13a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V5h14z"/>
                        <path d="M6.445 12.688V7.354h-.633A13 13 0 0 0 4.5 8.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61z"/>
                    </svg>
                    Minhas Reservas
                </a></li>
                <li><a href="javascript:void(0);" data-tab="password">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1"/>
                    </svg>
                    Alterar Senha
                </a></li>
                <li><a href="javascript:void(0);" data-tab="profile">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                    </svg>
                    Perfil
                </a></li>
            </ul>
        </aside>
        
        <main class="content-area">
            <div class="tab-content active" id="dashboard">
                <div class="content-header">
                    <h2>Painel do Usuário</h2>
                </div>
                <div class="dashboard-content">
                    <h3>Bem-vindo, João Paulo!</h3>
                    <p>Aqui está o resumo da sua conta:</p>
                    
                    <div class="dashboard-stats" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-top: 20px;">
                        <div class="stat-card" style="background-color: #f8f9fa; border-radius: 8px; padding: 20px; text-align: center;">
                            <h4>Reservas Ativas</h4>
                            <p style="font-size: 24px; font-weight: bold; color: var(--primary-color);">3</p>
                        </div>
                        <div class="stat-card" style="background-color: #f8f9fa; border-radius: 8px; padding: 20px; text-align: center;">
                            <h4>Reservas Concluídas</h4>
                            <p style="font-size: 24px; font-weight: bold; color: var(--success-color);">12</p>
                        </div>
                        <div class="stat-card" style="background-color: #f8f9fa; border-radius: 8px; padding: 20px; text-align: center;">
                            <h4>Reservas Canceladas</h4>
                            <p style="font-size: 24px; font-weight: bold; color: var(--danger-color);">1</p>
                        </div>
                    </div>
                    
                    <h3 style="margin-top: 30px;">Reservas Recentes</h3>
                    <ul class="reservations-list">
                        <li class="reservation-item">
                            <div class="reservation-header">
                                <div class="reservation-title">Hotel Estrela do Mar</div>
                                <span class="reservation-status status-confirmed">Confirmada</span>
                            </div>
                            <div class="reservation-details">
                                <div class="detail-item">
                                    <span class="detail-label">Data de Entrada</span>
                                    <span class="detail-value">22/05/2025</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Data de Saída</span>
                                    <span class="detail-value">25/05/2025</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Nº de Hóspedes</span>
                                    <span class="detail-value">2 adultos</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Valor Total</span>
                                    <span class="detail-value">R$ 980,00</span>
                                </div>
                            </div>
                            <div class="reservation-actions">
                                <button class="btn btn-outline">Ver Detalhes</button>
                            </div>
                        </li>
                    </ul>
                    
                    <a href="javascript:void(0);" data-tab="reservations" style="display: block; text-align: center; margin-top: 20px; color: var(--primary-color); text-decoration: none;">Ver todas as reservas</a>
                </div>
            </div>
            
            <div class="tab-content" id="reservations">
                <div class="content-header">
                    <h2>Minhas Reservas</h2>
                </div>
                
                <ul class="reservations-list">
                    <li class="reservation-item">
                        <div class="reservation-header">
                            <div class="reservation-title">Hotel Estrela do Mar</div>
                            <span class="reservation-status status-confirmed">Confirmada</span>
                        </div>
                        <div class="reservation-details">
                            <div class="detail-item">
                                <span class="detail-label">Data de Entrada</span>
                                <span class="detail-value">22/05/2025</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Data de Saída</span>
                                <span class="detail-value">25/05/2025</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Nº de Hóspedes</span>
                                <span class="detail-value">2 adultos</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Quarto</span>
                                <span class="detail-value">Suíte Master</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Valor Total</span>
                                <span class="detail-value">R$ 980,00</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Código da Reserva</span>
                                <span class="detail-value">#RS76532</span>
                            </div>
                        </div>
                        <div class="reservation-actions">
                            <button class="btn btn-outline">Ver Detalhes</button>
                            <button class="btn btn-outline">Modificar</button>
                            <button class="btn btn-danger">Cancelar</button>
                        </div>
                    </li>
                </ul>
            </div>
            
            <div class="tab-content" id="password">
                <div class="content-header">
                    <h2>Alterar Senha</h2>
                </div>
                
                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    <div class="update-password-form">
                        @livewire('profile.update-password-form')
                    </div>
                @endif
            </div>
            
            <div class="tab-content" id="profile">
                <div class="content-header">
                    <h2>Meu Perfil</h2>
                </div>
                
                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                    <div class="update-profile-information-form">
                        @livewire('profile.update-profile-information-form')
                    </div>
                @endif
            </div>
        </main>
    </div>
    
    <script>
        // Navegação entre as abas
        document.addEventListener('DOMContentLoaded', function() {
            // Função para alternar abas
            function switchTab(tabId) {
                // Remove active class de todas as abas do menu
                document.querySelectorAll('.sidebar-menu a').forEach(tab => {
                    tab.classList.remove('active');
                });
                
                // Adiciona active class à aba clicada
                document.querySelector(`.sidebar-menu a[data-tab="${tabId}"]`).classList.add('active');
                
                // Esconde todos os conteúdos de abas
                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.remove('active');
                });
                
                // Mostra o conteúdo da aba correspondente
                document.getElementById(tabId).classList.add('active');
            }
            
            // Adiciona event listeners para os itens do menu
            document.querySelectorAll('.sidebar-menu a').forEach(tab => {
                tab.addEventListener('click', function(e) {
                    e.preventDefault();
                    const tabId = this.getAttribute('data-tab');
                    switchTab(tabId);
                });
            });
            
            // Event listener para o link "Ver todas as reservas"
            document.querySelector('a[data-tab="reservations"]').addEventListener('click', function(e) {
                e.preventDefault();
                switchTab('reservations');
            });
        });
    </script>
    @livewireScripts
</body>
</html>