<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => "Machine Learning",
            'slug' => "machine-learning",
            'color' => 'yellow'
        ]);

        Category::create([
            'name' => "Decision Support System",
            'slug' => "decision-support-system",
            'color' => 'green'
        ]);

        Category::create([
            'name' => "Big Data",
            'slug' => "big-data",
            'color' => 'red'
        ]);

        Category::create([
            'name' => "Internet Of Things",
            'slug' => "internet-of-things",
            'color' => 'gray'
        ]);
    }
}
