<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.add-coupon');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|string',
            'code' => 'required|string|unique:coupons',
            'discount_amount' => 'required|numeric',
            
        ]);
    
        
        $coupon = new Coupon();
    
        // Assign values 
        $coupon->description = $validatedData['description'];
        $coupon->code = $validatedData['code'];
        $coupon->discount_amount = $validatedData['discount_amount'];
        $coupon->status = $request->status;
        $coupon->type = $request->type;
    
        // Save the coupon
        $coupon->save();

        return redirect()->route('pages.show-coupon')->with([
            'message' => 'New coupon created !',
            'alert-type' => 'success'
        ]);   
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        $coupons= Coupon::all();
        //dd($coupons);
        return view('pages.show-coupon', compact('coupons'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $coupon_id )
    {
        $coupon = coupon::find($coupon_id);
        // dd($coupon); 
        return view('pages.update-coupon', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
       
        $coupon->code = $request->code;
        //dd($coupon->code);
        $coupon->discount_amount = $request->discount_amount;
        $coupon->status = $request->status;
        
        $coupon->save();


        return redirect()->route('pages.show-coupon')->with([
            'message' => 'Coupon updated successfully.',
            'alert-type' => 'success'
        ]);   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function remove( $coupon_id )
    {
        $coupon = Coupon::find($coupon_id); 
        $coupon->delete();
        //dd($coupon);
        return redirect()->back();
    }

    public function applyCoupon(Request $request) {
        $couponCode = $request->input('code');
        $coupon = Coupon::where('code', $couponCode)->where('status', 1)->first();
    
        if ($coupon) {
            
            $discountAmount = $coupon->discount_amount;
            if(auth()->check()){
                $user_id= auth()->user()->id;
                $cartItems = Cart::where('user_id', $user_id)->whereNull('order_id')->get();
                $totalItem= count($cartItems);
                $totalPrice = 0;
                foreach ($cartItems as $item) {
                    $totalPrice += $item->unit_price * $item->quantity;}
            
            }else{
                $ip_address = request()->ip();
                $cartItems = Cart::where('ip_address', $ip_address)->whereNull('user_id')->whereNull('order_id')->get();
                $totalItem= count($cartItems);
                $totalPrice = 0;
                foreach ($cartItems as $item) {
                    $totalPrice += $item->unit_price * $item->quantity;}
                
            }
            $deliveryFee=70;
            $netTotal=$totalPrice-$discountAmount+$deliveryFee;

            return response()->json([
                'netTotal' => $netTotal,
                'discountAmount' => $discountAmount
            ]);          
        } else {
            // Return error message if coupon is invalid
            return response()->json(['error' => 'Invalid coupon code'], 400);
        }
    }
}
