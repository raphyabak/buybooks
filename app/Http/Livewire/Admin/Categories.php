<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    protected $listeners = ['updatedCategory'=> 'render'];

    public $name;

    protected $rules = [
        'name' => 'required',
    ];

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);

    // }

    public function addCategory(){
        $this->validate();
        Category::create([
            'name' => $this->name
        ]);

        session()->flash('success', 'Category Added Successfully 😃');
        $this->reset('name');
    }

    public function delete($id){
        Category::destroy($id);
        $this->dispatchBrowserEvent('category-deleted');
        session()->flash('success', "Category deleted Successfully");
    }

    public function render()
    {
        $categories = Category::latest()->get();
        return view('livewire.admin.categories', compact('categories'));
    }
}
