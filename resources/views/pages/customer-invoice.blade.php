@extends('layouts.shop-main')
@section('content')
<main class="main">
    <div class="invoice invoice-content invoice-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-inner">
                        <div class="invoice-info" id="invoice_wrapper">
                            <div class="invoice-header">
                                <div class="invoice-icon">
                                    <img src="assets/imgs/theme/icons/icon-invoice.svg" class="img-fluid" alt="">
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="logo">
                                            <a href="index.html" class="mr-20"><img src="{{asset('assets')}}/assets/imgs/theme/logo.svg" alt="logo" /></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <h2 class="mb-0">INVOICE</h2>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="text">
                                            75/2, Indira Road, Tejgaon, Dhaka<br />
                                            <abbr title="Phone">Phone:</abbr> (+880) 14564-7890<br />
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <strong class="text-brand">{{$order->name}}</strong> <br />
                                        {{$order->address}}, Gulshan, Dhaka<br>
                                        <abbr title="Email">Email: </abbr><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="cba5ada48bbcaea9b1e5a8a4a6e5bba7">{{$order->email}}</a>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-12">
                                        <div class="hr mb-10"></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <strong class="text-brand"> Invoice No:</strong> {{$order->inv_id}}
                                    </div>
                                    <div class="col-lg-4">
                                        <strong class="text-brand"> Issue Date:</strong>  {{ $date }}
                                    </div>
                                    <div class="col-lg-4">
                                        @if($order->payment_method==1)
                                        <strong class="text-brand"> Payment Method:</strong> Cash on Delivery
                                        @else
                                        <strong class="text-brand"> Payment Method:</strong> Online Payment
                                        @endif
                                    </div>
                                    <div class="col-12">
                                        <div class="hr mt-10"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-center">
                                <div class="table-responsive">
                                    <table class="table table-striped invoice-table">
                                        <thead class="bg-active">
                                            <tr>
                                                <th>Item Item</th>
                                                <th class="text-center">Unit Price</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-right">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cartItems as $key => $cartItem)
                                                    @php
                                                        $product = \App\Models\Product::firstWhere('id', $cartItem->product_id);
                                                    @endphp
                                            <tr>
                                                <td>
                                                    <div class="item-desc-1">
                                                        <span>{{$product->name}}</span>
                                                        <small>SKU: {{$product->sku_code}}</small>
                                                    </div>
                                                </td>
                                                <td class="text-center">Tk. {{ $cartItem->unit_price }}</td>
                                                <td class="text-center">{{$cartItem->quantity}}</td>
                                                <td class="text-right">Tk. {{$cartItem->unit_price * $cartItem->quantity}}</td>
                                               
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="3" class="text-end f-w-600">SubTotal</td>
                                                <td class="text-right">Tk. {{$order->total_price}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-end f-w-600">Discount</td>
                                                <td class="text-right">Tk. {{$order->discount_amount}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-end f-w-600">Shipping</td>
                                                <td class="text-right">Tk. {{$order->delivery_fee}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-end f-w-600">Grand Total</td>
                                                <td class="text-right f-w-600">Tk. {{$order->net_total}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="invoice-bottom pb-80">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="mb-15"></h6>
                                        <p class="font-sm">
                                            <strong>Issue date:</strong>{{$date}}<br />
                                            <strong></strong><br />
                                    
                                        </p>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <h6 class="mb-15">Total Amount</h6>
                                        <h3 class="mt-0 mb-0 text-brand">Tk. {{$order->net_total}}</h3>
                                        <p class="mb-0 text-muted">Shipping Included</p>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-12">
                                        <div class="hr mt-30 mb-30"></div>
                                        <p class="mb-0 text-muted"><strong>Note:</strong>This is computer generated receipt and does not require physical signature.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-btn-section clearfix d-print-none">
                            <a href="javascript:window.print()" class="btn btn-lg btn-custom btn-print hover-up"> <img src="{{asset('assets')}}/assets/imgs/theme/icons/icon-print.svg" alt="" /> Print </a>
                            <a href="{{route('download.invoice',$order->id)}}" id="invoice_download_btn" class="btn btn-lg btn-custom btn-download hover-up"> <img src="{{asset('assets')}}/assets/imgs/theme/icons/icon-download.svg" alt="" /> Download </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection