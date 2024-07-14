<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $category_id;
    public $title;
    public $description;
    public $short_description;
    public $price;
    public $quantity;
    public $image;
    public $existingImageUrl;

    public $categories;

    protected function rules()
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:250',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
        ];
    }

    public function save()
    {
        $validatedData = $this->validate();

        if ($this->image) {
          
            $imageName = \Str::random(10) . '.' . $this->image->getClientOriginalExtension();
           
            $this->image->storeAs('products', $imageName, 'public');
           
            $validatedData['image'] = $imageName;
        }

        Product::create($validatedData);
        $this->description = '';
        session()->flash('message', 'Product has been created successfully!');
        $this->reset(['image']);
        $this->existingImageUrl = asset('storage/products/' . $this->image);
        return redirect()->route('admin.product');

        $this->reset();
    }

    public function updatedImage()
    {

        if ($this->image) {
            $this->existingImageUrl = $this->image->temporaryUrl();
        }
    }

    public function mount()
    {
        $this->categories = Category::all();
    }
    public function render()
    {
        return view('livewire.admin.product.create');
    }
}
