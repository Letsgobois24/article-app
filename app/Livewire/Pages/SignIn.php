<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;

#[Layout('components.layouts.auth')]
#[Title('Masuk — Artikula')]

class SignIn extends Component
{
    #[Validate('required|email')]
    public string $email;

    #[Validate('required')]
    public string $password;

    public function render()
    {
        return view('livewire.pages.sign-in')->layoutData(['isSignInPage' => true]);
    }

    public function authenticate()
    {
        $credentials = $this->validate();

        if (Auth::attempt($credentials)) {
            session()->regenerate();

            return redirect()->intended('/');
        }

        session()->flash('status', ['theme' => 'danger', 'message' => 'Invalid email or password!']);
    }
}
