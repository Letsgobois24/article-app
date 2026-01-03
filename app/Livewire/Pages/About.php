<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class About extends Component
{
    public function render()
    {

        return view('livewire.pages.about', ['title' => "About Page", 'name' => "Rayhan Muhammad Alfarizi"]);
    }
}
