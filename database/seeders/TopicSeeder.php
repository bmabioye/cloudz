<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('topics')->insert([
            ['name' => 'Web Development', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Learing Growth', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Coding Session', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Join the Tech Train', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
