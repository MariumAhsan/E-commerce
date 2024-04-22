<?php

namespace App\Http\Controllers;



use App\Models\Order;
use App\Models\Cart;
use App\Models\Product;
use App\Models\District;
use App\Models\Division;
use App\Models\Thana;
use Mpdf\Mpdf;
// require_once __DIR__ . '/vendor/autoload.php';

use File;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $divisions= Division::all();
        $districts= District::all();
        return view('pages.checkout', compact('divisions','districts'));
    }

    public function getDistricts($division_id)
    {
        $districts = District::where('division_id', $division_id)->get();
        
        $districtsArray = $districts->map(function ($district) {
            return [
                'id' => $district->id,
                'name' => $district->name,
                ];
        });
        return response()->json( $districtsArray);
    }
    

    public function getThanas($district_id)
    {
        $thanas = Thana::where('district_id', $district_id)->get();

    $thanasArray = $thanas->map(function ($thana) {
        return [
            'id' => $thana->id,
            'name' => $thana->name,
        ];
    });

    return response()->json($thanasArray);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $order = Order::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'division_id' => $request->input('division_id'),
            'district_id' => $request->input('district_id'),
            'thana_id' => $request->input('thana_id'),
            'post_code' => $request->input('post_code'),
            'payment_method' => $request->input('payment_method'),
            'total_price' => $request->input('total_price'),
            'delivery_fee' => $request->input('delivery_fee'),
            'discount_amount' => $request->input('discount_amount'),
            'net_total'=> $request->input('net_total')
            
        ]);

        if($order->payment_method==1){
            
            $paddedOrderId = str_pad($order->id, 6, '0', STR_PAD_LEFT);
            //dd($paddedOrderId);
            // Assign the padded order ID as inv_id and save the order
            $order->inv_id = $paddedOrderId;
            //dd($order->inv_id );
            $order->save();
        }

        //dd($order);
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
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $orders= Order::all();
        //dd($orders);
        
        return view('pages.view-order-list', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->input('status');
        $order->save();
    
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
    public function order_details($order_id)
    {
        $order= Order::find($order_id);
        //dd($order);
        $cartItems= Cart::where('order_id', $order_id)->get();
        //dd($cartItems);

        $date= Carbon::today()->toDateString();
        //dd($date);

        return view('pages.show-order-details', compact('order', 'date', 'cartItems'));
    }
    public function show_invoice($order_id)
    {
        $order= Order::find($order_id);
        //dd($order);
        $cartItems= Cart::where('order_id', $order_id)->get();
        //dd($cartItems);

        $date= Carbon::today()->toDateString();
        //dd($date);

        return view('pages.customer-invoice', compact('order', 'date', 'cartItems'));
    }
    public function invoice($order_id)
    {
        
        // Create the mPDF document
        $pdf = new Mpdf( [
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_header' => '3',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'margin_footer' => '2',
        ]);     

        
        $order= Order::find($order_id);
        //dd($order);

        $date= Carbon::today()->toDateString();
        //dd($date);

        $cartItems= Cart::where('order_id', $order_id)->get();

        $pdf->WriteHTML(view('pages.download-invoice', compact('date','order','cartItems')));
        //$pdf->WriteHTML('<h1>Hello world!</h1>');

        return $pdf->Output('invoice.pdf', 'I');
        
    }

    
}
