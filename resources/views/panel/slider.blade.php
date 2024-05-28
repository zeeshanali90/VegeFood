@extends('layout.admin')
@section('content')
    <div class="container-fluid position-relative d-flex p-0">
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-8 col-xl-6  ">
                    <form action="{{ $data ? route('slider.update') : route('slider.create') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                            <input type="text" name="slider_id" value="{{$data?$data->id:"" }}" hidden>
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
                                <input type="text" value="" class="form-control" id="slider_text"
                                    name="slider_text" value="{{ $data ? $data->slider_text : "" }}">
                                <label for="floatingText">Slider Text</label>
                                @error('slider_text')
                                    <span class="text-warning">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" id="slider_img" name="slider_img"
                                    style="background-color: black">
                                <label for="floatingText">Upload file/image</label>

                                @if($data)
                                    <img class="img-fluid mt-3" style="max-width: 150px" src="{{ asset($data?$data->slider_img:"") }}"
                                        alt="">
                                @endif
                                @error('slider_img')
                                    <span class="text-warning">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $data ? $data->slider_description : '' }}" class="form-control"
                                    id="slider_description" name="slider_description">
                                <label for="floatingText">Slider Description</label>
                                @error('slider_description')
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
