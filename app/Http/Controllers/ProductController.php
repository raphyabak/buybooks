<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Codebyray\ReviewRateable\Models\Rating;

class ProductController extends Controller
{
    public function details(Product $product)
    {
        // $ratings = $product->getApprovedRatings($product->id, 'desc');
     
        $ratings = Rating::where('reviewrateable_id', $product->id)->where('approved', 1)->latest()->paginate(3);
        // dd($ratings);
        return view('product-details', compact('product', 'ratings'));
    }
}
