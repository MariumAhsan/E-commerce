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
                            <th scope="col">Coupon ID</th>
                            <th scope="col">Description</th>
                            <th scope="col">Coupon Code</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Type</th>
                            <th scope="col">Status</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($coupons as $coupon)
                        <tr>
                            <td>{{ $coupon->id }}</td>
                            <td>{{ $coupon->description }}</td>
                            <td>{{ $coupon->code }}</td>
                            <td>{{ $coupon->discount_amount }}</td>
                            @if($coupon->type)
                            <td>Percentage</td>
                            @else
                            <td>Fixed</td>
                            @endif
                            @if($coupon->status)
                            <td>Enabled</td>
                            @else
                            <td>Disabled</td>
                            @endif
                            <td><a href="{{ route('coupon.edit', $coupon->id) }}" class="btn btn-sm btn-primary">Edit</a></td>
                            <td><a href="{{ route('coupon.remove', $coupon->id) }}" class="btn btn-sm btn-danger">Remove</a></td>
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