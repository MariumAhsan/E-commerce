<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use App\Models\Product;
use App\Models\District;
use App\Models\Division;
use App\Models\Thana;
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();
        $cartItems = Auth::check() ?
        Cart::where('user_id', $user_id)->get() :
        Cart::where('ip_address', $ip_address)->get();

        $totalItems = Auth::check() ?
                Cart::where('user_id', $user_id)->count('user_id') :
                Cart::where('ip_address', $ip_address)->count('ip_address');

        dd($totalItems);
            $order = Order::create([
            'user_id'=> $user_id,
            'name' => $request->input('name'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'post_code' => $request->input('post_code'),
            'payment_option' => $request->input('payment_option'),
            'amount' => $request->input('amount'),
        ]);
       
    
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
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
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
