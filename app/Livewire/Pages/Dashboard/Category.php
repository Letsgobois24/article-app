<?php

namespace App\Livewire\Pages\Dashboard;

use App\Models\Category as ModelsCategory;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.dashboard')]
class Category extends Component
{
    public $name = '';
    public $slug = '';
    public $color;
    public $id = null;
    public $lastSlug;

    public function render()
    {
        return view('livewire.pages.dashboard.category', [

            'categories' => ModelsCategory::all()
        ])->layoutData(['title' => 'Dashboard Categories']);
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

        if (!$this->id) {
            // Create New Category
            $validatedData = $this->validate($rules);
            ModelsCategory::create($validatedData);
        } else {
            // Update Category
            $rules['slug'][] = Rule::unique('categories', 'slug')->ignore($this->lastSlug, 'slug');
            $validatedData = $this->validate($rules);
            ModelsCategory::where('id', $this->id)->update($validatedData);
        }

        // Reset Input
        $this->reset();

        // Flash Message
        session()->flash('status', [
            'theme' => 'success',
            'message' => !$this->id ? 'New category has been added!' : 'Category has been updated'
        ]);

        // Redirect back
        return $this->redirect(
            route('categories-dashboard'),
            navigate: true
        );
    }

    public function resetForm()
    {
        $this->reset();
    }
}
