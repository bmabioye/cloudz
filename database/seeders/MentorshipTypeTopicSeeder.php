<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MentorshipTypeTopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mentorship_type_topic')->insert([
            ['mentorship_type_id' => 1, 'topic_id' => 3], // One-on-One Coaching - CISSP Certification
            ['mentorship_type_id' => 2, 'topic_id' => 3], // Group Mentorship - CISSP Certification
            ['mentorship_type_id' => 4, 'topic_id' => 8], // Bootcamp - IT Audit
            ['mentorship_type_id' => 5, 'topic_id' => 5], // Webinar - CCSK Certification
            ['mentorship_type_id' => 6, 'topic_id' => 8], // Training Workshop - IT Audit
        ]);
    }
}
