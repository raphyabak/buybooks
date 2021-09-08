<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class EditCategory extends Component
{

    public $category;

    public $name;

    protected $rules = [
        'name' => 'required',
    ];

    public function mount(){

        $this->name = $this->category->name;
    }

    public function editCategory(){
        $this->validate();
        $this->category->update([
            'name' => $this->name
        ]);

        session()->flash('success', 'Category Updated Successfully 😃');

        $this->emit('updatedCategory');
    }


    public function render()
    {
        return view('livewire.admin.edit-category');
    }
}
