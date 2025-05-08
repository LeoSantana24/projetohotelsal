<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
       
    @include('admin.header')

    @include('admin.sidebar', ['activePage' => 'home'])
    
      <!-- Sidebar Navigation end-->
    @include('admin.body')
        
    @include('admin.footer')
  </body>
</html>