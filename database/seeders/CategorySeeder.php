<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Pemrograman',
        ]);

        Category::create([
            'name' => 'Desain Grafis',
        ]);

        Category::create([
            'name' => 'Mobile Development',
        ]);

        Category::create([
            'name' => 'Web Development',
        ]);
    }
}
