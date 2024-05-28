@extends('layout.app')
@section('content')

    <body class="goto-here">
        <div class="hero-wrap hero-bread" style="background-image: url({{ url('frontend/images/bg_1.jpg') }});">
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="col-md-9 ftco-animate text-center">
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span>
                        </p>
                        <h1 class="mb-0 bread">My Cart</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="ftco-section ftco-cart">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-12 ftco-animate">
                        <div class="cart-list">
                            @if (session('success'))
                                <div class="alert alert-primary" role="alert"">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <table class="table">
                                <thead class="thead-primary">
                                    <tr class="text-center">
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th>Cart</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItem as $key => $item)
                                        <tr class="text-center">
                                            <td class="product-name">
                                                <h3>{{ $item->product->product_name }}</h3>
                                            </td>
                                            <td class="image-prod">
                                                {{ $item->quantity }}
                                            </td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->price *$item->quantity}}</td>
                                            <td><a href="{{ Route('cart.delete', ['cartdelId' => $item->id]) }}"
                                                    class="btn btn-warning btn-sm-4">Remove</a></td>
                                            <td></form></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a class="btn btn-dark" href="/checkout">Check Out</a>
                    </div>
                </div>
            </div>
        </section>
    </body>
@endsection


<script></script>
