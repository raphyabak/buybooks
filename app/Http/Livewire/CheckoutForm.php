<?php

namespace App\Http\Livewire;

use App\Models\User;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use KingFlamez\Rave\Facades\Rave as Flutterwave;
use Livewire\Component;

class CheckoutForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $password;
    public $address;

    // public $total;

    // protected $rules = [
    //     'name' => 'required',
    //     'email' => 'required|string|email|max:255',
    //     // 'password' => ['required'],
    //     'address' => 'required',
    // ];

    public function mount()
    {
        // $cartId = 1;
        // $this->total = \Cart::session($cartId)->getTotal();
        if (Auth::check()) {
            $this->name = auth()->user()->name;
            $this->email = auth()->user()->email;
            $this->address = auth()->user()->address;
            $this->phone = auth()->user()->phone;
        }
    }

    public function buy()
    {
        $cartId = 1;
        $total = \Cart::session($cartId)->getTotal();
        // $totall = number_format($totali);
        // dd($total);
        // $this->validate();

        $userlogged = Auth::user();
        $userexist = User::where('email', '=', $this->email)->first();
        // dd($user);
        if (!$userlogged && $userexist === null) {

            $this->validate([
                'name' => 'required',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => ['required'],
                'address' => 'required',
            ]);

            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'password' => Hash::make($this->password),
                'purchases' => 0,
            ]);

            $user->assignRole('Customer');

            Auth::login($user);

        }

        elseif (!$userlogged && $userexist) {

            $this->validate([
                'email' => 'required|string|email|max:255',
                'password' => ['required'],
            ]);

            $user = ['email' => $this->email,
                'password' => $this->password,
            ];

            $login = Auth::attempt($user);

            if (!$login) {
                // dd('Here');
                session()->flash('failed', 'You already have an account, please input your correct password😞');
            }
        }else {

            $this->validate([
                'name' => 'required',
                'email' => 'required|string|email|max:255',
                'address' => 'required',
            ]);
        }

        if ($total > 0) {
            if (Auth::check()) {
                $reference = Flutterwave::generateReference();
                // dd($reference);
                $data = [
                    'payment_options' => 'card,banktransfer',
                    'amount' => $total,
                    'email' => $this->email,
                    'tx_ref' => $reference,
                    'currency' => "NGN",
                    'redirect_url' => route('callback'),
                    'customer' => [
                        'email' => $this->email,
                        // "phone_number" => request()->phone,
                        "name" => $this->name,

                    ],
                    "meta" => [
                        "user" => auth()->user()->id,

                    ],
                    "customizations" => [
                        "title" => 'BuyBooks',
                        "description" => "Pay for your course",
                    ],
                ];

                // dd($data);

                $payment = Flutterwave::initializePayment($data);

                // dd($payment);
                if ($payment['status'] !== 'success') {
                    // notify something went wrong
                    session()->flash('failed', 'Transaction Failed');
                    // return Redirect::to(Session::get('url'));
                    return redirect()->back();
                }
                // dd($payment);
                session()->flash('url', request()->server('HTTP_REFERER'));
                return redirect($payment['data']['link']);
            }

        } else {
            session()->flash('failed', 'Cart is Empty, Add a Product 😞');
        }

    }

    public function render()
    {
        return view('livewire.checkout-form');
    }
}
