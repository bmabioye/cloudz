<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsultantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('consultants')->insert([
            ['name' => 'Babatunde Abioye', 'email' => 'bma@consult.com', 'specialization' => 'Tech Consultant', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sarah Smith', 'email' => 's.smith@padimi.com', 'specialization' => 'Career Coaching', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Oga Ade', 'email' => 'oga.ade@owa.com', 'specialization' => 'Web Specialist', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
