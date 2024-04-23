<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ThanaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\CartController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.shop');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'admin')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [ProductController::class, 'index'])->name('pages.dashboard');
    Route::get('/add-product', [ProductController::class, 'create'])->name('pages.add-product');
    Route::get('/dashboard', [ProductController::class, 'index'])->name('pages.dashboard');
    Route::get('/add-category', [CategoryController::class, 'create'])->name('pages.add-category');
    Route::get('/add-subcategory', [SubCategoryController::class, 'create'])->name('pages.add-subcategory');

    Route::post('/store-product', [ProductController::class, 'store'])->name('product.store');
    Route::post('/store-category', [CategoryController::class, 'store'])->name('category.store');
    Route::post('/store-subcategory', [SubCategoryController::class, 'store'])->name('subcategory.store');
    
    Route::get('/add-division', [DivisionController::class, 'index'])->name('pages.add-division');
    Route::get('/add-district', [DistrictController::class, 'create'])->name('pages.add-district');
    Route::get('/add-thana', [ThanaController::class, 'create'])->name('pages.add-thana');
    
    Route::post('/store-division', [DivisionController::class, 'store'])->name('division.store');
    Route::post('/store-district', [DistrictController::class, 'store'])->name('district.store');
    Route::post('/store-thana', [ThanaController::class, 'store'])->name('thana.store');
    
    Route::get('/get-subcategories/{category_id}', [ProductController::class, 'getSubCategories']);

    Route::get('/add-coupon', [CouponController::class, 'index'])->name('pages.add-coupon');
    Route::post('/store-coupon', [CouponController::class, 'store'])->name('coupon.store');
    Route::get('/show-coupon', [CouponController::class, 'show'])->name('pages.show-coupon');
    Route::get('/view-order-list', [OrderController::class, 'show'])->name('pages.view-order-list');
    Route:: get('/order-details/{order_id}', [OrderController::class, 'order_details'])->name('pages.show-order-details');
    Route::get('/edit/{id}',[CouponController::class, 'edit'])->name('coupon.edit');
    Route::post('/update/{id}',[CouponController::class, 'update'])->name('coupon.update');
    Route::get('/remove/{id}', [CouponController::class, 'remove'])->name('coupon.remove');
    

    
});



Route::get('/shop', [CategoryController::class, 'index'])->name('layouts.shop');
Route::get('/cart', [CartController::class, 'show'])->name('pages.cart'); 
Route::get('/checkout', [OrderController::class, 'index'])->name('pages.checkout'); //incomplete

Route::get('/get-districts/{division_id}', [OrderController::class, 'getDistricts']);
Route::get('/get-thanas/{district_id}', [OrderController::class, 'getThanas']);


Route::get('/shop-grid-left', [ProductController::class, 'show'])->name('pages.shop-grid-left'); //done
Route::get('/single-product/{slug}', [ProductController::class, 'view_single_product'])->name('pages.single-product'); // almost

Route::resource('carts', CartController::class);
Route::post('/cart/{product_id}', [CartController::class, 'store'])->name('store.cart');
Route::post('/search', [ProductController:: class, 'search'])->name('product.search');
Route::get('/user-account', [DivisionController::class, 'view'])->name('pages.userProfile');
Route::post('/apply-coupon',[CouponController::class, 'applyCoupon']);
Route::post('/create-order', [OrderController:: class, 'create'])->name('order.create');
Route::put('/update-order-details/{id}',  [OrderController:: class, 'update'])->name('update-order-details');


Route::put('/update-user-details/{id}',  [DivisionController::class, 'add_details'])->name('update.user-details');

Route::get('/order-invoice/{id}',  [OrderController:: class, 'show_invoice'])->name('pages.customer-invoice');
Route::get('/download-invoice/{id}',  [OrderController:: class, 'invoice'])->name('download.invoice');



require __DIR__.'/auth.php';
