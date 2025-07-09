<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
        body, html {
            background-color: #2D3035;
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .page-content {
            background-color:#2D3035;
            min-height: 100vh;
            padding: 20px;
        }

        .form-container {
            background-color: #444444;
            border-radius: 8px;
            padding: 20px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            margin: 20px auto;
        }

        .form-container h1 {
            color: #ffffff;
            font-size: 1.5rem;
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            color: #ffffff;
            font-size: 13px;
            margin-bottom: 5px;
            display: block;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            background-color: #555555;
            border: 1px solid #666666;
            border-radius: 4px;
            color: #ffffff;
            font-size: 13px;
        }

        .btn-primary {
            background-color: #666666;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 4px;
            cursor: pointer;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
        }

        .form-check {
            display: flex;
            align-items: center;
            padding: 5px;
        }

        .form-check-input {
            margin-right: 5px;
        }
    </style>
  </head>
  <body>
    
    @include('admin.header')
    @include('admin.sidebar', ['activePage' => 'quartos'])

    <div class="page-content">
        <div class="form-container">
            @if (session('success'))
                <div style="background:#28a745;color:white;padding:10px;border-radius:4px;margin-bottom:15px;">
                    {{ session('success') }}
                </div>
            @endif
             
            <h1>Adicionar Quartos</h1>
            <form action="{{url('add_room')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="type_room_id">Tipo de Quarto</label>
                <select name="type_room_id" id="type_room_id" required>
                    <option value="">Selecione o tipo de quarto</option>
                    @foreach ($typeRooms as $typeRoom)
                        <option value="{{ $typeRoom->id }}">{{ $typeRoom->nome }}</option>
                    @endforeach
                </select>
                
                <label>Descrição</label>
                <textarea name="description" placeholder="Descreva o quarto..." required rows="4"></textarea>
                
                <label>Preço (€)</label>
                <input type="number" name="price" placeholder="0.00" step="0.01" min="0" required>
                
                <label>Imagem</label>
                <input type="file" name="images[]" multiple accept="image/*">
                
                <div style="margin:15px 0;">
                    <label style="font-weight:bold;">Características</label>
                    <div class="feature-grid">
                        @foreach($features as $feature)
                            <div class="form-check">
                                <input type="checkbox" name="features[]" value="{{ $feature->id }}" class="form-check-input">
                                <label>{{ $feature->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <input class="btn-primary" type="submit" value="Adicionar Quarto">
            </form>
        </div>
    </div>
    
    @include('admin.footer')
  </body>
</html>