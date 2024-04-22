<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = 
    ['name',
    'short_description',
    'long_description',
    'price' ,
    'offer_price',
    'quantity',
    'is_featured',
    'product_type',
    'image',
    'slug',
    'subcategory_id',
    'mfg_date',
    'exp_date',
    'sku_code',
    'product_tags',
    'additional_info',
    'status'];
    
    // Cast JSON fields
    protected $casts = [
        //'image' => 'json',
        'product_tags' => 'json',
    ];
    
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(Image::Class);
    }
}
