<?php

namespace App\Livewire\Pages\Dashboard;

use App\Models\Category as ModelsCategory;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.dashboard')]
class Category extends Component
{
    public $name;
    public $slug;
    public $color;
    public $id = null;
    public $lastSlug;

    public function render()
    {
        return view('livewire.pages.dashboard.category', [
            'categories' => ModelsCategory::all()
        ]);
    }

    public function showEditModal($id)
    {
        $category = ModelsCategory::find($id);

        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->lastSlug = $category->slug;
        $this->color = $category->color;
        $this->id = $id;
    }

    public function save()
    {
        $rules = [
            'name' => ['required', 'min:3'],
            'slug' => ['required'],
            'color' => 'required'
        ];

        if ($this->category) {
            $rules['slug'][] = Rule::unique('categories', 'slug')->ignore($this->lastSlug, 'slug');
            $validatedData = $this->validate($rules);
            // $this->category->update($validatedData);
            session()->flash('status', [
                'theme' => 'success',
                'message' => 'Category has been updated!'
            ]);
        } else {
            $validatedData = $this->validate($rules);
            // ModelsCategory::create($validatedData);
            session()->flash('status', [
                'theme' => 'success',
                'message' => 'Category has been created!'
            ]);
        }
    }

    public function update()
    {
        $rules = [
            'name' => ['required', 'min:3'],
            'slug' => ['required', Rule::unique('categories', 'slug')->ignore($this->lastSlug, 'slug')],
            'color' => 'required'
        ];
        $validatedData = $this->validate($rules);

        // Update Data
        ModelsCategory::where('id', $this->id)->update($validatedData);
        // Reset Input
        $this->reset();

        session()->flash('status', [
            'theme' => 'success',
            'message' => 'Category has been updated!'
        ]);

        return $this->redirect(
            route('categories-dashboard'),
            navigate: true
        );
    }
}
