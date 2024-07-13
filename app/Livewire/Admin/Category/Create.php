<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public Category $category;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:250|unique:categories,name',
        ];
    }

    protected $validationAttributes = [
        'name' => 'category name',
    ];

    protected $messages = [
        'name.unique' => 'You have already added this category name!',
    ];

    public function updated()
    {
        $this->validate();
    }

    public function save()
    {
        $this->validate();
        $this->category->name = $this->name;
        $this->category->save();
        $this->dispatch('category-created', category: $this->category);
        $this->name="";

        session()->flash('message', 'Category has been created successfully!');
    }

    public function mount()
    {
        $this->category = new Category();
    }
    public function render()
    {
        return view('livewire.admin.category.create');
    }
}
