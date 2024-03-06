<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;

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
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'admin')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/add-product', [ProductController::class, 'create'])->name('pages.add-product');
    Route::get('/dashboard', [ProductController::class, 'index'])->name('pages.dashboard');
    Route::get('/add-category', [CategoryController::class, 'create'])->name('pages.add-category');
    Route::get('/add-subcategory', [SubCategoryController::class, 'create'])->name('pages.add-subcategory');

    Route::post('/add-product', [ProductController::class, 'store'])->name('product.store');
    Route::post('/add-category', [CategoryController::class, 'store'])->name('category.store');
    Route::post('/add-subcategory', [SubCategoryController::class, 'store'])->name('subcategory.store');

    Route::get('/get-subcategories/{category_id}', [ProductController::class, 'getSubCategories']);
    
});



require __DIR__.'/auth.php';
