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
