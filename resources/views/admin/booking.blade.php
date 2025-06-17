<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

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
            max-width: 1400px;
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
            padding: 15px 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 12px;
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
            padding: 15px 10px;
            color: #e0e0e0;
            font-size: 13px;
            line-height: 1.4;
            vertical-align: middle;
        }
        
        td:first-child {
            font-weight: 600;
            color: #ffffff;
        }

        /* Estilo dos botões de ação */
        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 8px;
            align-items: center;
        }

        .btn {
            padding: 8px 16px;
            font-size: 11px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-decoration: none;
            display: inline-block;
            border: none;
            width: 90px;
            text-align: center;
        }

        /* Botão Aprovar - mantendo verde */
        .btn-success {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
        }
        
        .btn-success:hover {
            background: linear-gradient(135deg, #1e7e34, #17a085);
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(40, 167, 69, 0.3);
            color: white;
            text-decoration: none;
        }

        /* Botão Rejeitar - mantendo amarelo/laranja */
        .btn-warning {
            background: linear-gradient(135deg, #ffc107, #fd7e14);
            color: #212529;
        }
        
        .btn-warning:hover {
            background: linear-gradient(135deg, #e0a800, #e55100);
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(255, 193, 7, 0.3);
            color: #212529;
            text-decoration: none;
        }

        /* Botão Remover - estilo vermelho moderno */
        .btn-danger {
            background: linear-gradient(135deg, #dc3545, #c82333);
            color: white;
        }
        
        .btn-danger:hover {
            background: linear-gradient(135deg, #bd2130, #a71e2a);
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
            color: white;
            text-decoration: none;
        }

        /* Container de imagem */
        .image-container {
            width: 80px;
            height: 60px;
            overflow: hidden;
            margin: auto;
            border-radius: 8px;
            border: 2px solid #3a3a3a;
            transition: all 0.3s ease;
        }

        .image-container:hover {
            transform: scale(1.1);
            border-color: #555;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .image-container:hover img {
            transform: scale(1.1);
        }

        /* Imagem sem container */
        td img {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid #3a3a3a;
            transition: all 0.3s ease;
        }

        td img:hover {
            transform: scale(1.1);
            border-color: #555;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        /* Status badges */
        .status-approved {
            color: #20c997 !important;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 11px;
            background: rgba(32, 201, 151, 0.1);
            padding: 4px 8px;
            border-radius: 4px;
            border: 1px solid rgba(32, 201, 151, 0.3);
        }

        .status-rejected {
            color: #dc3545 !important;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 11px;
            background: rgba(220, 53, 69, 0.1);
            padding: 4px 8px;
            border-radius: 4px;
            border: 1px solid rgba(220, 53, 69, 0.3);
        }

        .status-pending {
            color: #ffc107 !important;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 11px;
            background: rgba(255, 193, 7, 0.1);
            padding: 4px 8px;
            border-radius: 4px;
            border: 1px solid rgba(255, 193, 7, 0.3);
        }

        /* Preço destacado */
        .price {
            font-weight: 600;
            color: #20c997;
            font-size: 14px;
        }

        /* Datas destacadas */
        .date {
            font-weight: 500;
            color: #b0b0b0;
        }

        /* Tipo de quarto */
        .room-type {
            font-weight: 500;
            color: #ffffff;
            background: rgba(255, 255, 255, 0.1);
            padding: 3px 6px;
            border-radius: 4px;
            font-size: 11px;
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
        @media (max-width: 1200px) {
            .table-wrapper {
                margin: 20px;
                padding: 20px;
                overflow-x: auto;
            }
            
            .table_deg {
                min-width: 1100px;
            }
            
            .th_deg, td {
                padding: 10px 8px;
                font-size: 11px;
            }
            
            .btn {
                padding: 6px 12px;
                font-size: 10px;
                width: 80px;
            }
            
            td img {
                width: 60px;
                height: 45px;
            }
        }
        
        @media (max-width: 768px) {
            .table-wrapper {
                margin: 10px;
                padding: 15px;
            }
            
            .table_deg {
                min-width: 900px;
            }
            
            .table-title {
                font-size: 24px;
            }
            
            .th_deg, td {
                padding: 8px 6px;
                font-size: 10px;
            }
            
            .btn {
                padding: 5px 10px;
                font-size: 9px;
                width: 70px;
            }
            
            td img {
                width: 50px;
                height: 35px;
            }
        }
        
        /* Indicador de scroll para mobile */
        @media (max-width: 1200px) {
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
  </head>
  <body>
       
    @include('admin.header')

    @include('admin.sidebar', ['activePage' => 'reservasquarto'])
    
      <!-- Sidebar Navigation end-->
  
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div class="table-wrapper">
                <h1 class="table-title">Reservas de Quartos</h1>
                
                <table class="table_deg">
                    <thead>
                        <tr>
                            <th class="th_deg">Cliente</th>
                            <th class="th_deg">Email</th>
                            <th class="th_deg">Telefone</th>
                            <th class="th_deg">Check-in</th>
                            <th class="th_deg">Check-out</th>
                            <th class="th_deg">Estado</th>
                            <th class="th_deg">Tipo</th>
                            <th class="th_deg">Preço</th>
                            <th class="th_deg">Imagem</th>
                            <th class="th_deg">Remover</th>
                            <th class="th_deg">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $data)
                        <tr>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->phone}}</td>
                            <td class="date">{{$data->start_date}}</td>
                            <td class="date">{{$data->end_date}}</td>
                            <td>
                                @if($data->status == 'aprovado')
                                    <span class="status-approved">Aprovado</span>
                                @endif

                                @if($data->status == 'rejeitado')
                                    <span class="status-rejected">Rejeitado</span>
                                @endif

                                @if($data->status == 'waiting')
                                    <span class="status-pending">Pendente</span>
                                @endif
                            </td>
                            <td>
                                <span class="room-type">{{ $data->room->typeRoom->nome ?? 'Sem tipo definido' }}</span>
                            </td>
                            <td class="price">{{$data->room->price}}€</td>
                            <td>
                               @if($data->room->images->isNotEmpty())
                                  <img src="/room/{{ $data->room->images->first()->image }}" alt="Room Image">
                              @else
                                  <img src="/images/sm.png" alt="No Image Available">
                              @endif
                            </td>
                            <td>
                                <a onclick="return confirm('Tem a certeza que quer remover isso?')" class="btn btn-danger" href="{{url('delete_booking',$data->id)}}">Remover</a>
                            </td>

                            <td class="action-buttons">
                                <a class="btn btn-success" href="{{url('approve_book', $data->id)}}">Aprovar</a>
                                <a class="btn btn-warning" href="{{url('reject_book', $data->id)}}">Rejeitar</a>
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