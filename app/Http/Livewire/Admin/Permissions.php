<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Permissions extends Component
{
    protected $listeners = ['updatedPermission'=> 'render'];

    public $name;

    protected $rules = [
        'name' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

    }

    public function addPermission(){
        $this->validate();
        Permission::create([
            'name' => $this->name
        ]);

        session()->flash('success', 'Permission Added Successfully 😃');
        $this->reset('name');
    }

    public function delete($id){
        Permission::destroy($id);
        $this->dispatchBrowserEvent('permission-deleted');
        session()->flash('success', "Permission deleted Successfully");
    }

    public function render()
    {
        $permissions = Permission::latest()->get();
        return view('livewire.admin.permissions', compact('permissions'));
    }
}
