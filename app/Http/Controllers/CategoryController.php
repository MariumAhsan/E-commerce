<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
     {
         return view('layouts.shop');
     }
     public function index_cart()
     {
         return view('pages.cart');
     }
     public function index_checkout()
     {
         return view('pages.checkout');
     }
     public function index_shop_grid()
     {
         return view('pages.shop-grid-left');
     }
     public function index_single_product()
     {
         return view('pages.single-product');
     }
     public function index_register()
     {
         return view('pages.customer-register');
     }
     public function index_login()
     {
         return view('pages.customer-login');
     }
     
    public function create()
    {

        return view('pages.add-category');
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        
        ]);
    
        // Create Category
        $category = Category::create([            //using create already saves the data into the DB
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'slug' => Str::slug($request->input('name')),
           
        ]);
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
