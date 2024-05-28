@extends('layout.admin')
@section('content')
    <div class="container-fluid position-relative d-flex p-0">
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-8 col-xl-6  ">
                    <form action="{{ $data ? route('products.update') : route('products.create') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf


                            <input type="text" name="id" value="{{$data?$data->id:"" }}" hidden>
                        <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <a href="index.blade.php" class="">
                                    <h5 class="text-primary"><i class="fa fa-user-edit me-2"></i>VEGEFOOD</h5>
                                </a>
                                <h5>{{ $data ? 'Update' : 'Create' }} Products</h5>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-primary" role="alert"">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="form-floating mb-3">
                                <input type="text" value="" class="form-control" id="product_name"
                                    name="product_name" value="{{ $data ? $data->product_name : '' }}" placeholder="jhondoe">
                                <label for="floatingText">Name</label>
                                @error('product_name')
                                    <span class="text-warning">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" id="product_img" name="product_img"
                                    style="background-color: black">
                                <label for="floatingText">Upload file/image</label>

                                @if($data)
                                    <img class="img-fluid mt-3" style="max-width: 150px" src="{{ asset($data?$data->product_img:"") }}"
                                        alt="">
                                @endif
                                @error('product_img')
                                    <span class="text-warning">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" value="{{ $data ? $data->purchasing_price : '' }}" class="form-control"
                                    id="purchasing_price" name="purchasing_price" placeholder="jhondoe">
                                <label for="floatingText">Purchasing Price</label>
                                @error('purchasing_price')
                                    <span class="text-warning">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <input type="number" value="{{ $data ? $data->selling_price : '' }}" class="form-control"
                                    name="selling_price" id="selling_price" placeholder="Enable or disable">
                                <label for="floatingPassword">Selling Price</label>
                                @error('selling_price')
                                    <span class="text-warning">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <select class="form-control form-select" id="is_available" name="is_available"
                                    style="background-color: black">
                                    <option {{ ($data && $data->is_available="yes")?"selected" : '' }} value="yes">yes</option>
                                    <option {{ ($data && $data->is_available="no" )?"selected": '' }} value="no">No</option>
                                </select>
                                <label for="floatingPassword">Is Available</label>
                                @error('is_available')
                                    <span class="text-warning">{{ $message }}</span>
                                @enderror
                            </div>
                            <button name="submit" type="submit" class="btn btn-primary py-3 w-100 mb-4">Save</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
