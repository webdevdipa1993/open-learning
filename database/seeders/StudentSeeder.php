<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student; // Make sure you have the Student model created
use Illuminate\Support\Str;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate 10 sample student records
        for ($i = 1; $i <= 10; $i++) {
            Student::create([
                'first_name' => 'StudentFirst' . $i,
                'last_name' => 'StudentLast' . $i,
                'date_of_birth' => now()->subYears(rand(10, 18))->subDays(rand(0, 365))->format('Y-m-d'), // Random DOB between 10 to 18 years ago
                'gender' => $i % 2 == 0 ? 'male' : 'female', // Alternate male/female
                'status' => $i % 3 == 0 ? 'inactive' : 'active', // Alternate active/inactive with more actives
            ]);
        }
    }
}
