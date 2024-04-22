<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Roboto, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .invoice {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            display: flex;
            justify-content: flex-end; /* Align to the right */
            margin-bottom: 20px;
        }

        .invoice-header h3 {
            margin: 0;
            color: #333;
            text-align: right;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .invoice-table th,
        .invoice-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .invoice-table th {
            background-color: #f2f2f2;
        }

        .invoice-subtotal {
    margin-top: 5px;
    text-align: right;
}

.invoice-subtotal span {
    display: inline-block;
    font-size: 12px
}
.text {
            margin-bottom: 5px;
            font-size: 10px;
        }
.text-1{
    margin-bottom: 5px;
            font-size: 10px;
            text-align: right;

}

.col-lg-4 {
            width: calc(33.33% - 20px); /* 33.33% width with spacing */
            margin-bottom: 5px;
            
            background-color: transparent; 
            box-sizing: border-box;
            font-size: 10px;
            
        }

        .text-brand {
           margin-bottom: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="invoice">
        <table>
            <tr>
                <td class="title">
                    <img
                        src="assets/assets/imgs/theme/logo.svg"
                    />
                </td>
            </tr>
        </table>

        <div class="invoice-header">
            <h3>Invoice</h3>
        </div>
        <div class="text-1">
            <strong class="text-brand">{{$order->name}}</strong> <br />
            {{$order->address}}, Pallabi,  Dhaka<br>
            <abbr title="Email">Email: </abbr>{{$order->email}}
        </div>

        <hr style="height:2px;border-width:0;color:gray;background-color:gray"> 
        <div class="col-lg-4">
            <div>
            <strong class="text-brand"> Invoice No:</strong> {{$order->inv_id}}
            </div>
            <div>
            <strong class="text-brand" > Issue Date:</strong> {{$date}}
            </div>
            <div>
            @if($order->payment_method==1)
            <strong class="text-brand"> Payment Method:</strong> Cash on Delivery
            @else
            <strong class="text-brand"> Payment Method:</strong> Online Payment
            @endif
            </div>
        </div>
        <hr style="height:2px;border-width:0;color:gray;background-color:gray"> 
        
        
       
        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Product name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $key => $cartItem)
                    @php
                        $product = \App\Models\Product::firstWhere('id', $cartItem->product_id);
                    @endphp
                <tr>
                    <td> {{ $product->name }}</td>
                    <td>{{$cartItem->quantity}}</td>
                    <td>Tk. {{ $cartItem->unit_price }}</td>
                    <td>Tk. {{$cartItem->unit_price * $cartItem->quantity}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="invoice-subtotal">
            <span> Total:  Tk. {{$order->total_price}}</span>
        </div>
        <div class="invoice-subtotal">
            <span>Discount:  Tk. {{$order->discount_amount}}</span>
        </div>
        <div class="invoice-subtotal">
            <span>Shipping:  Tk. {{$order->delivery_fee}}</span>
        </div>
        <div class="invoice-subtotal">
            <b>Net Amount</b>  Tk. {{$order->net_total}}
        </div>

    </div>
</body>
</html>
