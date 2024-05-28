@extends('layout.admin')
@section('content')
    <section class="submit">
        <div class="container">
            <div class="row">
                <div class="col-10" style="margin-left:150px; margin-top: 80px;">
                    <div class="card">
                        <div class="card-header h4" style="color: red">
                            List Sliders
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
                                        <th>Slider Text</th>
                                        <th>Slider Image</th>
                                        <th>Slider description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sliderData as $key => $item)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $item->slider_text }}</td>
                                            <td><img src="{{ asset($item->slider_img) }}" style="width: 50px; height: 50px;"
                                                    alt="img"></td>
                                            <td>{{ $item->slider_description }}</td>
                                            <td>
                                                <a href="{{Route('slider.edit',['sliderId'=>$item->id])}}" class="btn btn-success btn-sm">Edit</a>
                                                <a href="{{ Route('slider.delete', ['deleteId' => $item->id]) }}"
                                                    class="btn btn-danger btn-sm">Delete</a>
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
