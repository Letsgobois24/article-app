<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Kontak — Artikula Ruang Baca')]

class Contact extends Component
{
    public function render()
    {
        return view('livewire.pages.contact', ['pageTitle' => 'Contact Us']);
    }
}
