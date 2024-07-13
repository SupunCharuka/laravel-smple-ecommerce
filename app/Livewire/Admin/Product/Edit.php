<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $product;
    public $category_id;
    public $title;
    public $description;
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
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
        ];
    }

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->category_id = $product->category_id;
        $this->title = $product->title;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->quantity = $product->quantity;
        $this->categories = Category::all();
        $this->existingImageUrl = asset('storage/products/' . $product->image);
    }

    public function save()
    {
        $validatedData = $this->validate();

        if ($this->image) {
            if ($this->product->image) {
                \Storage::disk('public')->delete('products/' . $this->product->image);
            }
            $imageName = \Str::random(10) . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('products', $imageName, 'public');
            $validatedData['image'] = $imageName;
        } else {

            $validatedData['image'] = $this->product->image;
        }

        $this->product->update($validatedData);
        session()->flash('message', 'Product has been updated successfully!');
        $this->reset(['image']);
        $this->existingImageUrl = asset('storage/products/' . $this->product->image);
        return redirect()->route('admin.productsManage');
    }

    public function updatedImage()
    {

        if ($this->image) {
            $this->existingImageUrl = $this->image->temporaryUrl();
        }
    }


    public function render()
    {
        return view('livewire.admin.product.edit');
    }
}
