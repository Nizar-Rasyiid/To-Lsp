<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href={{ url("assets/fonts/icomoon/style.css") }} }}>

    <link rel="stylesheet" href={{ url("assets/css/owl.carousel.min.css") }}>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.css') }}">
    
    <!-- Style -->
    <link rel="stylesheet" href={{ url("assets/css/style.css") }}>
    <link rel="stylesheet" href="{{ url('assets/bootstrap-icons/bootstrap-icons.css') }}">

    <title>Login Artikel IT</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url({{ url('assets/images/bg2.png') }});"></div>
    <div class="contents order-2 order-md-1">
      @yield('content')
    </div>

    
  </div>
    
    

    <script src={{ url("assets/js/jquery-3.3.1.min.js") }}></script>
    <script src={{ url("assets/js/popper.min.js") }}></script>
    <script src={{ url("assets/js/bootstrap.min.js") }}></script>
    <script src={{ url("assets/js/main.js") }}></script>
  </body>
</html>