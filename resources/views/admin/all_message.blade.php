<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <style type="text/css">
        body {
            background-color: #121212;
            color: #e0e0e0;
            font-family: 'Inter', sans-serif;
        }
        
        .page-content {
            padding: 40px 20px;
            min-height: calc(100vh - 200px);
        }
        
        .table-wrapper {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            border: 1px solid #3a3a3a;
            animation: slideUp 0.6s ease-out;
        }
        
        .table-title {
            color: #ffffff;
            font-weight: 600;
            font-size: 28px;
            margin-bottom: 30px;
            text-align: center;
            padding-bottom: 15px;
            border-bottom: 2px solid #3a3a3a;
            background: linear-gradient(135deg, #ffffff, #b0b0b0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .table_deg {
            width: 100%;
            border-collapse: collapse;
            background: #2d2d2d;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .th_deg {
            background: linear-gradient(135deg, #4a4a4a, #6a6a6a);
            color: #ffffff;
            padding: 20px 15px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 14px;
            border-bottom: 2px solid #3a3a3a;
            position: relative;
        }
        
        .th_deg::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, #d62222, #ff4444);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .th_deg:hover::after {
            opacity: 1;
        }

        tr {
            border-bottom: 1px solid #3a3a3a;
            transition: all 0.3s ease;
        }
        
        tr:hover {
            background: #333333;
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }
        
        tr:last-child {
            border-bottom: none;
        }

        td {
            padding: 18px 15px;
            color: #e0e0e0;
            font-size: 14px;
            line-height: 1.5;
            vertical-align: middle;
        }
        
        td:first-child {
            font-weight: 500;
            color: #ffffff;
        }
        
        /* Estilo específico para a coluna de mensagem */
        td:nth-child(4) {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            position: relative;
        }
        
        td:nth-child(4):hover {
            white-space: normal;
            overflow: visible;
            background: #2a2a2a;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            z-index: 10;
            position: relative;
        }

        /* Botão de enviar email */
        .btn-email {
            background: linear-gradient(135deg, #4a4a4a, #6a6a6a);
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 13px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-decoration: none;
            display: inline-block;
            position: relative;
            overflow: hidden;
        }
        
        .btn-email::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .btn-email:hover {
            background: linear-gradient(135deg, #d62222, #ff4444);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(214, 34, 34, 0.4);
            color: white;
            text-decoration: none;
        }
        
        .btn-email:hover::before {
            left: 100%;
        }
        
        /* Animação de entrada */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Responsividade */
        @media (max-width: 1024px) {
            .table-wrapper {
                margin: 20px;
                padding: 20px;
            }
            
            .table_deg {
                font-size: 13px;
            }
            
            .th_deg, td {
                padding: 12px 10px;
            }
            
            td:nth-child(4) {
                max-width: 150px;
            }
        }
        
        @media (max-width: 768px) {
            .table-wrapper {
                margin: 10px;
                padding: 15px;
                overflow-x: auto;
            }
            
            .table_deg {
                min-width: 700px;
            }
            
            .table-title {
                font-size: 24px;
            }
            
            .th_deg, td {
                padding: 10px 8px;
                font-size: 12px;
            }
            
            .btn-email {
                padding: 8px 12px;
                font-size: 11px;
            }
        }
        
        /* Indicador de scroll para mobile */
        @media (max-width: 768px) {
            .table-wrapper::after {
                content: '← Deslize para ver mais →';
                position: absolute;
                bottom: 10px;
                left: 50%;
                transform: translateX(-50%);
                font-size: 12px;
                color: #666;
                font-style: italic;
            }
        }
    </style>
  <body>
       
    @include('admin.header')

    @include('admin.sidebar', ['activePage' => 'home'])
    
      <!-- Sidebar Navigation end-->
   <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div class="table-wrapper">
                <h1 class="table-title">Mensagens Recebidas</h1>
                
                <table class="table_deg">
                    <thead>
                        <tr>
                            <th class="th_deg">Nome</th>
                            <th class="th_deg">Email</th>
                            <th class="th_deg">Telefone</th>
                            <th class="th_deg">Mensagem</th>
                            <th class="th_deg">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $data)
                        <tr>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->phone}}</td>
                            <td title="{{$data->message}}">{{$data->message}}</td>
                            <td>
                                <a class="btn-email" href="{{url('send_email',$data->id)}}">Enviar Email</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>
     </div> 
    @include('admin.footer')
  </body>
</html>