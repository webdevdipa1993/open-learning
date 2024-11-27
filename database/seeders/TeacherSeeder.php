<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher; // Make sure you have the Teacher model created
use Illuminate\Support\Str;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate 10 sample teacher records
        for ($i = 1; $i <= 10; $i++) {
            Teacher::create([
                'first_name' => 'FirstName' . $i,
                'last_name' => 'LastName' . $i,
                'employee_code' => 'EMP' . str_pad($i, 3, '0', STR_PAD_LEFT), // Generates code like EMP001, EMP002, etc.
                'specialization' => 'Specialization ' . ($i % 5 + 1), // Example specializations
                'status' => $i % 2 == 0 ? 'active' : 'inactive', // Alternate active/inactive status
            ]);
        }
    }
}
