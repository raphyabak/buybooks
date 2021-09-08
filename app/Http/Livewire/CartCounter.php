<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartCounter extends Component
{
    protected $listeners = ['addedtoCart' =>'render'];

    public function render()
    {
        // $count = \Cart::getContent()->count();
        $count = \Cart::session(1)->getContent()->count();
        return view('livewire.cart-counter', compact('count'));
    }
}
