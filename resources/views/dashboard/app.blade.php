<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{config('app.name')}}</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <!-- <link href="css/album.css" rel="stylesheet"> -->
    <link href="{{asset('css/theme.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/carousel.css')}}" rel="stylesheet">

    <!-- Optional Preloader -->
    <style>
    .preloader {
       position: absolute;
       top: 0;
       left: 0;
       width: 100%;
       height: 100%;
       z-index: 9999;
       background-image: url(../../images/preloader_2.gif);
       background-repeat: no-repeat;
       background-color: #FFF;
       background-position: center;
    }

    </style>

    @stack('styles')

  </head>

  <body>

    <div class="preloader"></div>

    @include('layouts.header')

    <main role="main">

      @yield('content')
      <!-- Sidebar Widgets Column -->
    </main>

    @include('layouts.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{asset('assets/plugins/dropify/dist/js/dropify.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim.js/3.3.4/Slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.6/holder.min.js"></script>

    @stack('scripts')
  </body>
</html>
