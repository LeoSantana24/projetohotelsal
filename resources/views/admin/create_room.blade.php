<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
            font-family: 'Inter', sans-serif;
        }
        .form-container {
            max-width: 600px;
            margin: auto;
            background:rgb(61, 63, 66);
            padding: 30px;
            border-radius: 8px;
            border: 1px solid #333;
        }
        .form-container h1 {
            color: #ffffff;
            font-weight: 500;
            margin-bottom: 30px;
            border: 1px solidrgb(167, 167, 167);
            text-align: center;
        }
        label {
            color: #b0b0b0;
            font-size: 14px;
            margin-bottom: 8px;
            display: block;
        }
        input, textarea, select {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            background: #2d2d2d;
            border: 1px solid #3a3a3a;
            border-radius: 6px;
            color: #ffffff;
        }
        .btn-primary {
            background:rgb(104, 102, 102);
            color: white;
            border: none;
            padding: 14px;
            width: 100%;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s;
        }
        .btn-primary:hover {
            background:rgb(214, 18, 18);
        }
    </style>
  </head>
  <body>
    
    @include('admin.header')
    @include('admin.sidebar', ['activePage' => 'quartos'])


    
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <div class="div_center">
                    <div class="form-container">
                        <h1>Adicionar Quartos</h1>
                        <form action="{{url('add_room')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label>Título Quarto</label>
                            <input type="text" name="title" required>
                            
                            <label>Descrição</label>
                            <textarea name="description" required></textarea>
                            
                            <label>Preço</label>
                            <input type="number" name="price" required>
                            
                            <label>Tipo Quarto</label>
                            <select name="type" required>
                                <option value="regular">Regular</option>
                                <option value="premium">Premium</option>
                                <option value="deluxe">Deluxe</option>
                            </select>
                            
                            
                            
                            <label>Upload Imagem</label>
                            <input type="file" name="images[]" multiple>

                            
                            <div style="padding-top:20px;">
                                <input class="btn btn-primary" type="submit" value="Adicionar Quarto">
                            </div>

                            
                            <div class="feature-section">
                                <label><strong>Caracteristicas</strong></label>
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


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @include('admin.footer')
  </body>
</html>
