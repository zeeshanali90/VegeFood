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
                    <div class="col-md-12 ftco-animate">
                        <div class="cart-list">
                            <table class="table">
                                <thead class="thead-primary">
                                    <tr class="text-center">
                                        <th>Product name</th>
                                        <th>Product Image</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th>Add to Cart</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        <td class="product-name">
                                            <h3>{{ $productsData->product_name }}</h3>
                                        </td>
                                        <td class="image-prod">
                                            <img style="width: 100px; height:100px;" class="img-fluid" src="{{ asset($productsData->product_img) }}"
                                    alt="Colorlib Template">
                                        </td>
                                        <td class="price">{{ $productsData->selling_price }}</td>
                                        <td class="total">{{ $productsData->selling_price }}</td>
                                        <td><button onclick="add-to-cart" name="addtoCartbtn" id="addtoCartbtn" class="btn bg-success">Add-to-Cart</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
@endsection


<script>

</script>
