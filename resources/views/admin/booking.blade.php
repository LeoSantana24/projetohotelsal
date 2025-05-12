<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">

        .table_deg{
                    border:2px solid white;
                    margin:auto;
                    width: 80%;
                    text-align:center;
                    margin-top:40px;

                }

                .th_deg{

                    background-color:skyblue;
                    padding: 8px;

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

    @include('admin.sidebar', ['activePage' => 'reservas'])
    
      <!-- Sidebar Navigation end-->
  
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

                <table class="table_deg">
                        <tr>
                            <th class="th_deg">id_Quarto</th>
                            <th class="th_deg">Nome do cliente</th>
                            <th class="th_deg">Email</th>
                            <th class="th_deg">Telefone</th>
                            <th class="th_deg">Data de chegada</th>
                            <th class="th_deg">Data de saída</th>
                            <th class="th_deg">Estado</th>
                            <th class="th_deg">Titulo Quarto</th>
                            <th class="th_deg">Preço</th>
                            <th class="th_deg">Imagem</th>
                            <th class="th_deg">Remover</th>
                            <th class="th_deg">Status Update</th>
                        </tr>

                       @foreach($data as $data)
                        <tr>
                            <td>{{$data->room_id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->phone}}</td>
                            <td>{{$data->start_date}}</td>
                            <td>{{$data->end_date}}</td>
                            <td>
                                @if($data->status == 'aprovado')

                                <span style="color: skyblue;">Aprovado</span>

                                @endif

                                @if($data->status == 'rejeitado')

                                <span style="color: red;">Rejeitado</span>

                                @endif

                                @if($data->status == 'waiting')

                                <span style="color: yellow;">pendente</span>

                                @endif


                            </td>
                            <td>{{$data->room->room_title}}</td>
                            <td>{{$data->room->price}}</td>
                            <td>
                               @if($data->room->images->isNotEmpty())
                                  <img src="/room/{{ $data->room->images->first()->image }}" alt="Room Image">
                              @else
                                  <img src="/images/sm.png" alt="No Image Available">
                              @endif

                            </td>
                            <td>
                                <a onclick="return confirm('Tem a certeza que quer remover isso?')"class="btn btn-danger" href="{{url('delete_booking',$data->id)}}<">Remover</a>
                            </td>

                            <td>
                                <span style="padding-bottom: 10px;"><a class="btn btn-success"href="{{url('approve_book', $data->id)}}">Aprovar</a></span>

                                <a class="btn btn-warning" href="{{url('reject_book', $data->id)}}">Rejeitar</a>

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