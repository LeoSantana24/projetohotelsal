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

      img{
        width: 200px;
        height: 60px;
      }

  </style>
</head>
<body>

  @include('admin.header')
  @include('admin.sidebar', ['activePage' => 'massagens'])





  <div class="page-content">
      <div class="page-header">
         <div class="container-fluid">
           @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show w-50 mx-auto mt-4" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

          <table class="table_deg">
              <tr>
                  <th class="th_deg">Título Massagem</th>
                  <th class="th_deg">Descrição</th>
                  <th class="th_deg">Preço</th>
                  <th class="th_deg">Imagem</th>
                  <th class="th_deg">Remover</th>
                  <th class="th_deg">Atualizar</th>
              </tr>

              @foreach($massages as $massage)
              <tr>
                  <td>{{ $massage->massage_title }}</td>
                  <td>{!! Str::limit($massage->description, 150) !!}</td>
                  <td>{{ $massage->price }}€</td>
                  <td>
                    @if($massage->image)
                      <img src="{{ asset('Type_massage/' . $massage->image) }}" alt="Massage Image">
                    @else
                      <span>Sem imagem</span>
                    @endif
                  </td>
                  <td>
                      <a onclick="return confirm('Tem a certeza que quer remover?')" class="btn btn-danger" href="{{ url('massage_delete', $massage->id) }}">Remover</a>
                  </td>

                  <td>
                      <a class="btn btn-warning" href="{{ url('update_massage', $massage->id) }}">Atualizar</a>
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
