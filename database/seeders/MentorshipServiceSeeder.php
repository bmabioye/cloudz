<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MentorshipServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mentorship_services')->insert([
            [
                'service_name' => 'Web Development Bootcamp',
                'consultant_id' => 1, // Replace with a valid consultant ID
                'mentorship_type_id' => 1, // Replace with a valid mentorship type ID
                'topic_id' => 1, // Replace with a valid topic ID
                'price' => 150.00,
                'duration' => '2 hours',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_name' => 'Career Coaching',
                'consultant_id' => 2, // Replace with a valid consultant ID
                'mentorship_type_id' => 2, // Replace with a valid mentorship type ID
                'topic_id' => 2, // Replace with a valid topic ID
                'price' => 100.00,
                'duration' => '1 hour',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
