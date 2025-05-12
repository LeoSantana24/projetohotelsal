<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">

    <!-- Bootstrap CSS (caso ainda não esteja incluído) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
            font-family: 'Inter', sans-serif;
        }
        .form-container {
            max-width: 600px;
            margin: auto;
            background: rgb(61, 63, 66);
            padding: 30px;
            border-radius: 8px;
            border: 1px solid #333;
        }
        .form-container h1 {
            color: #ffffff;
            font-weight: 500;
            margin-bottom: 30px;
            border: 1px solid rgb(167, 167, 167); /* corrigido aqui */
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
            background: rgb(104, 102, 102);
            color: white;
            border: none;
            padding: 14px;
            width: 100%;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s;
        }
        .btn-primary:hover {
            background: rgb(214, 18, 18);
        }
    </style>
  </head>
  <body>
    @include('admin.css')
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <div class="div_center">
                    <div class="form-container">

                       
                         @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show w-100 mx-auto mt-4" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <h1>Atualizar Massagem</h1>

                        <form action="{{ url('update_massage/' . $massage->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST') {{-- ou PUT se estiver com rota de recurso --}}

                            <div class="form-group">
                                <label for="massage_title">Título Massagem</label>
                                <input type="text" id="massage_title" name="massage_title" value="{{ $massage->massage_title }}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Descrição</label>
                                <textarea id="description" name="description" required>{{ $massage->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="price">Preço (€)</label>
                                <input type="number" id="price" name="price" value="{{ $massage->price }}" required>
                            </div>

                            <div class="form-group">
                                <label>Imagem Atual</label><br>
                                @if($massage->image)
                                    <img src="{{ asset('Type_massage/' . $massage->image) }}" alt="Imagem atual da massagem" style="max-width:400px; height: 200px; margin-bottom: 10px; border-radius: 4px;">
                                @else
                                    <p>Sem imagem disponível</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Nova Imagem da Massagem</label>
                                <div class="file-input-container">
                                    <label class="file-input-label">
                                        <span class="file-input-text" id="file-name">Selecione uma imagem</span>
                                        <span class="file-input-icon">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                        </span>
                                        <input type="file" name="image" onchange="updateFileName(this)">
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-plus-circle"></i> Atualizar Massagem
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.footer')

    <!-- Font Awesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Bootstrap JS (para o alerta funcionar) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min
