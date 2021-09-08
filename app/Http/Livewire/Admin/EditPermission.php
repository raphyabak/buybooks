<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class EditPermission extends Component
{
    public $permission;

    public $name;

    protected $rules = [
        'name' => 'required',
    ];

    public function mount(){

        $this->name = $this->permission->name;
    }

    public function editPermission(){
        $this->validate();
        $this->permission->update([
            'name' => $this->name
        ]);

        session()->flash('success', 'Permission Updated Successfully 😃');

        $this->emit('updatedPermission');
    }

    public function render()
    {
        return view('livewire.admin.edit-permission');
    }
}
