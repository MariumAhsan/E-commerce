<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\Order;
use App\Models\Cart;
class SslCommerzPaymentController extends Controller
{

   
    public function index(Request $request)
    {
        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $post_data = array();
        $post_data['total_amount'] = $request->input('net_total'); # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $request->input('name');
        $post_data['cus_email'] = $request->input('email');
        $post_data['cus_add1'] = $request->input('address');
        $post_data['cus_postcode'] = $request->input('post_code');
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] =  $request->input('phone_number');
       

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        #Before  going to initiate the payment order status need to insert or update as Pending.
        if($request->input('payment_method')==1){
        $update_product = DB::table('orders')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'name' => $post_data['cus_name'],
                'email' => $post_data['cus_email'],
                'user_id' => auth()->user()->id,
                'phone_number' => $post_data['cus_phone'],
                'division_id' => $request->input('division_id'),
                'district_id' => $request->input('district_id'),
                'thana_id' => $request->input('thana_id'),
                'post_code' => $request->input('post_code'),
                'net_total' => $post_data['total_amount'],
                'status' => '1',
                'address' => $post_data['cus_add1'],
                'payment_method' => $request->input('payment_method'),
                'currency' => $post_data['currency'],
                'total_price' => $request->input('total_price'),
                'delivery_fee' => $request->input('delivery_fee'),
                'discount_amount' => $request->input('discount_amount'),
                'transaction_id'=>$post_data['tran_id'],
            ]);

            $order= Order::orderBy('id','desc')->first();
            //dd($order);
            $paddedOrderId = str_pad($order->id, 6, '0', STR_PAD_LEFT);
            //dd($paddedOrderId);
            // Assign the padded order ID as inv_id and save the order
            
            $order->inv_id = $paddedOrderId;
            //
            $order->save();
            
            if(auth()->check()){
                $user_id= auth()->user()->id;
                $cartItems = Cart::where('user_id', $user_id)->whereNull('order_id')->get();
                foreach ($cartItems as $cartItem) {
                    $cartItem->order_id = $order->id;
                    $cartItem->save();
                }
            
            }else{
                $ip_address = request()->ip();
                $cartItems = Cart::where('ip_address', $ip_address)->whereNull('user_id')->whereNull('order_id')->get();
                foreach ($cartItems as $cartItem) {
                    $cartItem->order_id = $order->id;
                    $cartItem->save();
                }
            }

            return redirect()->route('pages.customer-invoice', $order->id)->with([
                'message' => 'Order has been placed successfully.',
                'alert-type' => 'success'
            ]);

        }else{
            $update_product = DB::table('orders')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'name' => $post_data['cus_name'],
                'email' => $post_data['cus_email'],
                'user_id' => auth()->user()->id,
                'phone_number' => $post_data['cus_phone'],
                'division_id' => $request->input('division_id'),
                'district_id' => $request->input('district_id'),
                'thana_id' => $request->input('thana_id'),
                'post_code' => $request->input('post_code'),
                'net_total' => $post_data['total_amount'],
                'status' => '1',
                'address' => $post_data['cus_add1'],
                'payment_method' => $request->input('payment_method'),
                'currency' => $post_data['currency'],
                'total_price' => $request->input('total_price'),
                'delivery_fee' => $request->input('delivery_fee'),
                'discount_amount' => $request->input('discount_amount'),
                'transaction_id'=>$post_data['tran_id'],
            ]);

            $order= Order::orderBy('id','desc')->first();
            //dd($order);
            $paddedOrderId = str_pad($order->id, 6, '0', STR_PAD_LEFT);
            //dd($paddedOrderId);
            // Assign the padded order ID as inv_id and save the order
            
            $order->inv_id = $paddedOrderId;
            //
            $order->save();


        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();

        }

        
       }
       

    }


    public function success(Request $request)
    {
        ///echo "Transaction is Successful";
        

        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        $sslc = new SslCommerzNotification();

        #Check order status in order tabel against the transaction id or order id.
        $order_details = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('id','transaction_id', 'status', 'currency', 'net_total')->first();

        if ($order_details->status == '1') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

            if ($validation) {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                */
                $order= Order::orderBy('id','desc')->first();
                //dd($order);

                $update_product = Order::where('transaction_id', $tran_id)
                                        ->update(['status' => '2','paid_amount' => $request->input('amount')]);

                                        
                
                                        if(auth()->check()){
                                            $user_id= auth()->user()->id;
                                            $cartItems = Cart::where('user_id', $user_id)->whereNull('order_id')->get();
                                            foreach ($cartItems as $cartItem) {
                                                $cartItem->order_id = $order->id;
                                                $cartItem->save();
                                            }
                                        
                                        }else{
                                            $ip_address = request()->ip();
                                            $cartItems = Cart::where('ip_address', $ip_address)->whereNull('user_id')->whereNull('order_id')->get();
                                            foreach ($cartItems as $cartItem) {
                                                $cartItem->order_id = $order->id;
                                                $cartItem->save();
                                            }
                                        }

                                      
                    return redirect()->route('pages.customer-invoice', $order_details->id)->with([
                        'message' => 'Payment successful',
                        'alert-type' => 'success'
                    ]);
            }
        } else if ($order_details->status == '2' || $order_details->status == '5') {
            /*
             That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            return redirect()->route('pages.customer-invoice', $order_details->id)->with([
                'message' => 'Payment already done!',
                'alert-type' => 'info'
            ]);
        } else {
            #That means something wrong happened. You can redirect customer to your product page.
            return redirect()->route('pages.shop-grid-left')->with([
                'message' => 'Invalid Action!',
                'alert-type' => 'danger'
            ]);
        }


    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_details = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('id','transaction_id', 'status', 'currency', 'net_total')->first();

        if ($order_details->status == '1') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => '7']);
           
                return redirect()->route('pages.checkout')->with([
                    'message' => 'Payment Unsucessful!',
                    'alert-type' => 'danger'
                ]);
        } else if ($order_details->status == '2' || $order_details->status == '5') {
            return redirect()->route('pages.customer-invoice', $order_details->id)->with([
                'message' => 'Payment has been done already!',
                'alert-type' => 'warning'
            ]);
        } else {
            return redirect()->route('pages.shop-grid-left')->with([
                'message' => 'Invalid Action!',
                'alert-type' => 'danger'
            ]);
        }

    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_details = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'net_total')->first();

        if ($order_details->status == '1') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => '6']);
            echo "Transaction is Cancel";
        } else if ($order_details->status == '2' || $order_details->status == '5') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }


    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'currency', 'amount')->first();

            if ($order_details->status == 'Pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->amount, $order_details->currency);
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Processing']);

                    echo "Transaction is successfully Completed";
                }
            } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {

                #That means Order status already updated. No need to udate database.

                echo "Transaction is already successfully Completed";
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                echo "Invalid Transaction";
            }
        } else {
            echo "Invalid Data";
        }
    }

}
