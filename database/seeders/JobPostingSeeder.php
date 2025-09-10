<?php

namespace Database\Seeders;

use App\Models\JobPosting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Faker\Factory as Faker;

class JobPostingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $adminUser = User::where('role', 'super_admin')->first();

        if ($adminUser) {
            // Create 100 new records
            for ($i = 0; $i < 100; $i++) {
                $startDate = Carbon::now()->addDays(rand(-10, 10));
                $endDate = Carbon::now()->addDays(rand(20, 60));
                $statusOptions = ['open', 'closed'];
                $typeOptions = ['full-time', 'part-time', 'remote', 'contract', 'internship'];
                $categoryOptions = ['Technology', 'Marketing', 'Sales', 'Finance', 'Human Resources', 'Healthcare', 'Education', 'Art & Design', 'Customer Service', 'Operations'];

                $status = $faker->randomElement($statusOptions);

                JobPosting::create([
                    'job_title' => $faker->jobTitle,
                    'job_category' => $faker->randomElement($categoryOptions),
                    'employment_type' => $faker->randomElement($typeOptions),
                    'status' => $status,
                    'is_active' => ($status === 'open'),
                    'start_date' => $startDate,
                    'end_date' => $endDate,
                    'job_description' => $faker->paragraphs(3, true),
                    'job_requirements' => $faker->sentences(5, true),
                    'created_by' => $adminUser->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // You can keep this specific job posting or remove it
            JobPosting::create([
                'job_title' => 'Senior Software Engineer',
                'job_category' => 'Technology',
                'employment_type' => 'full-time',
                'status' => 'open',
                'is_active' => true,
                'start_date' => Carbon::now()->addDays(5),
                'end_date' => Carbon::now()->addDays(45),
                'job_description' => 'We are looking for a senior software engineer...',
                'job_requirements' => '5+ years of experience, strong knowledge of PHP and Laravel...',
                'created_by' => $adminUser->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            $this->command->warn('No super admin user found. Please create one before running the JobPostingSeeder.');
        }
    }
}
