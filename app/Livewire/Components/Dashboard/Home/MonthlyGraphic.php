<?php

namespace App\Livewire\Components\Dashboard\Home;

use App\Models\Post;
use Livewire\Component;

class MonthlyGraphic extends Component
{

    public function render()
    {
        $stats = Post::monthlyStats(2025)->get();

        $data = array_fill(0, 12, 0);
        foreach ($stats as $stat) {
            $index = (int)$stat['month'] - 1;
            $data[$index] = $stat['total'];
        }

        return view('livewire.components.dashboard.home.monthly-graphic', [
            'data' => $data
        ]);
    }

    public function placeholder()
    {
        return <<<'HTML'
        <div class="w-full h-48 flex justify-center items-center">
            <!-- Loading spinner... -->
            <div class="w-10 h-10 m-auto border-4 mx-auto border-gray-300 border-t-blue-600 rounded-full animate-spin">
            </div>
        </div>
        HTML;
    }
}
