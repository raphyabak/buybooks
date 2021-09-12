<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Review extends Component
{
    public $product;
    public $rating;
    public $title;
    public $body;
    public $name;
    public $email;
    public $password;

    public function rate()
    {

        $userloggedin = Auth::user();

        $userexist = User::where('email', '=', $this->email)->first();

        if (!$userloggedin && $userexist === null) {

            $this->validate([
                'name' => 'required',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => ['required'],
                'rating' => 'required',
                'title' => 'required',
                'body' => 'required',
            ]);

            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'purchases' => 0,
            ]);

            $user->assignRole('Customer');

            Auth::login($user);

            $rating = $this->product->rating([
                'title' => $this->title,
                'body' => $this->body,
                'rating' => $this->rating,
                'approved' => true, // This is optional and defaults to false
            ], $user);

            session()->flash('success', 'Rated Product Successfully 😃');
            $this->reset('rating', 'title', 'body');
            $this->emit('addedReview');

        } elseif (!$userloggedin && $userexist) {

            $this->validate([
                'email' => 'required|string|email|max:255',
                'password' => ['required'],
                'rating' => 'required',
                'title' => 'required',
                'body' => 'required',
            ]);

            $user = ['email' => $this->email,
                'password' => $this->password,
            ];

            $login = Auth::attempt($user);

            if ($login) {
                // dd('Here');
                $rating = $this->product->rating([
                    'title' => $this->title,
                    'body' => $this->body,
                    'rating' => $this->rating,
                    'approved' => true, // This is optional and defaults to false
                ], Auth::user());

                session()->flash('success', 'Rated Product Successfully 😃');
                $this->reset('rating', 'title', 'body');
                $this->emit('addedReview');

            } else {
                session()->flash('failed', 'You already have an account, please input your correct password😞');
            }
        }else{

            $this->validate([
                'rating' => 'required',
                'title' => 'required',
                'body' => 'required',
            ]);

            $rating = $this->product->rating([
                'title' => $this->title,
                'body' => $this->body,
                'rating' => $this->rating,
                'approved' => true, // This is optional and defaults to false
            ], Auth::user());

            session()->flash('success', 'Rated Product Successfully 😃');
            $this->reset('rating', 'title', 'body');
            $this->emit('addedReview');
        }

    }

    public function render()
    {
        return view('livewire.review');
    }
}
