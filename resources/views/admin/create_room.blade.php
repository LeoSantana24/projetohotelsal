<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
        label{

            display:inline-block;
            width: 200px;
        }

        .div_deg{
            padding-top: 30px;
        }
        .div_center{
            text-align:center;
            padding-top:40px;
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

                        <h1 style="font-size: 30px; font-weight: bold ">Adicionar Quartos</h1>
                    <form action="{{url('add_room')}}" method="POST" enctype="multipart/form-data">

                    @csrf
                        <div class="div_deg">
                            <label> Titulo Quarto</label>
                            <input type="text" name="title">
                        </div>
                        <div class="div_deg">
                            <label> Descrição</label>
                            <textarea name="description"></textarea>
                        </div>
                        <div>
                            <label> Preço</label>
                            <input type="number" name="price">
                        </div>
                        <div class="div_deg">
                            <label> Tipo Quarto</label>

                            <select name="type">

                                <option selected value="regular">Regular</option>
                                <option value="premium">Premium</option>
                                <option value="deluxe">Deluxe</option>

                            </select>
                        </div>
                        <div class="div_deg">
                            <label>Wifi Grátis</label>
                            <select name="wifi">
                            <option selected value="yes">Sim</option>
                                <option value="no">Não</option>
                            
                            </select>
                        </div>
                        <div class="div_deg">
                            <label>Upload Imagem</label>
                            <input type="file" name="image">
                        </div>
                        <div class="div_deg">
                            <input class="btn btn-primary" type="submit" value="Add Quarto">
                        </div>




                    </form>



                </div>



            </div>

        </div>

    </div>
     
  
        
    @include('admin.footer')
  </body>
</html>