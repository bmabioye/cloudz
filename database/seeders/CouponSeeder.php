<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Coupon;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coupons = [
             [
                'code' => 'FREESHIP',
                'discount_percentage' => 15,
                'valid_from' => now(),
                'valid_until' => now()->addDays(90),
                'usage_limit' => 0, // Unlimited usage
                'used_count' => 0,
            ],
        ];

        foreach ($coupons as $coupon) {
            Coupon::create($coupon);
        }
    }
}
