<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Home extends Component
{


    public function render()
    {
        $products = Product::latest()->get();
        return view('livewire.home', compact('products'))
        ->extends('layouts.main')
        ->section('body');
    }
}
