<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Mentorship_TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mentorship_types')->insert([
            [
                'type' => 'One-on-One Coaching',
                'description' => '1:1 Service',
                'image' => 'images/services/one-on-one.jpg', 
            ],
            [
                'type' => 'Group Mentorship',
                'description' => 'Group mentorship on any service',
                'image' => 'images/services/group-mentorship.jpg',
            ],
            [
                'type' => 'Quick Walkthrough',
                'description' => 'High-level concept guidance',
                'image' => 'images/services/quick-walkthrough.jpg',
            ],
            [
                'type' => 'Bootcamp',
                'description' => 'Futuristic Cert Bootcamp',
                'image' => 'images/services/bootcamp.jpg',
            ],
            [
                'type' => 'Webinar',
                'description' => 'Live webinar',
                'image' => 'images/services/webinar.jpg',
            ],
            [
                'type' => 'Training Workshop',
                'description' => 'Intensive hands-on training',
                'image' => 'images/services/training-workshop.jpg',
            ],
        ]);

    }
}
