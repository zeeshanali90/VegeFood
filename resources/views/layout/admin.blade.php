<!DOCTYPE html>
<html lang="en">

@include('partials.admin.head')
<body>
    @include('partials.admin.sidebar')

    @yield('content')

    <!-- JavaScript Libraries -->
  @include('partials.admin.scipts')
  @include('flashy::message')

</body>

</html>
