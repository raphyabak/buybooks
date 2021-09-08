<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    protected $listeners = ['updatedUser' => 'render'];

    public $name;
    public $email;
    public $phone;
    public $password;
    public $role;
    public $purchases;
    protected $rules = [
        'name' => 'required',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => ['required'],
        'role' => 'required',
    ];

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);

    // }

    public function addUser()
    {

        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
            'purchases' => 0,
        ]);

        $user->assignRole($this->role);

        session()->flash('success', 'User Added Successfully 😃');
        $this->reset('name', 'role', 'email', 'password', 'level', 'department');
    }

    public function delete($id)
    {
        User::destroy($id);
        $this->dispatchBrowserEvent('users-deleted');
        session()->flash('success', "User deleted Successfully");
    }

    public function render()
    {
        $users = User::latest()->get();
        $roles = Role::latest()->get();
        return view('livewire.admin.users', compact('users', 'roles'));
    }
}
