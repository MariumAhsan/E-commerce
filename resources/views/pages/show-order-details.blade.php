@extends('layouts.nav-sidebar')
@section('content')

<div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h4>
          <i class="fas fa-globe"></i> AdminLTE, Inc.
          <small class="float-right">Date: {{ $date }}</small>
        </h4>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong>Admin, Inc.</strong><br>
          795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Phone: (804) 123-5432<br>
          Email: info@almasaeedstudio.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong>{{$order->name}}</strong><br>
          {{$order->address}}<br>
          Pallabi, Dhaka - {{$order->post_code}}<br>
          Phone: {{$order->phone_number}}<br>
          Email: {{$order->email}}
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <form action="{{ route('update-order-details', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <b>Invoice #{{$order->inv_id}}</b><br>
        <b>Order ID:</b> {{$order->id}}<br>
        <div class="form-group">
        <b>Status </b><br>
        <select class="form-control col-sm-4" id="status" name="status">
          <option value="1">Pending</option>
          <option value="2">Processing</option>
          <option value="3">On Hold</option>
          <option value="4">Confirmed</option>
          <option value="5">Completed</option>
          <option value="6">Canceled</option>
          <option value="7">Failed</option>
        </select>
        <button type="submit" class="btn btn-sm btn-primary mt-1">Update </button>
        </div>
        </form>
        
        
       
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Sl.</th>
            <th>Product</th>
            <th>Qty</th>
            <th>Description</th>
            <th>Unit Price</th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($cartItems as $key => $cartItem)
              @php
                  $product = \App\Models\Product::firstWhere('id', $cartItem->product_id);
              @endphp
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$product->name}}</td>
                <td>{{ $cartItem->quantity }}</td>
                <td>{{$product->short_description}}</td>
                <td>Tk.{{ $cartItem->unit_price }}</td>
                <td>Tk.{{ $cartItem->unit_price * $cartItem->quantity }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
        <p class="lead">Payment Methods:</p>
        <img src="../../dist/img/credit/visa.png" alt="Visa">
        <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
        <img src="../../dist/img/credit/american-express.png" alt="American Express">
        <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
          plugg
          dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
        </p>
      </div>
      <!-- /.col -->
      <div class="col-6">

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td>Tk. {{$order->total_price}}</td>
            </tr>
            <tr>
              <th>Discount:</th>
              <td>Tk. {{$order->discount_amount}}</td>
            </tr>
            <tr>
              <th>Shipping:</th>
              <td>Tk. {{$order->delivery_fee}}</td>
            </tr>
            <tr>
              <th>Total:</th>
              <td>Tk. {{$order->net_total}}</td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
      <div class="col-12">
        <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
        <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
          Payment
        </button>
        <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
          <i class="fas fa-download"></i> Generate PDF
        </button>
      </div>
    </div>
  </div>
  
@endsection