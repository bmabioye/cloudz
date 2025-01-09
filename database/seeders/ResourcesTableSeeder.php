<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Resource; // Import the Category model

class ResourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $resources = [
            [
                'title' => 'CISSP Study Guide',
                'description' => 'Comprehensive guide for CISSP certification.',
                'price' => 50.00,
                'category_id' => 1,
                'file_path' => 'resources/cissp-study-guide.pdf',
                'is_premium' => true,
            ],
            [
                'title' => 'AWS Cheatsheet',
                'description' => 'Quick reference for AWS services.',
                'price' => 10.00,
                'category_id' => 2,
                'file_path' => 'resources/aws-cheatsheet.pdf',
                'is_premium' => false,
            ],
        ];

        foreach ($resources as $resource) {
            Resource::create($resource);
        }
    }
}
