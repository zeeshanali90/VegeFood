@extends('layout.admin')
@section('content')
    <section class="submit">
        <div class="container">
            <div class="row">
                <div class="col-10" style="margin-left:150px; margin-top: 80px;">
                    <div class="card">
                        <div class="card-header h4" style="color: red">
                            List Details
                        </div>
                        <div class="card-body">
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Order Id</th>
                                        <th>Product Id</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderData as $key => $item)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $item->product->product_name  }}</td>
                                            <td>{{ $item->checkout_id }}</td>
                                            <td>{{ $item->product_id }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
