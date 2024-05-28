@extends('layout.admin')
@section('content')
    <section class="submit">
        <div class="container">
            <div class="row">
                <div class="col-10" style="margin-left:150px; margin-top: 80px;">
                    <div class="card">
                        <div class="card-header h4" style="color: red">
                            List Orders
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Items Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Checkout as $key => $item)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>{{ $item->number }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-success btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div for="" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="btn btn-primary btn-sm dropdown-item" href="{{ route('order.detail', $item->id) }}">See Detail</a>
                                                        <a class="btn btn-warning btn-sm dropdown-item" href="javascript:void(0);" onclick="confirmForward('{{$item->id }}')">Forward</a>
                                                        <a class="btn btn-danger btn-sm dropdown-item" href="javascript:void(0);" onclick="confirmReject('{{$item->id}}')">Reject</a>
                                                    </div>
                                                </div>
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

<script>
function confirmForward(itemId) {
    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to forward this order?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, forward it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "{{route('order.forward')}}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: itemId
                },
                success: function(response) {
                    Swal.fire(
                        'Forwarded!',
                        'The order has been forwarded.',
                        'success'
                    );

                },
                error: function(xhr) {
                    Swal.fire(
                        'Error!',
                        'There was an error forwarding the order.',
                        'error'
                    );
                }
            });
        }
    });
}

function confirmReject(itemId) {
    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to reject this order?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, reject it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "{{route('order.reject')}}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: itemId
                },
                success: function(response) {
                    Swal.fire(
                        'Rejected!',
                        'The order has been Rejected.',
                        'success'
                    );

                },
                error: function(xhr) {
                    Swal.fire(
                        'Error!',
                        'There was an error rejecting the order.',
                        'error'
                    );
                }
            });
        }
    });
}
</script>




