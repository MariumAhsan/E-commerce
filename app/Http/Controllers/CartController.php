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
        $products = Product::with(['images' => function ($query) {
                            $query->first();
                        }])->find($product_id);
                    
        $unit_price = $products->offer_price;
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
                    
                } else{
                    $cartItem->update(['quantity' => $cartItem->quantity + $quantity]);
                }


                    return redirect()->back()->with([
                        'message' => 'Product added to cart successfully.',
                        'alert-type' => 'success'
                    ]);
                
            } 
            
            
            else {

            $user_id = null;
            $ip_address = $request->ip();
            $cartItem = Cart::where('product_id', $product_id)->where('ip_address', $ip_address)
                                ->whereNull('user_id')->first();
            
            //dd($cartItem);
                if (!$cartItem) {
                    Cart::create([
                        'user_id' => $user_id,
                        'ip_address' => $ip_address,
                        'product_id' => $product_id,
                        'unit_price' => $unit_price,
                        'quantity' => $quantity,
                     ]);

                } 
                else{
                    $cartItem->update(['quantity' => $cartItem->quantity + $quantity]);
                }
            
            return redirect()->back()->with([
                'message' => 'Product added to cart successfully.',
                'alert-type' => 'success'
            ]);   
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        if (Auth::check()) {
        
            $user_id = Auth::id();
            $ip_address = $request->ip();

            $cartItems = Cart::where('user_id', $user_id)->get();
            $totalItems = count($cartItems);

            $totalPrice = 0;
            foreach ($cartItems as $item) {
                    $totalPrice += $item->unit_price * $item->quantity;}

            return view('pages.cart', compact('cartItems', 'totalItems','totalPrice')); 
                
        }else{
            
            $ip_address = $request->ip();

            $cartItems = Cart::where('ip_address', $ip_address)->whereNull('user_id')->get();
            $totalItems = count($cartItems);
            $totalPrice = 0;
            foreach ($cartItems as $item) {
                $totalPrice += $item->unit_price * $item->quantity;}
           
            return view('pages.cart', compact('cartItems', 'totalItems','totalPrice'));   
        }
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
    public function update(Request $request, $cart_id)
    {
            $user_id = Auth::id();
            $ip_address = request()->ip();
    
            // Find the cart item by user_id or ip_address 
            $updateItem = Auth::check() ?
            Cart::where('user_id', $user_id)->where('id', $cart_id)->first() :
            Cart::where('ip_address', $ip_address)->where('id', $cart_id)->first();
            
    
            $updateItem ->update(['quantity' => $request->quantity]);
            
  
            $cartItems = Auth::check() ?
                Cart::where('user_id', $user_id)->get() :
                Cart::where('ip_address', $ip_address)->whereNull('user_id')->get();
    
            $totalItems = count($cartItems);
    
            $totalPrice = 0;
            foreach ($cartItems as $singleItem) {
                $totalPrice += $singleItem->unit_price * $singleItem->quantity;
            }
    
            return view('pages.cart', compact( 'cartItems', 'totalItems', 'totalPrice'));
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($cart_id) 
    {

        $user_id = Auth::id();
        $ip_address = request()->ip();

        // Find the cart item by user_id or ip_address 
        $deleteItem = Auth::check() ?
        Cart::where('user_id', $user_id)->where('id', $cart_id)->first() :
        Cart::where('ip_address', $ip_address)->where('id', $cart_id)->first();
        //dd($deleteItem);

        $deleteItem->delete();

        
        $cartItems = Auth::check() ?
            Cart::where('user_id', $user_id)->get() :
            Cart::where('ip_address', $ip_address)->whereNull('user_id')->get();

        $totalItems = count($cartItems);

        $totalPrice = 0;
        foreach ($cartItems as $singleItem) {
            $totalPrice += $singleItem->unit_price * $singleItem->quantity;
        }

            return view('pages.cart', compact('cartItems', 'totalItems', 'totalPrice'));
    }

    

}