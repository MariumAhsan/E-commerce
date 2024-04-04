<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
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
            'status' => 'required|integer|in:0,1',
            'type' => 'required|integer|in:0,1',
        ]);
    
        
        $coupon = new Coupon();
    
        // Assign values to the coupon properties
        $coupon->description = $validatedData['description'];
        $coupon->code = $validatedData['code'];
        $coupon->discount_amount = $validatedData['discount_amount'];
        $coupon->status = $validatedData['status'];
        $coupon->type = $validatedData['type'];
    
        // Save the coupon
        $coupon->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        //
    }
}
