<head>
    <title>Vegefoods</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{url('frontend/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/animate.css')}}">

    <link rel="stylesheet" href="{{url('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{url('frontend/css/aos.css')}}">

    <link rel="stylesheet" href="{{url('frontend/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{url('frontend/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/jquery.timepicker.css')}}">


    <link rel="stylesheet" href="{{url('frontend/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/style.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
    </script>
  </head>
