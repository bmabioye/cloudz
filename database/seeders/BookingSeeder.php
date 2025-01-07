<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bookings')->insert([
            [
                'user_id' => 1,
                'mentorship_service_id' => 1,
                'booking_date' => '2025-01-10',
                'booking_time' => '09:00:00',
                'status' => 'Pending',
                'payment_status' => 'Unpaid',
                'consultant_id' => 1,
        ],
        [
            'user_id' => 2,
            'mentorship_service_id' => 2,
            'booking_date' => '2025-01-11',
            'booking_time' => '13:00:00',
            'status' => 'Confirmed',
            'payment_status' => 'Paid',
            'consultant_id' => 2,
        ],
    ]);
    }
}
