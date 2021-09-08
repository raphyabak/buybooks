<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    protected $listeners = ['updatedRole' => 'render'];

    public $name;
    public $permission;

    protected $rules = [
        'name' => 'required',
        'permission' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

    }

    public function addRole()
    {

        $this->validate();

        $role = Role::create([
            'name' => $this->name,
        ]);

        $role->givePermissionTo($this->permission);

        session()->flash('success', 'Role Added Successfully 😃');
        $this->reset('name', 'permission');
    }

    public function delete($id)
    {
        Role::destroy($id);
        $this->dispatchBrowserEvent('roles-deleted');
        session()->flash('success', "Role deleted Successfully");
    }

    public function render()
    {
        $roles = Role::latest()->get();
        $permissions = Permission::latest()->get();
        // Permission::get()->pluck('name','name');
        // Permission::latest()->get();


        return view('livewire.admin.roles', compact('roles', 'permissions'));
    }
}
