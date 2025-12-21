<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Toaster extends Component
{

    public $theme;
    public $color;

    public function __construct($theme = 'success')
    {
        $themeColor = [
            'success' => 'text-fg-success bg-success-soft',
            'danger' => 'text-fg-danger bg-danger-soft',
            'warning' => 'text-fg-warning bg-warning-soft',
        ];

        $this->theme = $theme;
        $this->color = $themeColor[$theme];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.toaster');
    }
}
