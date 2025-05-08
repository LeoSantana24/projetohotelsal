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
    @include('admin.sidebar', ['activePage' => 'massagens'])
    
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <div class="div_center">
                    <div class="form-container">
                        <h1>Adicionar Massagem</h1>
                        <form action="{{url('add_type_massage')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group">
                                <label for="massage_title">Título Massagem</label>
                                <input type="text" id="massage_title" name="massage_title" required >
                            </div>
                            
                            <div class="form-group">
                                <label for="description">Descrição</label>
                                <textarea id="description" name="description" required ></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="price">Preço (€)</label>
                                <input type="number" id="price" name="price" required >
                            </div>
                            
                            <div class="form-group">
                                <label>Imagem da Massagem</label>
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
                                <i class="fas fa-plus-circle"></i> Adicionar Massagem
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

    <script>
        function updateFileName(input) {
            const fileName = input.files[0] ? input.files[0].name : 'Selecione uma imagem';
            document.getElementById('file-name').textContent = fileName;
        }
    </script>
  </body>
</html>