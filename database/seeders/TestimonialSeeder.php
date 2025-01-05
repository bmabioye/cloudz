<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::create([
            'name' => 'Jane Doe',
            'designation' => 'Project Manager',
            'content' => 'CloudZone mentorship helped me achieve my career goals.',
            'photo' => null, // You can add a URL or path here
        ]);

        Testimonial::create([
            'name' => 'John Smith',
            'designation' => 'Software Engineer',
            'content' => 'The mentorship sessions were very insightful and practical!',
            'photo' => null,
        ]);
    }
}
