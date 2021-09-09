<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductGrid extends Component
{
    public $search;

    public function render()
    {
        $products = Product::where('title', 'like', '%'.$this->search.'%')->orderBy('created_at', 'DESC')->get();
        return view('livewire.product-grid', compact('products'));
    }
}
