@extends('layout.admin')
@section('content')
<div class="container-fluid position-relative d-flex p-0">
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
               <form action="{{ $data ? route('category.update') : route('category.create') }}"  method="POST">
                @csrf
                <input type="text" name="cat_id" value="{{$data?$data->id:"" }}" hidden>
                 <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="index.blade.php" class="">
                        <h5 class="text-primary"><i class="fa fa-user-edit me-2"></i>VEGEFOOD</h5>
                    </a>
                    <h5>{{$data?"Update":"Create"}} Category</h5>
                </div>
                @if (session('success'))
                <div class="alert alert-primary" role="alert"">
                    {{session('success')}}
                </div>

             @endif
                <div class="form-floating mb-3">
                    <input type="text" value="{{ $data ? $data->name : '' }}" class="form-control" id="name" name="name"
                        placeholder="jhondoe">
                    <label for="floatingText">Name</label>
                    @error('name')
                    <span class="text-warning">{{$message}}</span>
                    @enderror
                </div>
                    <div class="form-floating mb-4">
                        <select class="form-control form-select " id="status" name="status" style="background-color: black">
                            <option {{ ($data && $data->status="enable")?"selected" : '' }} value="enable">Enable</option>
                            <option {{($data && $data->status="disable")?"selected":''}} value="disable">disable</option>
                        </select>
                        <label for="floatingPassword">Status</label>
                        @error('status')
                        <span class="text-warning">{{$message}}</span>
                        @enderror
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary py-3 w-100 mb-4">Save</button>
                </div>
            </div></form>
            </div>
        </div>
    </div>

@endsection
