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
                            <td>
                                @php
                                    $status = '';
                                    switch ($order->status) {
                                        case 1:
                                            $status = 'Pending';
                                            $badgeClass = 'badge-secondary';
                                            break;
                                        case 2:
                                            $status = 'Processing';
                                            $badgeClass = 'badge-warning';
                                            break;
                                        case 3:
                                            $status = 'On Hold';
                                            $badgeClass = 'badge-secondary';
                                            break;
                                        case 4:
                                            $status = 'Confirmed';
                                            $badgeClass = 'badge-success';
                                            break;
                                        case 5:
                                            $status = 'Completed';
                                            $badgeClass = 'badge-info';
                                            break;
                                        case 6:
                                            $status = 'Canceled';
                                            $badgeClass = 'badge-danger';
                                            break;
                                        case 7:
                                            $status = 'Failed';
                                            $badgeClass = 'badge-danger';
                                            break;
                                        default:
                                            $status = 'Unknown';
                                            $badgeClass = 'badge-secondary';
                                            break;
                                    }
                                @endphp
                                <span class="badge {{ $badgeClass }}">{{ $status }}</span>
                            </td>
                            <td><a href="{{ route('pages.show-order-details', $order->id)}}" >Details</a></td>
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