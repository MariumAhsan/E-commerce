@extends('layouts.shop-main')
@section('content')
@php
use App\Models\District;
use App\Models\Division;
use App\Models\Thana;
use App\Models\Order;
$divisions= Division::all();
$user_id=Auth()->user()->id;
$orders= Order::where('user_id',$user_id)->get();

@endphp
<main class="main">
<div class="page-content pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="row">
                    <div class="col-md-3">
                        <div class="dashboard-menu">
                            <ul class="nav flex-column" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#track-orders" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>My Address</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="page-login.html"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content account dashboard-content pl-50">
                            <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0">Hello {{Auth::user()->name }} !</h3>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0">Your Orders</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Order ID.</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($orders as $order)
                                                    <tr>
                                                        <td>{{$order->id}}</td>
                                                        <td>{{$order->created_at}}</td>
                                                        <td>@php
                                                                $status = '';
                                                            switch ($order->status) {
                                                                case 1:
                                                                    $status = 'Pending';
                                                                    break;
                                                                case 2:
                                                                    $status = 'Processing';
                                                                    break;
                                                                case 3:
                                                                    $status = 'On Hold';
                                                                    break;
                                                                case 4:
                                                                    $status = 'Confirmed';
                                                                    break;
                                                                case 5:
                                                                    $status = 'Completed';
                                                                    break;
                                                                case 6:
                                                                    $status = 'Canceled';
                                                                    break;
                                                                case 7:
                                                                    $status = 'Failed';
                                                                    break;
                                                                default:
                                                                    $status = 'Unknown';
                                                                    break;
                                                                }
                                                            @endphp
                                                                <span>{{ $status }}</span>
                                                        </td>
                                                        <td>{{$order->net_total}}</td>
                                                        <td><a href="{{route('pages.customer-invoice', $order->id)}}" class="btn-small d-block">View</a></td>
                                                    </tr>
                                                    @endforeach
                                                
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0">Orders tracking</h3>
                                    </div>
                                    <div class="card-body contact-from-area">
                                        <p>To track your order please enter your OrderID in the box below and press "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <form class="contact-form-style mt-30 mb-50" action="#" method="post">
                                                    <div class="input-style mb-20">
                                                        <label>Order ID</label>
                                                        <input name="order-id" placeholder="Found in your order confirmation email" type="text" />
                                                    </div>
                                                    <div class="input-style mb-20">
                                                        <label>Billing email</label>
                                                        <input name="billing-email" placeholder="Email you used during checkout" type="email" />
                                                    </div>
                                                    <button class="submit submit-auto-width" type="submit">Track</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                <div class="row">
                                    <form method="POST" action="{{ route('update.user-details', Auth::user()->id) }}" >
                                        @csrf
                                        @method('PUT')
                                        <div class="col-lg-6">
                                            <div class="card mb-3 mb-lg-0">
                                                <div class="card-header">
                                                    <h3 class="mb-0">Shipping Address</h3>
                                                </div>
                                                <div class="card-body">
                                                    <input type="text" name="address" value="{{ Auth::user()->address }}" placeholder="Enter your address">
                                                    
                                                </div>
                                                <div class="card-body">
                                                    <select id="division_id" class="form-control" name="division_id" placeholder="Division.." required value="{{ Auth::user()->division_id }}">
                                                        <option value="">Select Division</option>
                                                        @foreach($divisions as $division)
                                                            <option value="{{ $division->id }}" @if(Auth::user()->division_id == $division->id) selected @endif>{{ $division->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    
                                                </div>
                                                <div class="card-body">
                                                    <select id="district_id" class="form-control " name="district_id" placeholder="District.. *"required value="{{ Auth::user()->district_id }}">
                                                        <option value="">Select district</option>
                                                    </select>
                                                </div>
                                                <div class="card-body">
                                                    <select id="thana_id" class="form-control" name="thana_id" placeholder="Thana/Upzilla..*" required value="{{ Auth::user()->thana_id }}">
                                                        <option value="">Select thana/upzilla </option>
                                                    </select>
                                                </div>
                                                <div class="card-body">
                                                    <input type="text" name="post_code" value="{{ Auth::user()->post_code }}" placeholder="Post Code...">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card mb-3 mb-lg-0">
                                                <div class="card-header">
                                                    <h3 class="mb-0">Phone Number: </h3>
                                                </div>
                                                <div class="card-body">
                                                    <input type="text" name="phone_number" value="{{ Auth::user()->phone_number }}" placeholder="Enter your phone number">
                            
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card mb-3 mb-lg-0">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Account Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <p>Already have an account? <a href="page-login.html">Log in instead!</a></p>
                                        
                                            <div class="row">
                                               
                                                <form action="{{ route('update.password') }}" method="POST">
                                                    @csrf
                                                <div class="form-group col-md-12">
                                                    <label>Email Address <span class="required">*</span></label>
                                                    <input required="" class="form-control" name="email" type="email" value="{{Auth::user()->email }}"/>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Current Password <span class="required">*</span></label>
                                                    <input required="" class="form-control" name="current_password" type="password" />
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>New Password <span class="required">*</span></label>
                                                    <input required="" class="form-control" name="new_password" type="password" />
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Confirm Password <span class="required">*</span></label>
                                                    <input required="" class="form-control" name="confirm_password" type="password" />
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
<script>

    document.getElementById('division_id').addEventListener('change', function() {
        var divisionId = this.value;
        var districtDropdown = document.getElementById('district_id');
        districtDropdown.innerHTML = ''; // Clear existing options

        var defaultOption = document.createElement('option');
        defaultOption.value = 0;
        defaultOption.text = 'Select your district';
        districtDropdown.add(defaultOption);

        if (divisionId) {
            fetch('/get-districts/' + divisionId)
                .then(response => response.json())
                .then(data => {
                    console.log(data); 
                    data.forEach(district => {    //receiving array of districts
                        var option = document.createElement('option');
                        option.value = district.id;
                        option.text = district.name;
                        districtDropdown.add(option);
                    });
    
                });
        }
    });
</script>
<script>
    document.getElementById('district_id').addEventListener('change', function() {
        var districtId = this.value;
        var thanaDropdown = document.getElementById('thana_id');
        thanaDropdown.innerHTML = ''; // Clear existing options

        var defaultOption = document.createElement('option');
        defaultOption.value = 0;
        defaultOption.text = 'Select your thana';
        thanaDropdown.add(defaultOption);
    
        if (districtId) {
            fetch('/get-thanas/' + districtId)
                .then(response => response.json())
                .then(data => {
                    console.log(data); 
                    data.forEach(thana => {    //receiving array of thanas
                        var option = document.createElement('option');
                        option.value = thana.id;
                        option.text = thana.name;
                        thanaDropdown.add(option);
                    });
    
                });
        }
    });
</script>

@endsection