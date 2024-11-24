<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject; // Make sure you have the Subject model created
use Illuminate\Support\Str;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate 10 sample subject records
        for ($i = 1; $i <= 10; $i++) {
            Subject::create([
                'title' => 'Subject ' . $i,
                'code' => 'SUB' . str_pad($i, 3, '0', STR_PAD_LEFT), // Generates code like SUB001, SUB002, etc.
                'description' => 'This is a description for Subject ' . $i . '.',
            ]);
        }
    }
}
