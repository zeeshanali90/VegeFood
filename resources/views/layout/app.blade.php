<!DOCTYPE html>
<html lang="en">
@include('partials.app.head')
  <body class="goto-here">
    @include('partials.app.header')
@yield('content')

    @include('partials.app.footer')
@include('partials.app.scipts')
@include('flashy::message')
  </body>
</html>
