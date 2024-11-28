@php
use App\Models\Configuration;
$config = Configuration::first();
@endphp

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{$config->title_web}} </title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link
      rel="preconnect"
      href="https://fonts.gstatic.com"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{asset('Assetsproduct/css/boostrap.min.css')}}">
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap"
      rel="stylesheet"
    />
    <link rel="shortcut icon" type="image/png" href="{{asset($config->logo)}}" />
    <!--build:css assets/css/styles.min.css-->
    <link rel="stylesheet" href="{{asset('Assetsproduct/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('Assetsproduct/css/slick.min.css')}}" />
    <link rel="stylesheet" href="{{asset('Assetsproduct/css/bootstrap-drawer.min.css')}}" />
    <link rel="stylesheet" href="{{asset('Assetsproduct/icons/style.css')}}" />
    <link rel="stylesheet" href="{{asset('Assetsproduct/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('Assetsproduct/css/animate-4.1.1.min.css')}}" />

<body>
  <div id="header">
    <div class="header-menu style-one bg-white">
      <div class="container flex-between h-80">
        <a class="menu-left-block" href=""><img
            class="menu-logo display-block"
            src="{{ asset($config->logo) }}" alt="Logo" width="100px" /></a>
        <div class="menu-center-block h-100">
          <ul class="menu-nav flex-item-center h-100">
            <li class="nav-item h-100 flex-center home">
              <a class="nav-link" href="{{route('home')}}">Home </a>
            </li>
            <li class="nav-item h-100 flex-center home">
              <a class="nav-link" href="{{route('product')}}">Produk </a>
            </li>
            <li class="nav-item h-100 flex-center home">
              <a class="nav-link" href="{{route('blog')}}">Blog </a>
            </li>
          </ul>
        </div>
        <div class="menu-right-block flex-item-center">
          <div class="icon-call"><i class="icon-phone-call fs-36"></i></div>
          <a href="https://api.whatsapp.com/send?phone={{$config->phone}}">
          <div class="text ml-12">
            <div class="text caption1">Hubungi Kami</div>
            <div class="number text-button">{{$config->phone}} </div>
          </div>
          </a>
          <div class="menu-humburger display-none pointer">
            <i class="ph-bold ph-list display-block"></i>
          </div>
        </div>
      </div>
      @yield('content')

      <!--build:js assets/js/main.min.js-->
      <script src="{{asset('Assetsproduct/js/jquery-3.7.0.js')}}"></script>
      <script src="{{asset('Assetsproduct/js/jquery-migrate-3.4.1.js')}}"></script>
      <script src="{{asset('Assetsproduct/js/slick.min.js')}}"></script>
      <script src="{{asset('Assetsproduct/js/waypoints.min.js')}}"></script>
      <script src="{{asset('Assetsproduct/js/countUp.min.js')}}"></script>
      <script src="{{asset('Assetsproduct/js/phosphor-icon.js')}}"></script>
      <script src="{{asset('Assetsproduct/js/scrollreveal-4.0.0.min.js')}}"></script>
      <script src="{{asset('Assetsproduct/js/bootstrap-drawer.min.js')}}"></script>
      <script src="{{asset('Assetsproduct/js/drawer.min.js')}}"></script>
      <script src="{{asset('Assetsproduct/js/main.min.js')}}"></script>
      <!--endbuild-->
</body>

</html>