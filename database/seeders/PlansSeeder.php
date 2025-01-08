<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan; // Import the Category model

class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            ['name' => 'Basic Plan', 'description' => 'Access to basic resources', 'price' => 10.00, 'duration_months' => 1],
            ['name' => 'Pro Plan', 'description' => 'Access to all resources', 'price' => 50.00, 'duration_months' => 6],
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
