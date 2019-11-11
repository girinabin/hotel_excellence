<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Page Title -->
<title>@yield('title','Hotel Excellence')</title>
<title>@yield('title')</title>
<meta name="keyword" content="@yield('keyword')" >
<meta name="description" content="@yield('description')">


    <!-- FavIcon Link -->
    <link rel="icon" type="image/ico" href="{{url('frontend/favicon.ico')}}">


    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="description" content="">
    <meta name="keywords" content="">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{url('frontend/css/bootstrap.min.css')}}">


    <!-- Global CSS -->
    <link rel="stylesheet" type="text/css" href="{{url('frontend/css/style.css')}}">


    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="{{url('frontend/css/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/css/owl.theme.css')}}">


    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">


    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">


    <!-- PageLevel CSS -->
    <link rel="stylesheet" type="text/css" href="{{url('frontend/creatu/css/test/test.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/creatu/css/header/header.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/creatu/css/footer/footer.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/creatu/css/home/home.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/creatu/css/about/about.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/creatu/css/gallery/gallery.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/creatu/css/gallery/album.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/creatu/css/contact/contact.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/creatu/css/excellence/excellence.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/creatu/css/room/deluxe-room.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/creatu/css/room/suite.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/creatu/css/room/apartment.css')}}">


    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>


    <!-- Jquery -->
    <script type="text/javascript" src="{{url('frontend/js/jquery-1.9.1.min.js')}}"></script>
</head>
<body>

    <div>
        @include('cd-admin.frontend.header.header')
    </div>

    <div style="min-height: 50vh;">
        @yield('content')
    </div>

    <div>
        @include('cd-admin.frontend.footer.footer')
    </div>
</body>

<!-- Popper, Boostrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{url('frontend/js/bootstrap.js')}}"></script>


<!-- Global JS -->
<script type="text/javascript" src="{{url('frontend/js/js.js')}}"></script>


<!-- Owl Carousel JS -->
<script type="text/javascript" src="{{url('frontend/js/owl.carousel.min.js')}}"></script>


<!-- PageLevel JS -->
<script type="text/javascript" src="{{url('frontend/creatu/js/test/test.js')}}"></script>
<script type="text/javascript" src="{{url('frontend/creatu/js/home/js.js')}}"></script>
<script type="text/javascript" src="{{url('frontend/creatu/js/home/home.js')}}"></script>


<!-- Fancybox JS -->
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</html>