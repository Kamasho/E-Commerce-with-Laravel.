<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <title>@yield('title')</title>

      <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <!-- google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  
  <!-- CSS Files -->
    <link href="{{ asset('fontend/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('fontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('fontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fontend/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
      a{
        text-decoration: none !important;
        color: #000 !important;
      }
    </style>

</head>
<body>
    @include("layouts.inc.frontnavbar")
    <div class="content">
        @yield("content")
    </div>

      <!--   Core JS Files   -->
      <script src="{{ asset('fontend/js/jquery-3.6.0.min.js') }}"></script>
      <script src="{{ asset('fontend/js/jquery-3.6.0.min.js') }}"></script>
      <script src="{{ asset('fontend/js/owl.carousel.min.js') }}"></script>
        @yield("scripts")
</body>
</html>
