<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MentorshipTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mentorship_types')->insert([
            ['type' => 'Bootcamp', 'description' => 'Futuristic Cert Bootcamp', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Career Coaching', 'description' => 'Career Guide on rock', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
