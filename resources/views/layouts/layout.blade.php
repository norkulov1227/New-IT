<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link href="{{asset('assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{asset('style/home_style.css')}}">
  <link rel="stylesheet" href="{{asset('style/about_style.css')}}">
  <link rel="stylesheet" href="{{asset('style/market_style.css')}}">
  <link rel="stylesheet" href="{{asset('style/itgroup_style.css')}}">
  <link rel="stylesheet" href="{{asset('style/itpark_style.css')}}">
  <link rel="stylesheet" href="{{asset('style/contact_style.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('style/service_style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


  @livewireStyles
</head>
<body>

  <div class="wrapper">

    <nav class="navbar navbar-expand-lg navbar-dark" aria-label="Fifth navbar example">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">New IT.uz</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample05">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('about')}}">About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('market')}}">Market</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-bs-toggle="dropdown" aria-expanded="false">IT Park</a>
              <ul class="dropdown-menu" aria-labelledby="dropdown05">
                <li><a class="dropdown-item" href="{{route('itpark')}}">IT Park</a></li>
                <li><a class="dropdown-item" href="{{route('itgroup')}}">IT Group</a></li>
              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('service')}}">Service</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('contact')}}">Contacts</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>


        {{ $slot }}


<!------footer start--------->
<footer>
  <p>New IT Group</p>
  <p>For more information, you can subscribe with links below:</p>
  <div class="social">
    <a href="#"><i class="fab fa-facebook-f"></i></a>
    <a href="#"><i class="fab fa-instagram"></i></a>
    <a href="#"><i class="fab fa-dribbble"></i></a>
  </div>
  <p class="end">CopyRight By ...</p>
</footer>
@livewireScripts
<script src="{{asset('assets/dist/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
