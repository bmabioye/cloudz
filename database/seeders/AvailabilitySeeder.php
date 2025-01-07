<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class AvailabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('availability')->insert([
            [
            'consultant_id' => 1,
            'date' => '2025-01-10',
            'start_time' => '09:00:00',
            'end_time' => '10:00:00',
            'is_booked' => false,
        ],
        [
            'consultant_id' => 2,
            'date' => '2025-01-10',
            'start_time' => '10:00:00',
            'end_time' => '11:00:00',
            'is_booked' => false,
        ],
        [
            'consultant_id' => 3,
            'date' => '2025-01-11',
            'start_time' => '13:00:00',
            'end_time' => '14:00:00',
            'is_booked' => false,
        ],
    ]);
    }
}
