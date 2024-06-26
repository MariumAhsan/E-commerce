@extends('layouts.shop-main')
@section('content')

<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop
                <span></span> Cart
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Your Cart</h1>
                <div class="d-flex justify-content-between">
                    @if ($cartItems->isEmpty())
                    <h6 class="text-body">There are <span class="text-brand"> no </span> products in your cart</h6>
                    @else
                    <h6 class="text-body">There are <span class="text-brand">{{$totalItems}}</span> products in your cart</h6>
                    <h6 class="text-body"><a href="#" class="text-muted"><i class="fi-rs-trash mr-5"></i>Clear Cart</a></h6>
                    @endif
                </div>
            </div>
        </div>
    
        @if ($cartItems->isEmpty())
            <p>Your cart is empty.</p>
            <div class="divider-2 mb-30"></div>
            <div class="cart-action d-flex justify-content-between">
                <a href="{{route('pages.shop-grid-left')}}" class="btn "><i class="fi-rs-arrow-left mr-10"></i>Continue Shopping</a>
            </div>  
        @else
            <div class="row">
                <div class="col-lg-8">
                    <div class="table-responsive shopping-summery">
                        <table class="table table-wishlist">
                            <thead>
                                <tr class="main-heading">
                                    <th class="custome-checkbox start pl-30">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="">
                                        <label class="form-check-label" for="exampleCheckbox11"></label>
                                    </th>
                                    <th scope="col" colspan="2">Product</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col" class="end">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $cartItem)
                                @php
                                    $product = \App\Models\Product::firstWhere('id', $cartItem->product_id);
                                @endphp
                                <tr class="pt-30">
                                    <td class="custome-checkbox pl-30">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                        <label class="form-check-label" for="exampleCheckbox1"></label>
                                    </td>
                                    <td class="image product-thumbnail pt-40"><img src="{{ asset('assets/images/' . $product->images->first()->image) }}" alt="Image" width="150" height="100"></td>
                                    <td class="product-des product-name">
                                        <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="shop-product-right.html">{{$product->name}}</a></h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width:90%">
                                                </div>
                                            </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                </td>
                                <td class="price" data-title="Price">
                                    <h4 class="text-body">Tk.{{ $cartItem->unit_price }}</h4>
                                </td>
                                <form action="{{ route('carts.update', $cartItem->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <td class="detail-info" data-title="Stock">
                                    <div class="detail-extralink mr-15">
                                        <input type="hidden" name="product_id" value="{{ $cartItem->product_id }}">
                                        <input type="number" name="quantity" value="{{ $cartItem->quantity }}" min="1" style="width: 150px;">
                                    </div>
                                </td>
                                <td class="action text-center" data-title="Update">
                                    <div class="mr-15">
                                        <button type="submit" class="btn btn-light btn-sm">Update</button>
                                    </div>
                                </td>
                                </form>
                                <td class="price" data-title="Price">
                                    <h4 class="text-brand">Tk.{{ $cartItem->unit_price * $cartItem->quantity }}</h4>
                                </td>
                                <td class="action text-center" data-title="Remove">
                                    <form action="{{ route('carts.destroy', $cartItem->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-light btn-sm "><i class="fi-rs-trash"></i></button>
                                    </form>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    </div>
                <div class="divider-2 mb-30"></div>
                <div class="cart-action d-flex justify-content-between">
                    <a href="{{route('pages.shop-grid-left')}}" class="btn "><i class="fi-rs-arrow-left mr-10"></i>Continue Shopping</a>
                </div>  
                </div>

                <div class="col-lg-4">
                <div class="border p-md-4 cart-totals ml-30">
                    <div class="table-responsive">
                        <table class="table no-border">
                            <tbody>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Total Amount: </h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">Tk.{{$totalPrice}}</h4>
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
                    <a href="/checkout" class="btn mb-20 w-100">Proceed To CheckOut<i class="fi-rs-sign-out ml-15"></i></a>
                </div>
                </div>
            </div>
        @endif  
    </div>
</main>
@endsection