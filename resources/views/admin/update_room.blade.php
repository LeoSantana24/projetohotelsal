<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include('admin.css')

    <style>
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
            max-width: 1200px;
            margin: 0 auto;
        }

        .form-wrapper {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding-top: 20px;
        }

        .form-container {
            background-color: #2a2a2a;
            border-radius: 12px;
            padding: 30px;
            width: 100%;
            max-width: 700px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            border: 1px solid #3a3a3a;
        }

        .form-container h1 {
            color: #ffffff;
            font-size: 2rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #3a3a3a;
        }

        .alert {
            background-color: #28a745;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            border: none;
            position: relative;
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

        label {
            color: #ffffff;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        select,
        textarea {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            background-color: #3a3a3a;
            border: 1px solid #4a4a4a;
            border-radius: 6px;
            color: #ffffff;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #007bff;
            background-color: #404040;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }

        input::placeholder, textarea::placeholder {
            color: #888;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        select {
            cursor: pointer;
        }

        select option {
            background-color: #3a3a3a;
            color: #ffffff;
        }

        .feature-section {
            margin: 25px 0;
            padding: 20px;
            background-color: #333333;
            border-radius: 8px;
            border: 1px solid #4a4a4a;
        }

        .feature-section label strong {
            color: #ffffff;
            font-size: 16px;
            display: block;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 12px;
        }

        .form-check {
            display: flex;
            align-items: center;
            padding: 8px 12px;
            background-color: #404040;
            border-radius: 6px;
            transition: all 0.2s ease;
            cursor: pointer;
            border: 1px solid #4a4a4a;
        }

        .form-check:hover {
            background-color: #4a4a4a;
            border-color: #007bff;
        }

        .form-check-input {
            width: 16px;
            height: 16px;
            margin-right: 10px;
            margin-bottom: 0;
            accent-color: #007bff;
            cursor: pointer;
            flex-shrink: 0;
        }

        .form-check-label {
            color: #e0e0e0;
            font-size: 13px;
            font-weight: 400;
            cursor: pointer;
            margin-bottom: 0;
            flex: 1;
        }

        .btn-primary {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 12px 30px;
            width: 100%;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-primary:hover {
            background-color: #dc3545;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        /* Input file personalizado */
        input[type="file"] {
            background-color: #404040;
            border: 2px dashed #4a4a4a;
            border-radius: 6px;
            padding: 15px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        input[type="file"]:hover {
            border-color: #007bff;
            background-color: #4a4a4a;
        }

        /* Imagem atual */
        .current-image {
            display: block;
            margin: 10px 0 20px 0;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            border: 2px solid #4a4a4a;
        }

        .image-section {
            margin: 20px 0;
            padding: 15px;
            background-color: #333333;
            border-radius: 8px;
            border: 1px solid #4a4a4a;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
                margin: 10px;
            }

            .form-container h1 {
                font-size: 1.5rem;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }

            .page-content {
                padding: 10px;
            }

            .current-image {
                width: 100%;
                max-width: 300px;
            }
        }

        /* Estilo para números */
        input[type="number"] {
            -moz-appearance: textfield;
        }

        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
  </head>

  <body>
    @include('admin.header')
    @include('admin.sidebar')

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

                <label for="type_room_id">Tipo de Quarto</label>
                <select name="type_room_id" id="type_room_id" required>
                    <option value="">Selecione o tipo de quarto</option>
                    @foreach ($typeRooms as $typeRoom)
                        <option value="{{ $typeRoom->id }}" 
                            @if($data->type_room_id == $typeRoom->id) selected @endif>
                            {{ $typeRoom->nome }}
                        </option>
                    @endforeach
                </select>
                
                <label for="description">Descrição</label>
                <textarea id="description" name="description" placeholder="Descreva as características do quarto...">{{$data->description}}</textarea>

                <label for="price">Preço (€)</label>
                <input type="number" id="price" name="price" value="{{$data->price}}" step="0.01" min="0">

                <div class="image-section">
                    <label>Imagem Atual</label>
                    @if($data->images->isNotEmpty())
                        <img class="current-image" width="200" src="{{ asset('room/' . $data->images->first()->image) }}" alt="Imagem atual do quarto">
                    @else
                        <p style="color: #888; font-style: italic;">Nenhuma imagem disponível</p>
                    @endif
                </div>

                <div class="feature-section">
                    <label><strong>Características</strong></label>
                    <input type="hidden" name="features" value="">
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

                <label for="image">Upload Nova Imagem</label>
                <input type="file" name="images[]" multiple accept="image/*">

                <div style="padding-top:20px;">
                    <input class="btn-primary" type="submit" value="Atualizar Quarto">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    @include('admin.footer')
  </body>
</html>