<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use KingFlamez\Rave\Facades\Rave as Flutterwave;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

class FlutterwaveController extends Controller
{
    public $cartId = 1;

    public function callback()
    {

        $status = request()->status;

        //if payment is successful
        if ($status ==  'successful') {

        $transactionID = Flutterwave::getTransactionIDFromCallback();
        $data = Flutterwave::verifyTransaction($transactionID);

        $cartTotal = \Cart::session($this->cartId)->getTotal();

        $allCart = \Cart::session($this->cartId)->getContent();

        $filterCart = $allCart->map(function ($item) {
            return [
                'id' => $item->id,
                'quantity' => $item->quantity,
                'price' => $item->getPriceSum()
            ];
        });

        foreach ($filterCart as $cart) {
            $product = Product::find($cart['id']);

            if ($product->stock <= 0) {
                return session()->flash('error', 'The item stock is low 😞');
            }
            // dd($allCart);
            $product->decrement('stock', $cart['quantity']);
            $product->increment('sales', $cart['quantity']);
        }

        $id = IdGenerator::generate([
            'table' => 'sales',
            'length' => 10,
            'prefix' => 'INV-',
            'field' => 'code'
        ]);

        foreach ($allCart as $item) {
            $carts[] = [
                'productId' => $item->id,
                'name' => $item->name,
                'quantity' => $item->quantity,
                'pricesingle' => $item->price,
                'price' => $item->getPriceSum(),
                'added_at' => $item->attributes->added_at,
            ];
        }

        // $products = collect($cart);

        $products = json_encode($carts);


            $user = User::findorFail(Auth()->id());
            Sale::create([
                'code' => $id,
                'user_id' => Auth()->id(),
                'products' => $products,
                'total' => $cartTotal,
            ]);

            $user->increment('purchases', $cartTotal);

        // $url = route('sales');
        \Cart::session($this->cartId)->clear();
        session()->flash('success', '<a href="/sales">The Sale has been completed, you can check the sale table</a>');
        return redirect('success');
        // $this->customer = '';
        // dd("Successs");




        }
        elseif ($status ==  'cancelled'){
            //Put desired action/code after transaction has been cancelled here
            session()->flash('failed', 'Payment has been Cancelled');

            // return Redirect::to(Session::get('url'));
            return redirect()->back();
        }
        else{
            //Put desired action/code after transaction has failed here
            session()->flash('failed', 'Transaction Failed');

            // return Redirect::to(Session::get('url'));
            return redirect()->back();
        }
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (including parameters that didn't exist before the transaction is completed. for audit purpose)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here

    }
}
