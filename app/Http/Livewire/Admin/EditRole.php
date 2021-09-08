<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class EditRole extends Component
{
    public $role;

    public $name;

    public $permissions;

    public $permission;

    protected $rules = [
        'name' => 'required',
        'permission' => 'required'
    ];

    public function mount(){

        $this->name = $this->role->name;
        $this->permission = $this->role->permissions->pluck('id');
        // dd($this->role->permissions);
    }

    public function editRole(){
        $this->validate();

        $this->role->update([
            'name' => $this->name,
        ]);

        $this->role->syncPermissions($this->permission);


        session()->flash('success', 'Role Updated Successfully 😃');

        $this->emit('updatedRole');
    }

    public function render()
    {
        return view('livewire.admin.edit-role');
    }
}
