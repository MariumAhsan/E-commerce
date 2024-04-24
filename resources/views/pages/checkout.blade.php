@extends('layouts.shop-main')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop
                <span></span> Checkout
            </div>
        </div>
    </div>
    @php
        use App\Models\Cart;
        use App\Models\Product;
        use App\Models\Image;
            if(auth()->check()){
                $user_id= auth()->user()->id;
                $cartItems = Cart::where('user_id', $user_id)->get();
                $totalItem= count($cartItems);
                $totalPrice = 0;
                $discountAmount = 0;
                $deliveryFee= 70;
                foreach ($cartItems as $item) {
                    $totalPrice += $item->unit_price * $item->quantity;}
            
            }else{
                $ip_address = request()->ip();
                $cartItems = Cart::where('ip_address', $ip_address)->whereNull('user_id')->get();
                $totalItem= count($cartItems);
                $totalPrice = 0;
                $discountAmount = 0;
                $deliveryFee= 70;
                foreach ($cartItems as $item) {
                    $totalPrice += $item->unit_price * $item->quantity;}
                }
    @endphp
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Checkout</h1>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body">There are <span class="text-brand">{{$totalItem}}</span> products in your cart</h6>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-8">
                <div class="row mb-50">
                    <div class="col-lg-6 mb-sm-15 mb-lg-0 mb-md-3">
                        <div class="toggle_info">
                            <span><i class="fi-rs-user mr-10"></i><span class="text-muted font-lg">Already have an account?</span> <a href="#loginform" data-bs-toggle="collapse" class="collapsed font-lg" aria-expanded="false">Click here to login</a></span>
                        </div>
                        <div class="panel-collapse collapse login_form" id="loginform">
                            <div class="panel-body">
                                <p class="mb-30 font-sm">If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                                <form method="post">
                                    <div class="form-group">
                                        <input type="text" name="email" placeholder="Username Or Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="login_footer form-group">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="remember" value="">
                                                <label class="form-check-label" for="remember"><span>Remember me</span></label>
                                            </div>
                                        </div>
                                        <a href="#">Forgot password?</a>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-md" name="login">Log in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form id="applyCouponForm" class="apply-coupon">
                            <input type="text" name="code" id="couponCode" placeholder="Coupon Code...">
                            <button class="btn  btn-md" type="submit" id="applyCouponBtn">Apply</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <h4 class="mb-30">Billing Details</h4>
            <form action="{{route('pay')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <input type="text" required="" name="name" placeholder="Name *" value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="phone_number" placeholder="Phone *" value="{{ Auth::user()->phone_number }}">
                            </div>
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="email" placeholder="Email address *" value="{{ Auth::user()->email }}">
                            </div> 
                        </div>  
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input type="text" name="address" required="" placeholder="Address *" value="{{ Auth::user()->address }}">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" name="post_code" required="" placeholder="Postal code *" value="{{ Auth::user()->post_code }}">
                            </div>
                        </div>
                        <div class="row shipping_calculator">     
                            <div class="form-group">
                                <select id="division_id" class="form-control" name="division_id" placeholder="Division..*" required>
                                    <option value="">Select Division</option>
                                    @foreach($divisions as $division)
                                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <select id="district_id" class="form-control " name="district_id" placeholder="District.. *"required>
                                    <option value="">Select district</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select id="thana_id" class="form-control" name="thana_id" placeholder="Thana/Upzilla..*" required>
                                    <option value="">Select thana/upzilla </option>
                                </select>
                            </div>
                        </div>                        
                    </div>
                </div>
            <div class="col-lg-4">
                <div class="payment ml-30">
                    <h4 class="mb-30">Payment</h4>
                    <div class="payment_option">
                        <div class="custome-radio">
                            <input class="form-check-input" required="" type="radio" name="payment_method" id="exampleRadios4"  value="1">
                            <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">Cash on delivery</label>
                        </div>
                        <div class="custome-radio">
                            <input class="form-check-input" required="" type="radio" name="payment_method" id="exampleRadios5" value="2">
                            <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Online Getway</label>
                        </div>
                    </div>
                    <div class="payment-logo d-flex">
                        <img class="mr-15" src="{{asset('assets')}}/assets/imgs/theme/icons/payment-paypal.svg" alt="">
                        <img class="mr-15" src="{{asset('assets')}}/assets/imgs/theme/icons/payment-visa.svg" alt="">
                        <img class="mr-15" src="{{asset('assets')}}/assets/imgs/theme/icons/payment-master.svg" alt="">
                        <img src="{{asset('assets')}}/assets/imgs/theme/icons/payment-zapper.svg" alt="">
                    </div>
                </div>
                
                <div class="border p-md-4 cart-totals ml-30">
                    <div class="table-responsive">
                        <table class="table no-border">
                            <tbody>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Amount:      Tk.</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <input type="text" id="totalPrice" name="total_price" class="text-brand text-end" value="{{$totalPrice}}" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Discount Amount:     Tk.</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <input type="text" id="discountAmount"  name="discount_amount" class="text-brand text-end"  name="discount_amount" value="{{$discountAmount}}" readonly>
                                    </td>
                                </tr>
                                <tr>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Delivery Fee:    Tk.</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <input type="text" id="deliveryFee" class="text-brand text-end"  name="delivery_fee" value="{{$deliveryFee}}" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Total Amount:    Tk.</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <input type="text" id="netTotal" class="text-brand text-end"  name="net_total" value="{{$totalPrice+$deliveryFee}}" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="col" colspan="2">
                                        <div class="divider-2 mt-10 mb-10"></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-fill-out btn-block mt-30">Place an Order<i class="fi-rs-sign-out ml-15"></i></buttton>
                </div>
                </div>
            </form>
        </div>
    </div>
</main>

<script>

document.getElementById('division_id').addEventListener('change', function() {
    var divisionId = this.value;
    var districtDropdown = document.getElementById('district_id');
    districtDropdown.innerHTML = ''; // Clear existing options

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

    if (districtId) {
        fetch('/get-thanas/' + districtId)
            .then(response => response.json())
            .then(data => {
                console.log(data); 
                data.forEach(thana => {    //receiving array of districts
                    var option = document.createElement('option');
                    option.value = thana.id;
                    option.text = thana.name;
                    thanaDropdown.add(option);
                });

            });
    }
});
</script>
<script>

    document.getElementById('applyCouponForm').addEventListener('submit', function(event) {
        event.preventDefault();
        var couponCode = document.getElementById('couponCode').value;
        fetch('/apply-coupon', {
            method: 'POST',
            body: JSON.stringify({ code: couponCode }),
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                alert(data.error);
            } else {
                
                document.getElementById('netTotal').value =  data.netTotal;
                document.getElementById('discountAmount').value = data.discountAmount;
            }
        })
        .catch(error => console.error('Error:', error));
    });
</script>

@endsection