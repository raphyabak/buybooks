<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Carty extends Component
{
    public $cartId = 1;

    protected $listeners = ['addedtoCart' =>'render'];

    public function addItem(Product $product)
    {

        $cart = \Cart::session(Auth()->id())->getContent();
        $cekItemId = $cart->whereIn('id', $product->id);


        if ($cekItemId->isNotEmpty()) {
            if ($product->stock == $cekItemId[$product->id]->quantity) {
                session()->flash('error', 'The item stock is low 😞');
            } else {
                \Cart::session(Auth()->id())->update($product->id, [
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
                \Cart::session(Auth()->id())->add([
                    'id' => $product->id,
                    'name' => $product->title,
                    'price' => $product->price,
                    'quantity' => 1,
                    'attributes' => [
                        'added_at' => date("Y-m-d H:i:s"),
                        'image'    => $product->image
                    ],
                ]);
            }

        }
    }

    public function increaseItem($rowId)
    {
        $cartId = 1;
        $product = Product::find($rowId);

        $cart = \Cart::session($cartId)->getContent();

        $checkItem = $cart->whereIn('id', $rowId);

        if ($product->stock == $checkItem[$rowId]->quantity || $product->stock == 0) {
            session()->flash('error', 'The item stock is low 😞');
        } else {
            if ($product->stock == 0) {
                session()->flash('error', 'The item stock is low 😞');
            } else {
                \Cart::session($cartId)->update($rowId, [
                    'quantity' => [
                        'relative' => true,
                        'value' => 1,
                    ],
                ]);
            }
        }

    }

    public function decreaseItem($rowId)
    {

        $product = Product::find($rowId);

        $cart = \Cart::session($this->cartId)->getContent();

        $checkItem = $cart->whereIn('id', $rowId);

        if ($checkItem[$rowId]->quantity == 1) {
            $this->removeItem($rowId);
        } else {
            \Cart::session($this->cartId)->update($rowId, [
                'quantity' => [
                    'relative' => true,
                    'value' => -1,
                ],
            ]);
        }
    }

    public function removeItem($rowId)
    {
        \Cart::session($this->cartId)->remove($rowId);
    }



    public function render()
    {
        $cartId = 1;
        $items = \Cart::session($cartId)->getContent()->sortBy(function ($cart) {
            return $cart->attributes->get('added_at');
        });

        if (\Cart::isEmpty()) {
            $cartData = [];
        } else {
            foreach ($items as $item) {
                $cart[] = [
                    'rowId' => $item->id,
                    'name' => $item->name,
                    'qty' => $item->quantity,
                    'pricesingle' => $item->price,
                    'price' => $item->getPriceSum(),
                    'added_at' => $item->attributes->added_at,
                    'image'    => $item->attributes->image
                ];
            }

            $cartData = collect($cart);
        }

        $sub_total = \Cart::session($cartId)->getSubTotal();
        $total = \Cart::session($cartId)->getTotal();

        $summary = [
            'sub_total' => $sub_total,
            'total' => $total,
        ];

        return view('livewire.carty',[
            'carts' => $cartData,
            'summary' => $summary,
        ]);
    }
}
