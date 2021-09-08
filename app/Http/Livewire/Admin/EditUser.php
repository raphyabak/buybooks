<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditUser extends Component
{
    public $user;
    public $name;
    public $email;
    public $phone;
    public $password;
    public $role;
    public $roles;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|string|email|max:255',
        // 'password' => ['required'],
        'role' => 'required',
    ];

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);

    // }

    public function mount()
    {

        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;
        $this->role = $this->user->getRoleNames();
        // dd($this->role->permissions);
    }

    public function editUser()
    {

        $this->validate();

        if ($this->password) {

            $this->user->update([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'password' => Hash::make($this->password),
            ]);

        } else {
            $this->user->update([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
            ]);

        }

        $this->user->syncRoles($this->role);

        session()->flash('success', 'User Updated Successfully 😃');

        $this->emit('updatedUser');
    }

    public function render()
    {
        return view('livewire.admin.edit-user');
    }
}
