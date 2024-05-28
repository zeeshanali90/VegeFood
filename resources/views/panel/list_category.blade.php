@extends('layout.admin')
@section('content')
<section class="submit">
    <div class="container">
        <div class="row">
            <div class="col-10" style="margin-left:150px; margin-top: 80px;">
                <div class="card">
                    <div class="card-header h4" style="color: red">
                        List Categories
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-primary" role="alert"">
                            {{session('success')}}
                        </div>

                     @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categoryData as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <a href="{{Route('category.edit',['catId'=>$item->id])}}" class="btn btn-success btn-sm">Edit</a>
                                            <a href="{{Route('category.delete',['deleteId'=>$item->id])}}" class="btn btn-danger btn-sm">Delete</a>
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
