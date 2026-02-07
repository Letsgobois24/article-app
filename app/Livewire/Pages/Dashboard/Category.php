<?php

namespace App\Livewire\Pages\Dashboard;

use App\Models\Category as CategoryModel;
use App\Services\CategoryService;
use Illuminate\Database\QueryException;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.dashboard')]
#[Title('Manage Category — Admin Artikula')]

class Category extends Component
{
    protected $listeners = ['search-updated'];

    public $search = '';
    public $name = '';
    public $slug = '';
    public $lastSlug;
    public $id = null;
    public $color = '#4A90E2';
    public $lastColor = '#4A90E2';

    public function render()
    {
        return view('livewire.pages.dashboard.category');
    }

    #[On('reset-error')]
    public function resetErrorInput()
    {
        $this->resetErrorBag();
    }

    public function save()
    {
        $rules = [
            'name' => ['required', 'min:3'],
            'slug' => ['required', Rule::unique('categories', 'slug')],
            'color' => ['required', Rule::unique('categories', 'color')]
        ];

        if (!$this->id) {
            // Create New Category
            $validatedData = $this->validate($rules);
            CategoryModel::create($validatedData);
        } else {
            // Update Category
            $rules['slug'][1] = $rules['slug'][1]->ignore($this->lastSlug, 'slug');
            $rules['color'][1] = $rules['color'][1]->ignore($this->lastColor, 'color');
            $validatedData = $this->validate($rules);
            CategoryModel::where('id', $this->id)->update($validatedData);
        }

        // Flash Message
        session()->flash('status', [
            'theme' => 'success',
            'message' => !$this->id ? 'New category has been added!' : 'Category has been updated'
        ]);

        // Reset Input
        CategoryService::clearCache();

        // Redirect back
        return $this->redirect(
            route('categories-dashboard'),
            navigate: true
        );
    }

    #[On('delete-confirm')]
    public function destroy($id)
    {
        try {
            CategoryModel::destroy($id);
            CategoryService::clearCache();

            session()->flash('status', [
                'theme' => 'success',
                'message' => 'Category has been deleted succesfully'
            ]);
        } catch (QueryException $e) {
            if ($e->getCode() == '23503')
                session()->flash('status', [
                    'theme' => 'danger',
                    'message' => 'Categories are still referenced by other data'
                ]);
            else {
                session()->flash('status', [
                    'theme' => 'danger',
                    'message' => 'Error deleted category'
                ]);
            }
        }

        return $this->redirect(
            route('categories-dashboard'),
            navigate: true
        );
    }

    #[On('resetSearch')]
    public function resetSearch()
    {
        $this->reset('search');
    }
}
