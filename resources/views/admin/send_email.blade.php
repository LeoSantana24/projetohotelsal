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
  <body>
       
    @include('admin.header')

    @include('admin.sidebar', ['activePage' => 'home'])
    
      <!-- Sidebar Navigation end-->
       <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <center>
            <h1 style="font-size:30px; font:weight:bold;">Enviar email para {{$data->name}}</h1>

              <form action="{{url('email',$data->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label>Saudações</label>
                            <input type="text" name="greeting" required>
                            
                            <label>Email body</label>
                            <textarea name="body" required></textarea>
                            
                           

                            

                            <label>End Line</label>
                            <input type="text" name="endline" required>
                            
                            
                            
                            
                            
                            
                            
                        
                            <div style="padding-top:20px;">
                                <input class="btn btn-primary" type="submit" value="Enviar email">
                            </div>


                        </form>


            </center>




          </div>
        </div>
    </div>
    
        
    @include('admin.footer')
  </body>
</html>