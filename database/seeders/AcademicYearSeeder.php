<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AcademicYear;
use Carbon\Carbon;

class AcademicYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate 10 sample records
        for ($i = 1; $i <= 10; $i++) {
            AcademicYear::create([
                'start_date' => Carbon::now()->subYears($i)->startOfYear()->toDateString(),
                'end_date' => Carbon::now()->subYears($i)->endOfYear()->toDateString(),
                'title' => 'Academic Year ' . (2024 - $i),
                'status' => $i % 2 == 0 ? 'active' : 'inactive', // Alternate active/inactive status
            ]);
        }
    }
}
