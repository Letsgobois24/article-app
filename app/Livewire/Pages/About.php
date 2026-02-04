<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Tentang Artikula — Ruang Baca Digital')]

class About extends Component
{
    public function render()
    {

        return view('livewire.pages.about', ['pageTitle' => "About Page", 'name' => "Rayhan Muhammad Alfarizi"]);
    }
}
