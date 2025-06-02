<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable = [
        'category_id', 'name', 'slug', 'description', 'price', 'original_price',
        'stock', 'main_image_filename', 'attributes', 'is_new_product', 'is_big_deal'
    ];
    protected $casts = [
        'attributes' => 'array', 
        'is_new_product' => 'boolean',
        'is_big_deal' => 'boolean',
    ];
    public function category() { return $this->belongsTo(Category::class); }
    public function images() { return $this->hasMany(ProductImage::class); } 
}
