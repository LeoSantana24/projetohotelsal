<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
        body {
            background-color: #1a1a1a;
            color: #e0e0e0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .page-content {
            background-color: #1a1a1a;
            min-height: 100vh;
            padding: 20px;
        }

        .container-fluid {
            max-width: 1400px;
            margin: 0 auto;
        }

        .alert {
            background-color: #28a745;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            border: none;
            position: relative;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        .alert .close {
            position: absolute;
            top: 8px;
            right: 15px;
            color: white;
            background: none;
            border: none;
            font-size: 18px;
            cursor: pointer;
            opacity: 0.8;
        }

        .alert .close:hover {
            opacity: 1;
        }

        .table_deg {
            width: 100%;
            max-width: 1200px;
            margin: 20px auto;
            background-color: #2a2a2a;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            border: 1px solid #3a3a3a;
        }

        .table_deg th {
            background-color: #3a3a3a;
            color: #ffffff;
            padding: 15px 12px;
            text-align: center;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 12px;
            border-bottom: 2px solid #4a4a4a;
        }

        .table_deg td {
            padding: 15px 12px;
            text-align: center;
            border-bottom: 1px solid #3a3a3a;
            color: #e0e0e0;
            font-size: 13px;
            vertical-align: middle;
        }

        .table_deg tr:hover {
            background-color: #333333;
            transition: background-color 0.2s ease;
        }

        .table_deg tr:last-child td {
            border-bottom: none;
        }

        .table_deg img {
            border-radius: 6px;
            object-fit: cover;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            margin: 2px;
        }

        .btn-danger {
            background-color: #6c757d;
            color: white;
        }

        .btn-danger:hover {
            background-color: #dc3545;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
        }

        .btn-warning {
            background-color: #6c757d;
            color: white;
        }

        .btn-warning:hover {
            background-color: #ffc107;
            color: #000;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(255, 193, 7, 0.3);
        }

        /* Responsividade */
        @media (max-width: 1200px) {
            .table_deg {
                font-size: 11px;
            }
            
            .table_deg th,
            .table_deg td {
                padding: 10px 8px;
            }
            
            .table_deg img {
                width: 150px !important;
                height: 50px !important;
            }
        }

        @media (max-width: 768px) {
            .page-content {
                padding: 10px;
            }
            
            .table_deg {
                font-size: 10px;
                margin: 10px auto;
            }
            
            .table_deg th,
            .table_deg td {
                padding: 8px 4px;
            }
            
            .table_deg img {
                width: 100px !important;
                height: 40px !important;
            }
            
            .btn {
                padding: 6px 12px;
                font-size: 10px;
                margin: 1px;
            }
        }

        /* Estilo para texto truncado */
        .description-cell {
            max-width: 200px;
            word-wrap: break-word;
            text-align: left;
            padding-left: 15px !important;
        }

        .price-cell {
            font-weight: 600;
            color: #28a745;
        }

        .no-image {
            color: #888;
            font-style: italic;
        }
    </style>
  </head>
  <body>
       
    @include('admin.header')

    @include('admin.sidebar', ['activePage' => 'quartos'])
    
    <div class="page-content">
        <div class="page-header">
           <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show w-100 mx-auto mt-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <table class="table_deg">
                <tr>
                    <th>Tipo Quarto</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Imagem</th>
                    <th>Remover</th>
                    <th>Atualizar</th>
                </tr>

                @foreach($data as $data)
                <tr>
                    <td>{{ optional($data->typeRoom)->nome ?? 'Sem tipo definido' }}</td>
                    <td class="description-cell">{!! Str::limit($data->description,150) !!}</td>
                    <td class="price-cell">{{$data->price}}€</td>
                    <td>
                      @if($data->images->isNotEmpty())
                      <img src="{{ asset('room/' . $data->images->first()->image) }}" alt="Room image" style="width: 200px; height: 60px;">
                      @else
                        <span class="no-image">Sem imagem</span>
                      @endif
                    </td>
                    <td>
                        <a onclick="return confirm('Tem a certeza que quer remover?')" class="btn btn-danger" href="{{url('room_delete',$data->id)}}">Remover</a>
                    </td>
                    <td>
                        <a class="btn btn-warning" href="{{url('room_update',$data->id)}}">Atualizar</a>
                    </td>
                </tr>
                @endforeach
            </table>
           </div>
        </div>
    </div>
    
    @include('admin.footer')
  </body>
</html>