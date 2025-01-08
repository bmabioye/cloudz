<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category; // Import the Category model
class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'eBooks', 'slug' => 'ebooks'],
            ['name' => 'Templates', 'slug' => 'templates'],
            ['name' => 'Cheatsheets', 'slug' => 'cheatsheets'],
            ['name' => 'Videos', 'slug' => 'videos'],
            ['name' => 'Courses', 'slug' => 'courses'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
