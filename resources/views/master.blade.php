<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script type="text/javascript" href="{{ asset('js/bootstrap.js') }}"></script>
    <script type="text/javascript" href="{{ asset('js/bootstrap.min.js') }}"></script>
    <title>@yield('title')</title>
  </head>
  <body>
    @yield('content')
  </body>
</html>
