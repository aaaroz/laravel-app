<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title' => 'Judul Post Pertama',
            'content' => 'Konten post pertama yang menarik!',
        ]);

        Post::create([
            'title' => 'Judul Post Kedua',
            'content' => 'Konten post kedua yang informatif.',
        ]);

        Post::create([
            'title' => 'Judul Post Ketiga',
            'content' => 'Konten post ketiga yang menghibur.',
        ]);

    }
}
