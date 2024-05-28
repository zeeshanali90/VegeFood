@extends('layout.app')
@section('content')

    <body class="goto-here">
        <div class="hero-wrap hero-bread" style="background-image: url({{ url('frontend/images/bg_1.jpg') }});">
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="col-md-9 ftco-animate text-center">
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>checkout</span>
                        </p>
                        <h1 class="mb-0 bread">Checkout</h1>
                    </div>
                </div>
            </div>
        </div>
<body>
    <div class="container">
       <div class="row">
        <div class="col-6">
            <h2>Checkout</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form id="checkout-form" action="{{ route('checkout.process') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="number">Number</label>
                    <input type="text" id="number" name="number" class="form-control" required>
                </div>
                <button  type="submit" class="btn btn-success">Place Order</button>
                <a href="/list/cart" type="submit" class="btn btn-warning">Go To Cart</a>
            </form>
        </div>
        <div class="col-6">
            <section class="ftco-section ftco-cart">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 ftco-animate">
                            <div class="cart-list">
                                <table class="table">
                                    <thead class="thead-primary">
                                        <tr class="text-center">
                                            <th>Product name</th>
                                            <th>Product quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItem as $item)


                                        <tr class="text-center">
                                            <td>
                                                <h3>{{ $item->product->product_name }}</h3>
                                            </td>
                                            <td class="">
                                                {{ $item->quantity }}
                                            </td>
                                            <td >{{$item->price *$item->quantity }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        </div>
       </div>
</body>
@endsection
