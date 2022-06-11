<!DOCTYPE html>
<html lang="pt-br">

  <head>
      <title>@yield('title')</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="{{ asset('css/base.css') }}">
  </head>

  <body>
      @include('site.layouts.partials.header')
      @yield('content')
  </body>

</html>
