@extends('layout.admin')
@section('content')
    <section class="submit">
        <div class="container">
            <div class="row">
                <div class="col-10" style="margin-left:150px; margin-top: 80px;">
                    <div class="card">
                        <div class="card-header h4" style="color: red">
                            List Products
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-primary" role="alert"">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Purchasing Price</th>
                                        <th>Selling Price</th>
                                        <th>Is Available</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productsData as $key => $item)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $item->product_name }}</td>
                                            <td><img src="{{ asset($item->product_img) }}" style="width: 50px; height: 50px;"
                                                    alt="img"></td>
                                            <td>{{ $item->purchasing_price }}</td>
                                            <td>{{ $item->selling_price }}</td>
                                            <td>
                                                @if($item->is_available == 'yes')
                                                    <span class="badge badge-success">Yes</span>
                                                @else
                                                    <span class="badge badge-danger">No</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{Route('products.edit',['productId'=>$item->id])}}" class="btn btn-success btn-sm">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
