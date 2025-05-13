<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">

    <style>
    body {
      background-color: #2c2c2c;
      font-family: 'Inter', sans-serif;
      margin: 0;
      padding: 0;
    }

    .form-wrapper {
      display: flex;
      justify-content: center;
      padding: 60px 20px;
    }

    .form-container {
      background-color: #3a3a3a;
      padding: 40px;
      border-radius: 10px;
      width: 100%;
      max-width: 600px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
      color: black;
    }

    .form-container h1 {
      text-align: center;
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 25px;
    }

    label {
      display: block;
      margin-bottom: 6px;
      font-size: 14px;
    }

    input[type="text"],
    input[type="number"],
    input[type="file"],
    select,
    textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 18px;
      border-radius: 6px;
      border: none;
      background-color: #fff;
      color: #000;
      font-size: 14px;
    }

    textarea {
      resize: vertical;
    }

    .btn-primary {
      background-color: #6c6c6c;
      color: #fff;
      padding: 12px;
      border: none;
      border-radius: 6px;
      font-weight: bold;
      width: 100%;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .btn-primary:hover {
      background-color: #5a5a5a;
    }

    .checkbox-group {
      margin-top: 20px;
    }

    .checkbox-group label {
      font-size: 14px;
      display: flex;
      align-items: center;
      margin-bottom: 8px;
      color: #ccc;
    }

    .checkbox-group input[type="checkbox"] {
      margin-right: 10px;
    }

    .image-preview {
      max-width: 100px;
      border-radius: 6px;
      margin-bottom: 18px;
    }
  </style>
  </head>

  <body>
    @include('admin.header')
    @include('admin.sidebar')
    @include('admin.css')

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <div class="form-wrapper">
            <div class="form-container">
               @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show w-100 mx-auto mt-4" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
              <h1>Atualizar Quarto</h1>

              <form action="{{url('edit_room',$data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <label for="title">Título Quarto</label>
                <input type="text" id="title" name="title" value="{{$data->room_title}}">

                <label for="description">Descrição</label>
                <textarea id="description" name="description">{{$data->description}}</textarea>

                <label for="price">Preço</label>
                <input type="number" id="price" name="price" value="{{$data->price}}">

                <label for="type">Tipo Quarto</label>
                <select id="type" name="type">
                  <option selected value="{{$data->room_type}}">{{$data->room_type}}</option>
                  <option value="regular">Regular</option>
                  <option value="premium">Premium</option>
                  <option value="deluxe">Deluxe</option>
                </select>
                

                
                <label>Imagem atual</label>
                <img width="200"  src="{{ asset('room/' . $data->images->first()->image) }}" alt="Imagem atual do quarto">
                <div class="feature-section">
              <label><strong>Caracteristicas</strong></label>
              <input type="hidden" name="features" value=""> <!-- 👈 ADICIONE ISSO AQUI -->
              <div class="feature-grid">
                  @foreach($features as $feature)
                      <div class="form-check">
                          <input type="checkbox" name="features[]" value="{{ $feature->id }}"
                              class="form-check-input"
                              @if(isset($data) && $data->features->contains($feature->id)) checked @endif>
                          <label class="form-check-label">{{ $feature->name }}</label>
                      </div>
                  @endforeach
                  </div>
                </div>

                <label for="image">Upload Imagem</label>
                <input type="file" name="images[]" multiple>

                <input class="btn-primary" type="submit" value="Atualizar Quarto">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    @include('admin.footer')
  </body>
</html>
