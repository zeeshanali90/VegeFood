@extends('layout.app')
@section('content')


<body class="bg-white">
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-8 col-xl-6      ">
                   <form action="{{route('signup.auth')}}" method="POST">
                    @csrf
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="/index" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>VEGEFOOD</h3>
                            </a>
                            <h3>Sign Up</h3>
                        </div>
                        @if (session('success'))
                         <div class="alert alert-danger">{{session('success')}}</div>
                        @endif
                        <div class="form-floating mb-3">
                            <input name="name" type="text" class="form-control" id="floatingText" placeholder="your name">
                            <label for="floatingText">User Name</label>
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input name="email" type="email" class="form-control" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Email Address</label>
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                        <p class="text-center mb-0">Already have an Account? <a href="/login">Login</a></p>
                    </div>
                   </form>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>

    <!-- JavaScript Libraries -->

</body>

@endsection



</html>
