<!DOCTYPE html>
<html>
  <head> 
   <base href="/public">
    @include('admin.css')
  </head>
  <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
            font-family: 'Inter', sans-serif;
        }
        
        .page-content {
            padding: 40px 20px;
            min-height: calc(100vh - 200px);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .form-wrapper {
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
        }
        
        .form-container {
            background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
            padding: 40px;
            border-radius: 16px;
            border: 1px solid #3a3a3a;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
        }
        
        .form-title {
            color: #ffffff;
            font-weight: 600;
            font-size: 28px;
            margin-bottom: 30px;
            text-align: center;
            padding-bottom: 15px;
            border-bottom: 2px solid #3a3a3a;
            background: linear-gradient(135deg, #ffffff, #b0b0b0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        label {
            color: #b0b0b0;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        textarea {
            width: 100%;
            min-height: 200px;
            padding: 20px;
            background: #2d2d2d;
            border: 2px solid #3a3a3a;
            border-radius: 12px;
            color: #ffffff;
            font-family: 'Inter', sans-serif;
            font-size: 16px;
            line-height: 1.6;
            resize: vertical;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }
        
        textarea:focus {
            outline: none !important;
            border-color: #d62222 !important;
            background: #333;
            box-shadow: 0 0 0 3px rgba(214, 34, 34, 0.3) !important;
        }
        
        textarea:focus-visible {
            outline: none !important;
            border-color: #d62222 !important;
            box-shadow: 0 0 0 3px rgba(214, 34, 34, 0.3) !important;
        }
        
        textarea::placeholder {
            color: #666;
            font-style: italic;
        }
        
        .btn-container {
            text-align: center;
            margin-top: 30px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #4a4a4a, #6a6a6a);
            color: white;
            border: none;
            padding: 16px 40px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #d62222, #ff4444);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(214, 34, 34, 0.4);
        }
        
        .btn-primary:hover::before {
            left: 100%;
        }
        
        .btn-primary:active {
            transform: translateY(0);
        }
        
        /* Animação de entrada */
        .form-container {
            animation: slideUp 0.6s ease-out;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Responsividade */
        @media (max-width: 768px) {
            .form-container {
                margin: 20px;
                padding: 30px 25px;
            }
            
            .form-title {
                font-size: 24px;
            }
            
            textarea {
                min-height: 150px;
                padding: 15px;
            }
            
            .btn-primary {
                width: 100%;
                padding: 14px;
            }
        }
    </style>
  <body>
       
    @include('admin.header')

    @include('admin.sidebar', ['activePage' => 'home'])
    
      <!-- Sidebar Navigation end-->
       <div class="page-content">
        <div class="container-fluid">
            <div class="form-wrapper">
                <div class="form-container">
                    <h1 class="form-title">Enviar email para {{$data->name}}</h1>

                    <form action="{{url('email',$data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                            <label for="body">Mensagem</label>
                            <textarea 
                                name="body" 
                                id="body"
                                required 
                                placeholder="Digite sua mensagem aqui..."
                            ></textarea>
                        </div>
                    
                        <div class="btn-container">
                            <input class="btn btn-primary" type="submit" value="Enviar Email">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
        
    @include('admin.footer')
  </body>
</html>