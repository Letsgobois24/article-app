<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Artikula: Ruang Baca — Artikel & Insight Berkualitas')]

class Home extends Component
{
    public function render()
    {
        return view('livewire.pages.home', [
            'pageTitle' => 'Home Page'
        ]);
    }
}
