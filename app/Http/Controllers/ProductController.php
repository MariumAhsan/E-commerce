<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Image;
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
    
    //$imgNames = array();

    // Upload image
    /**if ($request->image) {        
        foreach ($request->file('image') as $image) {
            
            $imgName = time() . '_' . $image->getClientOriginalName();
         
            
            $image->move(public_path('assets/images'), $imgName);
            
            // Add the image name to the array
            $imgNames[] = $imgName;
            
        }
    }

    */
    
   // dd($imgNames);
   //$productTags = json_encode($request->input('product_tags'));

    // Create the product
    $product = Product::create([
        'name' => $request->input('name'),
        'short_description' => $request->input('short_description'),
        'long_description' => $request->input('long_description'),
        'price' => $request->input('price'),
        'offer_price' => $request->input('offer_price'),
        'quantity' => $request->input('quantity'),
        'is_featured' => $request->input('is_featured'),
        'product_type' => $request->input('product_type'),
        'slug' => Str::slug($request->input('name')),
        'subcategory_id' => $request->input('subcategory_id'),
        'mfg_date' => $request->input('mfg_date'),
        'exp_date' => $request->input('exp_date'),
        'sku_code' => $request->input('sku_code'),
        'product_tags' => $request->input('product_tags'),
        'additional_info' => $request->input('additional_info'),
        'status' => $request->input('status'),
    ]);
    
    if ($request->hasFile('image')) {
        foreach ($request->file('image') as $image) {
            $imagePath = time() . '.' . $image->getClientOriginalName();
            $image->move(public_path('assets/images'), $imagePath);
    
            $product->images()->create([
                'product_id' => $product->id,
                'image' => $imagePath,
            ]);
        }
    }
    




 
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
    public function show()
    {

        $productData = Product::orderBy('id', 'desc')->get();   // Sort by ID in descending order

        return view('pages.shop-grid-left', compact('productData'));
    }

    public function view_single_product($slug)
    {
    
      $temp = Product::where('slug', $slug)->first();
      $productId = $temp->id;

      $product = Product::with('images')->find($productId);
      $imageUrls = [];

      foreach ($product->images as $images) 
      {
        $imageUrls[] = $images->image;

      }

      $regularPrice = $product->price;
      $offerPrice = $product->offer_price;
      $discountAmount= $regularPrice-$offerPrice;
      $discountPercentage = intval(($discountAmount / $regularPrice) * 100);
      //dd($discountPercentage);
      //dd($imageUrls);
      return view('pages.single-product', compact('product','imageUrls','discountPercentage'));
    }
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
