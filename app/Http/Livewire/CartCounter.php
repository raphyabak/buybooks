<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartCounter extends Component
{
    public function render()
    {
        $count = \Cart::getContent()->count();
        // \Cart::session(1)->getContent()->count();
        return view('livewire.cart-counter', compact('count'));
    }
}
