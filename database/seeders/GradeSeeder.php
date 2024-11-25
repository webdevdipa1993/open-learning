<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grade;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Predefined types for seeding
        $types = ['stream', 'semester', 'class', 'section', 'department'];

        // Generate 10 sample records for the grades
        for ($i = 1; $i <= 10; $i++) {
            Grade::create([
                'title' => 'Grade ' . $i,
                'code' => 'GR' . sprintf('%02d', $i), // Example: GR01, GR02, etc.
                'type' => $types[array_rand($types)], // Randomly pick one of the predefined types
                'status' => $i % 2 == 0 ? 'active' : 'inactive', // Alternate between 'active' and 'inactive'
            ]);
        }
    }
}
