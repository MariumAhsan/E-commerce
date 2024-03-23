<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, $product_id)
    {

        $product = Product::with(['images' => function ($query) {
                            $query->first();
                        }])->find($product_id);
        
        $unit_price = $product->offer_price;
        $quantity = $request->input('quantity', 1);
        
        if (Auth::check()) {
            
            $user_id = Auth::id();
            $ip_address = $request->ip();
        
            $cartItem = Cart::where('product_id', $product_id)->where('user_id', $user_id)->first();
                      
            if (!$cartItem) {
            
                Cart::create([
                        'user_id' => $user_id,
                        'ip_address' => $ip_address,
                        'product_id' => $product_id,
                        'unit_price' => $unit_price,
                        'quantity' => $quantity,
                    ]);
                
            } 

            $cartItems = Cart::where('user_id', $user_id)->get();
            //dd($cartItems);
            return view('pages.cart', compact('product','cartItems'));   


        
        } else {
            
            $user_id = null;
            $ip_address = $request->ip();
            $cartItem = Cart::where('product_id', $product_id)->where('ip_address', $ip_address)->first();
        
                if (!$cartItem) {
                    Cart::create([
                        'user_id' => $user_id,
                        'ip_address' => $ip_address,
                        'product_id' => $product_id,
                        'unit_price' => $unit_price,
                        'quantity' => $quantity,
                     ]);

                } 
                
                $cartItems = Cart::where('ip_address', $ip_address)->get();
                //dd($cartItems);
            
                return view('pages.cart', compact('product','cartItems'));
            
        }
       
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
