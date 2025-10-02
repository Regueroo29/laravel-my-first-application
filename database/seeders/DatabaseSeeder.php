<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tag;
use App\Models\Job;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create a test user
        User::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'test@example.com',
        ]);

        // Create 10 tags first
        $tags = Tag::factory(10)->create();

        // Create 20 jobs (JobFactory will create employers automatically via Employer::factory())
        $jobs = Job::factory(20)->create();

        // Attach 2 random tags to each job
        $jobs->each(function ($job) use ($tags) {
            $job->tags()->attach($tags->random(2));
        });
    }
}
