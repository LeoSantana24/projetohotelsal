<!DOCTYPE html>
<html>
<head> 
    @include('admin.css')

    <style type="text/css">
        .table_deg {
            border: 2px solid white;
            margin: auto;
            width: 80%;
            text-align: center;
            margin-top: 40px;
        }

        .th_deg {
            background-color: skyblue;
            padding: 8px;
        }

        tr {
            border: 3px solid white;
        }

        td {
            padding: 10px;  
            vertical-align: middle;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .action-buttons .btn {
            width: 100px;
        }

        .image-container {
            width: 120px;
            height: 80px;
            overflow: hidden;
            margin: auto;
        }

        .image-container img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar', ['activePage' => 'reservasmassagem'])

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="text-center">Reservas de Massagens</h2>

                <table class="table_deg">
                    <tr>
                        <th class="th_deg">ID</th>
                        <th class="th_deg">Nome</th>
                        <th class="th_deg">Email</th>
                        <th class="th_deg">Telefone</th>
                        <th class="th_deg">Tipo de Massagem</th>
                        <th class="th_deg">Data</th>
                        <th class="th_deg">Hora</th>
                        <th class="th_deg">Duração</th>
                        <th class="th_deg">Imagem</th>
                        <th class="th_deg">Estado</th>
                        <th class="th_deg">Remover</th>
                        <th class="th_deg">Status Update</th>
                    </tr>

                    @foreach($massagesBookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->name }}</td>
                            <td>{{ $booking->email }}</td>
                            <td>{{ $booking->phone }}</td>
                            <td>{{ $booking->typeMassage->massage_title ?? 'N/A' }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->date)->format('d/m/Y') }}</td>
                            <td>{{ $booking->hour }}</td>
                            <td>{{ $booking->duration }}</td>
                            <td>
                                <div class="image-container">
                                    @if ($booking->typeMassage && $booking->typeMassage->image)
                                        <img src="{{ asset('Type_massage/' . $booking->typeMassage->image) }}" alt="Imagem de {{ $booking->typeMassage->massage_title }}">
                                    @else
                                        <img src="{{ asset('images/sm.png') }}" alt="Imagem Padrão">
                                    @endif
                                </div>
                            </td>
                            <td>
                                @if($booking->status == 'aprovado')
                                    <span style="color: skyblue;">Aprovado</span>
                                @elseif($booking->status == 'rejeitado')
                                    <span style="color: red;">Rejeitado</span>
                                @elseif($booking->status == 'waiting')
                                    <span style="color: yellow;">Pendente</span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-danger" onclick="return confirm('Tem certeza que deseja remover essa reserva?')" href="{{ url('admin/deleteMassageBooking/'.$booking->id) }}">Remover</a>
                            </td>
                            <td class="action-buttons">
                                <a class="btn btn-success" href="{{ url('approve_bookMassage', $booking->id) }}">Aprovar</a>
                                <a class="btn btn-warning" href="{{ url('reject_bookMassage', $booking->id) }}">Rejeitar</a>
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
