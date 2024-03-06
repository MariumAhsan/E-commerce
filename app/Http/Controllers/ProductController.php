<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use File;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        
        return view('pages.add-product', compact('categories', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'subcategory_id' => 'required',
    ]);

    // Upload image
    $image = $request->file('image');
    $imgName = time() . '_' . $image->getClientOriginalName(); // Unique image name to avoid conflicts
    $image->move(public_path('assets/images'), $imgName);

    // Create the product
    $product = Product::create([            //using create already saves the data into the DB
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'price' => $request->input('price'),
        'image' => $imgName, // Save path
        'slug' => Str::slug($request->input('name')),
        'quantity' => $request->input('quantity'),
        'subcategory_id' => $request->input('subcategory_id'),
    ]);

    
    
 
    return redirect()->back();
}


    /**
     * Display the specified resource.
     */
    public function getSubCategories($category_id)
    {
        $subcategories = Subcategory::where('category_id', $category_id)->get();

    $subcategoriesArray = $subcategories->map(function ($subcategory) {
        return [
            'id' => $subcategory->id,
            'name' => $subcategory->name,
        ];
    });

    return response()->json($subcategoriesArray);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
