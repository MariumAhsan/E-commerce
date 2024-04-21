@extends('layouts.nav-sidebar')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="container mt-3">
                    <div class="table-responsive">
                        <table class="table table-bordered border-primary">
                            <thead class="table-secondary">
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Receiver Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Total Amount</th>
                            <th scope="col">Status</th>
                            <th scope="col">Details</th>
    
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->phone_number}}</td>
                            <td>{{ $order->net_total }}</td>
                            <td>{{ $order->status }}</td>
                            <td><a href="{{ route('pages.show-order-details', $order->id)}}" class="btn btn-sm btn-primary">Show details</a></td>
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

@endsection