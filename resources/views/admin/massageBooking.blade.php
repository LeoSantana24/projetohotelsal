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
                        <th class="th_deg">Remover</th>
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
                            <td>{{ $booking->duration }} min</td>
                            <td>
                                <a onclick="return confirm('Tem certeza que deseja remover essa reserva?')" 
                                   class="btn btn-danger" 
                                   href="{{ url('admin/delete-massage-booking/'.$booking->id) }}">
                                   Remover
                                </a>
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
