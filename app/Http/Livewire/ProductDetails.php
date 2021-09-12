<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Codebyray\ReviewRateable\Models\Rating;
use Livewire\Component;
use Livewire\WithPagination;

class ProductDetails extends Component
{
    use WithPagination;

    protected $listeners = ['addedReview'=> 'render'];

    public $product;

    public function addItem(Product $product)
    {
        $cartId = 1;
        // dd('working');
        $cart = \Cart::session($cartId)->getContent();
        $cekItemId = $cart->whereIn('id', $product->id);


        if ($cekItemId->isNotEmpty()) {
            if ($product->stock == $cekItemId[$product->id]->quantity) {
                session()->flash('error', 'The item stock is low 😞');
            } else {
                \Cart::session($cartId)->update($product->id, [
                    'quantity' => [
                        'relative' => true,
                        'value' => 1,
                    ],
                ]);
            }
        } else {
            if ($product->stock == 0) {
                session()->flash('error', 'This item stock is low 😞');
            } else {
                \Cart::session($cartId)->add([
                    'id' => $product->id,
                    'name' => $product->title,
                    'price' => $product->price,
                    'quantity' => 1,
                    'attributes' => [
                        'added_at' => date("Y-m-d H:i:s"),
                        'image'    => $product->image,
                    ],
                ]);
            }

        }
        $this->emit('addedtoCart');
    }

    public function render()
    {
        $ratings = Rating::where('reviewrateable_id', $this->product->id)->where('approved', 1)->latest()->paginate(5);
        return view('livewire.product-details', compact('ratings'));
    }
}
