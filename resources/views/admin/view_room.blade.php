<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
        .table_deg{
            border:2px solid white;
            margin:auto;
            width: 50%;
            text-align:center;
            margin-top:40px;

        }

        .th_deg{

            background-color:skyblue;
            padding: 15px;

        }
        tr{
            border: 3px solid white;
        }
        td{
          padding: 10px;  
        }

    </style>
  </head>
  <body>
       
    @include('admin.header')

    @include('admin.sidebar')
    
      <!-- Sidebar Navigation end-->

    <div class="page-content">
        <div class="page-header">
           <div class="container-fluid">

            <table class="table_deg">
                <tr>
                    <th class="th_deg">Titulo Quarto</th>
                    <th class="th_deg">Descrição</th>
                    <th class="th_deg">Preço</th>
                    <th class="th_deg">Wifi</th>
                    <th class="th_deg">Tipo Quarto</th>
                    <th class="th_deg">Imagem</th>
                    <th class="th_deg">Remover</th>
                    <th class="th_deg">Atualizar</th>
                </tr>

                @foreach($data as $data)
                <tr>
                    <td>{{$data->room_title}}</td>
                    <td>{!! Str::limit($data->description,150) !!}</td>
                    <td>{{$data->price}}€</td>
                    <td>{{$data->wifi}}</td>
                    <td>{{$data->room_type}}</td>
                    <td>
                        <img width="60" src="room/{{$data->image}}">

                    </td>
                    <td>
                        <a onclick="return confirm('Tem a certeza que quer remover?')"class="btn btn-danger" href="{{url('room_delete',$data->id)}}">Remover</a>
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