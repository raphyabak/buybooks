<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['code','title', 'price', 'stock', 'image', 'sales'];

    public function category(){

        return $this->belongsToMany(Category::class, 'product_category');
    }
}
