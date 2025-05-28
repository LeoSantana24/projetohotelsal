<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Painel do Usuário')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --sidebar-width: 280px;
            --sidebar-bg: linear-gradient(180deg, #1e293b 0%, #334155 100%);
            --sidebar-color: #f8fafc;
            --sidebar-active-bg: linear-gradient(135deg, #3b82f6, #1d4ed8);
            --primary-color: #3b82f6;
            --secondary-color: #64748b;
            --bg-color: #f1f5f9;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--bg-color);
            color: #1e293b;
            line-height: 1.6;
        }
        
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: var(--sidebar-width);
            background: var(--sidebar-bg);
            color: var(--sidebar-color);
            padding: 0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
        }
        
        .sidebar-header {
            padding: 30px 25px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.05);
        }
        
        .user-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 15px;
            transition: transform 0.3s ease;
            background: #64748b;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
        }
        
        .user-avatar:hover {
            transform: scale(1.05);
        }
        
        .sidebar-header h3 {
            color: white;
            font-size: 1.1rem;
            font-weight: 600;
            margin: 0;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .user-role {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.7);
            margin-top: 5px;
        }
        
        .sidebar-menu {
            list-style: none;
            padding: 20px 0;
            margin: 0;
        }
        
        .sidebar-menu li {
            margin: 5px 15px;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .sidebar-menu li a {
            color: var(--sidebar-color);
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 15px 20px;
            transition: all 0.3s ease;
            border-radius: 12px;
        }
        
        .sidebar-menu li a i {
            margin-right: 15px;
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }
        
        .sidebar-menu li a span {
            font-weight: 500;
            font-size: 0.95rem;
        }
        
        .sidebar-menu li.active {
            background: var(--sidebar-active-bg);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }
        
        .sidebar-menu li.active a {
            color: white;
            font-weight: 600;
        }
        
        .sidebar-menu li:hover:not(.active) {
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
        }
        
        .sidebar-menu li:hover:not(.active) a {
            color: white;
        }
        
        .sidebar-footer {
            position: absolute;
            bottom: 20px;
            left: 15px;
            right: 15px;
            padding: 15px 20px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-footer .logout-btn {
            color: #ef4444;
            text-decoration: none;
            display: flex;
            align-items: center;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .sidebar-footer .logout-btn:hover {
            color: #dc2626;
            transform: translateX(5px);
        }
        
        .sidebar-footer .logout-btn i {
            margin-right: 10px;
        }
        
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            background: var(--bg-color);
        }
        
        .content-wrapper {
            padding: 30px;
            max-width: 1400px;
            margin: 0 auto;
        }
        
        .page-header {
            margin-bottom: 30px;
            padding: 25px 0;
        }
        
        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 10px;
        }
        
        .page-subtitle {
            font-size: 1.1rem;
            color: var(--secondary-color);
        }
        
        .content-area {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            min-height: 500px;
        }
        
        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            :root {
                --sidebar-width: 70px;
            }
            
            .sidebar {
                width: var(--sidebar-width);
            }
            
            .sidebar-header {
                padding: 20px 10px;
            }
            
            .user-avatar {
                width: 50px;
                height: 50px;
                font-size: 1.5rem;
            }
            
            .sidebar-header h3,
            .user-role,
            .sidebar-menu li a span {
                display: none;
            }
            
            .sidebar-menu li {
                margin: 5px 10px;
            }
            
            .sidebar-menu li a {
                justify-content: center;
                padding: 15px 10px;
            }
            
            .sidebar-menu li a i {
                margin-right: 0;
                font-size: 1.3rem;
            }
            
            .sidebar-footer {
                left: 10px;
                right: 10px;
                padding: 15px 10px;
            }
            
            .sidebar-footer .logout-btn span {
                display: none;
            }
            
            .sidebar-footer .logout-btn {
                justify-content: center;
            }
            
            .sidebar-footer .logout-btn i {
                margin-right: 0;
            }
            
            .content-wrapper {
                padding: 20px 15px;
            }
            
            .page-title {
                font-size: 2rem;
            }
        }
        
        /* Toggle Button for Mobile */
        .sidebar-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 12px;
            font-size: 1.2rem;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }
        
        @media (max-width: 576px) {
            .sidebar-toggle {
                display: block;
            }
            
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .content-wrapper {
                padding-top: 80px;
            }
        }
        
        /* Animations */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .content-area {
            animation: slideIn 0.5s ease-out;
        }
    </style>
</head>

<body>
    <!-- Toggle Button for Mobile -->
    <button class="sidebar-toggle" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Menu Lateral -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="user-avatar">
                <i class="fas fa-user"></i>
            </div>
            <h3>{{ Auth::user()->name }}</h3>
            <div class="user-role">Cliente</div>
        </div>
        
        <ul class="sidebar-menu">
            <li class="{{ Request::is('user/perfil') || Request::is('perfil') ? 'active' : '' }}">
                <a href="{{ url('perfil') }}">
                    <i class="fas fa-user"></i>
                    <span>Perfil</span>
                </a>
            </li>
            <li class="{{ Request::is('user/reservas') || Request::is('minhasreservas') ? 'active' : '' }}">
                <a href="{{ url('minhasreservas') }}">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Minhas Reservas</span>
                </a>
            </li>
            <li class="{{ Request::is('user/historico') ? 'active' : '' }}">
                <a href="{{ url('historico') }}">
                    <i class="fas fa-history"></i>
                    <span>Histórico</span>
                </a>
            </li>
            <li class="{{ Request::is('user/configuracoes') ? 'active' : '' }}">
                <a href="{{ url('configuracoes') }}">
                    <i class="fas fa-cog"></i>
                    <span>Configurações</span>
                </a>
            </li>
        </ul>
        
        <div class="sidebar-footer">
            <a href="{{ route('logout') }}" class="logout-btn" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                <span>Sair</span>
            </a>