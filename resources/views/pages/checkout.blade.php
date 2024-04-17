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
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Checkout</h1>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body">There are <span class="text-brand">3</span> products in your cart</h6>
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
                        <form method="post" class="apply-coupon">
                            <input type="text" name="code" placeholder="Coupon Code...">
                            <button class="btn  btn-md" type="submit" name="login">Apply Coupon</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <h4 class="mb-30">Billing Details</h4>
                    <form method="post">
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <input type="text" required="" name="name" placeholder="Name *">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="phone_number" placeholder="Phone *">
                            </div>
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="email" placeholder="Email address *">
                            </div> 
                        </div>  
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input type="text" name="address" required="" placeholder="Address *">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" name="post_code" required="" placeholder="Postal code *">
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
                            @error('thana_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>                        
                </div>
            </div>
            <div class="col-lg-4">
                <div class="payment ml-30">
                    <h4 class="mb-30">Payment</h4>
                    <div class="payment_option">
                        <div class="custome-radio">
                            <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios3" checked="">
                            <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#bankTranfer" aria-controls="bankTranfer">Direct Bank Transfer</label>
                        </div>
                        <div class="custome-radio">
                            <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios4" checked="">
                            <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">Cash on delivery</label>
                        </div>
                        <div class="custome-radio">
                            <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios5" checked="">
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
                                        <h6 class="text-muted">Amount: </h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">Tk.</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Delivery Fee: </h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">Tk.</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Total Amount: </h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">Tk.</h4>
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
                    <a href="#" class="btn btn-fill-out btn-block mt-30">Place an Order<i class="fi-rs-sign-out ml-15"></i></a>
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

@endsection