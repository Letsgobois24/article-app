<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title' => 'Pengantar Machine Learning: Mengapa Mesin Bisa Belajar?',
            'slug' => 'pengantar-machine-learning',
            'author_id' => 1,
            'category_id' => 1,
            'body' => 'Machine Learning (ML) adalah sub-bidang dari kecerdasan buatan (AI) yang memungkinkan sistem untuk belajar dari data, mengidentifikasi pola, dan membuat keputusan dengan intervensi manusia yang minimal. Intinya, kita tidak secara eksplisit memprogram mesin dengan setiap aturan yang mungkin; sebaliknya, kita memberinya banyak data dan membiarkannya menyusun aturannya sendiri.'
        ]);

        Post::create([
            'title' => 'Penerapan Machine Learning dalam Kehidupan Sehari-hari',
            'slug' => 'penerapan-machine-learning',
            'author_id' => 1,
            'category_id' => 1,
            'body' => 'Machine Learning (ML) mungkin terdengar seperti konsep futuristik, tetapi ML sudah tertanam dalam banyak aspek kehidupan digital kita sehari-hari. Ia bekerja di latar belakang, membuat pengalaman kita lebih cerdas, lebih cepat, dan lebih personal.'
        ]);
    }
}
