<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Contact Artikula — Get in Touch')]

class Contact extends Component
{
    public function render()
    {
        return view('livewire.pages.contact');
    }
}
