<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
    public $name;
    public Category $category;

    protected function rules()
    {
        return [
            'name' => ['required','string', Rule::unique('categories', 'name')->ignore($this->category->id, 'id')],
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
        session()->flash('message', 'Category has been updated successfully!');
        return redirect()->route('admin.category');
    }

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->name = $category->name;
    }
    public function render()
    {
        return view('livewire.admin.category.edit');
    }
}
