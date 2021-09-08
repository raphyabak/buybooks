<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

class Products extends Component
{
    use WithFileUploads;

    protected $listeners = ['updatedProduct'=> 'render'];

    public $title;
    public $price;
    public $stock;
    public $image;
    public $category;
    public $code;

    protected $rules = [
        'title' => 'required',
        'price' => 'required',
        'stock' => 'required',
        'category' => 'required',
        'code' => 'required',

    ];

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);

    // }

    public function addProduct()
    {

        $this->validate();

        if ($this->image) {


            $file = $this->image;

            $imageName = $imageName = time() . '.' . $file->getClientOriginalExtension();

            $img = Image::make($file);

            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->sharpen(6);


            $resource = $img->stream()->detach();

            $path = Storage::disk('s3')->put(
                'photos/' . $imageName,
                $resource
            );


            $product = Product::create([
                'title' => $this->title,
                'price' => $this->price,
                'stock' => $this->stock,
                'code' => $this->code,
                // 'category_id' => $this->category,
                'image' => $imageName,
                'sales' => 0
            ]);

        } else {
            $product = Product::create([
                'title' => $this->title,
                'price' => $this->price,
                'stock' => $this->stock,
                'code' => $this->code,
                // 'category_id' => $this->category,
                'sales' => 0

            ]);
        }

        $product->category()->attach($this->category);

        $this->reset(['title', 'price', 'stock', 'image', 'category', 'code']);
        session()->flash('success', 'Product Added Successfully 😃!');
        $this->emit('addedProduct');
        // $this->emitTo('AllStaffs', 'addedStaff');

    }

    public function delete(Product $product){

        if ($product->image) {
            Storage::disk('s3')->delete('photos/'. $product->image);
        }
        Product::destroy($product->id);
        $this->dispatchBrowserEvent('product-deleted');
        session()->flash('success', "Product deleted Successfully");
    }

    public function render()
    {
        $categories = Category::latest()->get();
        $products = Product::latest()->get();
        return view('livewire.admin.products', compact('products', 'categories'));
    }
}
