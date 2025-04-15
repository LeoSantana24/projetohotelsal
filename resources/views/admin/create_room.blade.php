<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>

        .feature-section {
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 10px;
            margin-top: 10px;
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        body {
            font-family: Arial, sans-serif;
        }
        h1
        {
            font-weight: bold;
        }

        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .form-container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h1 {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px !important;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            border: none;
            color: white;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
  </head>
  <body>
    
    @include('admin.header')
    @include('admin.sidebar')
    
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
