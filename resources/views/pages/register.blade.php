@extends('layouts.shop-main')
@section('content')
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Pages <span></span> My Account
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                    <div class="row">
                        <div class="col-lg-6 col-md-8">
                            <div class="login_wrap widget-taber-content background-white">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h1 class="mb-5">Create an Account</h1>
                                        <p class="mb-30">Already have an account? <a href="/login">Login</a></p>
                                    </div>
                                    <form action="{{route('register')}}" method="POST">
                                        @csrf
                                        <div>
                                            <x-text-input id="name" class="block mt-1 w-full" type="text" placeholder="Username" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>
                                        <div class="mt-4">
                                            <x-text-input id="email" class="block mt-1 w-full" type="email" placeholder="E-mail" name="email" :value="old('email')" required autocomplete="username" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                        <div class="mt-4">
                                        
                                            <x-text-input id="password" class="block mt-1 w-full"
                                                            type="password" placeholder="Password"
                                                            name="password"
                                                            required autocomplete="new-password" />
                                
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                        <div class="mt-4 mb-4">
                                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                                            type="password" placeholder="Confirm Password"
                                                            name="password_confirmation" required autocomplete="new-password" />
                                
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>
                                        <div class="login_footer form-group mb-50">
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" name="terms" id="exampleCheckbox12" value="" required />
                                                    <label class="form-check-label" for="exampleCheckbox12"><span>I agree to terms &amp; Policy.</span></label>
                                                </div>
                                            </div>
                                            <a href="page-privacy-policy.html"><i class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a>
                                        </div>
                                        <div class="form-group mb-30">
                                            <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold" name="register">Submit &amp; Register</button>
                                        </div>
                                    </form>
                                    <p class="font-xs text-muted"><strong>Note:</strong>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 pr-30 d-none d-lg-block">
                            <div class="card-login mt-115">
                                <a href="#" class="social-login facebook-login">
                                    <img src="{{asset('assets')}}/assets/imgs/theme/icons/fb-white.svg" alt="" />
                                    <span>Continue with Facebook</span>
                                </a>
                                <a href="#" class="social-login google-login">
                                    <img src="{{asset('assets')}}/assets/imgs/theme/icons/icon-google.svg" alt="" />
                                    <span>Continue with Google</span>
                                </a>
                                <a href="#" class="social-login apple-login">
                                    <img src="{{asset('assets')}}/assets/imgs/theme/icons/icon-apple-white.svg" alt="" />
                                    <span>Continue with Apple</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection