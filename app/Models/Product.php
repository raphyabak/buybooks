<?php

namespace App\Models;

use Codebyray\ReviewRateable\Contracts\ReviewRateable;
use Codebyray\ReviewRateable\Traits\ReviewRateable as ReviewRateableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements ReviewRateable
{
    use HasFactory, ReviewRateableTrait;

    protected $fillable = ['code','title', 'price', 'stock', 'image', 'sales','slug', 'description'];

    public function category(){

        return $this->belongsToMany(Category::class, 'product_category');
    }
}
