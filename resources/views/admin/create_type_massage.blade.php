<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
        body {
            background: #1a1a1a;
            color: #e0e0e0;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        .page-content {
            background: #1a1a1a;
            min-height: 100vh;
        }

        .form-container {
            max-width: 600px;
            margin: auto;
            background: #2a2a2a;
            padding: 40px;
            border-radius: 16px;
            border: 1px solid #3a3a3a;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .form-container h1 {
            color: #ffffff;
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 40px;
            text-align: center;
            padding-bottom: 15px;
            border-bottom: 1px solid #3a3a3a;
        }

        .form-group {
            margin-bottom: 24px;
        }

        label {
            color: #9ca3af;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        input[type="text"], 
        input[type="number"], 
        textarea {
            width: 100%;
            padding: 14px 16px;
            margin-bottom: 0;
            background: #3a3a3a;
            border: 1px solid #4a4a4a;
            border-radius: 8px;
            color: #ffffff;
            font-size: 15px;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        input[type="text"]:focus, 
        input[type="number"]:focus, 
        textarea:focus {
            outline: none;
            border-color: #dc3545;
            background: #404040;
            box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.1);
        }

        input[type="text"]::placeholder, 
        input[type="number"]::placeholder, 
        textarea::placeholder {
            color: #6b7280;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        /* Estilo do input de arquivo customizado */
        .file-input-container {
            position: relative;
            margin-bottom: 0;
        }

        .file-input-label {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 14px 16px;
            background: #3a3a3a;
            border: 1px solid #4a4a4a;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            color: #9ca3af;
        }

        .file-input-label:hover {
            background: #404040;
            border-color: #dc3545;
        }

        .file-input-label input[type="file"] {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }

        .file-input-text {
            flex: 1;
            color: #9ca3af;
            font-size: 15px;
        }

        .file-input-icon {
            color: #dc3545;
            font-size: 18px;
            margin-left: 10px;
        }

        /* Quando arquivo é selecionado */
        .file-selected .file-input-text {
            color: #ffffff;
        }

        .btn-primary {
            background: #dc3545;
            color: white;
            border: none;
            padding: 16px 24px;
            width: 100%;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 20px;
        }

        .btn-primary:hover {
            background: #c82333;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(220, 53, 69, 0.3);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-primary i {
            font-size: 16px;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .form-container {
                padding: 25px;
                margin: 10px;
                border-radius: 12px;
            }

            .form-container h1 {
                font-size: 1.6rem;
            }

            input[type="text"], 
            input[type="number"], 
            textarea,
            .file-input-label {
                padding: 12px 14px;
            }

            .btn-primary {
                padding: 14px 20px;
                font-size: 14px;
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

        /* Animação de entrada */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-container {
            animation: fadeInUp 0.5s ease-out;
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
                                <input type="text" id="massage_title" name="massage_title" placeholder="Digite o título da massagem" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="description">Descrição</label>
                                <textarea id="description" name="description" placeholder="Descreva os benefícios e características da massagem..." required></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="price">Preço (€)</label>
                                <input type="number" id="price" name="price" placeholder="0.00" step="0.01" min="0" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Imagem da Massagem</label>
                                <div class="file-input-container">
                                    <label class="file-input-label" id="file-label">
                                        <span class="file-input-text" id="file-name">Selecione uma imagem</span>
                                        <span class="file-input-icon">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                        </span>
                                        <input type="file" name="image" accept="image/*" onchange="updateFileName(this)">
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
            const fileLabel = document.getElementById('file-label');
            const fileNameSpan = document.getElementById('file-name');
            
            fileNameSpan.textContent = fileName;
            
            if (input.files[0]) {
                fileLabel.classList.add('file-selected');
            } else {
                fileLabel.classList.remove('file-selected');
            }
        }

        // Adicionar efeito de focus aos campos
        document.querySelectorAll('input, textarea').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
                this.parentElement.style.transition = 'transform 0.3s ease';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });

        // Validação em tempo real
        document.getElementById('massage_title').addEventListener('input', function() {
            if (this.value.length > 0) {
                this.style.borderColor = '#28a745';
            } else {
                this.style.borderColor = '#4a4a4a';
            }
        });

        document.getElementById('description').addEventListener('input', function() {
            if (this.value.length > 10) {
                this.style.borderColor = '#28a745';
            } else {
                this.style.borderColor = '#4a4a4a';
            }
        });

        document.getElementById('price').addEventListener('input', function() {
            if (this.value > 0) {
                this.style.borderColor = '#28a745';
            } else {
                this.style.borderColor = '#4a4a4a';
            }
        });
    </script>
  </body>
</html>