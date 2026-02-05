<?php

namespace App\Livewire\Pages;

use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Artikula: Ruang Baca — Artikel & Insight Berkualitas')]

class Home extends Component
{
    public function render()
    {
        $popularCategories = Category::postsCategoriesCount()->orderBy('posts_count', 'desc')->limit(4)->get();

        return view('livewire.pages.home', [
            'popularCategories' => $popularCategories
        ]);
    }
}
