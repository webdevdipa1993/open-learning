<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Curriculum;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\AcademicYear;

class CurriculumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch random grades by type
        $department = Grade::where('type', 'department')->inRandomOrder()->first();
        $stream = Grade::where('type', 'stream')->inRandomOrder()->first();
        $semester = Grade::where('type', 'semester')->inRandomOrder()->first();
        $class = Grade::where('type', 'class')->inRandomOrder()->first();
        $section = Grade::where('type', 'section')->inRandomOrder()->first();

        // Find or create related records for academic year, subject, and teacher
        $academicYear = AcademicYear::inRandomOrder()->first(); // Random academic year
        $subject = Subject::inRandomOrder()->first(); // Random subject
        $teacher = Teacher::inRandomOrder()->first(); // Random teacher

        
        // Generate 10 sample curriculum records
        for ($i = 1; $i <= 10; $i++) {
            Curriculum::create([
                'academic_year_id' => $academicYear ? $academicYear->id : null,
                'department_id' => $department ? $department->id : null,
                'stream_id' => $stream ? $stream->id : null,
                'semester_id' => $semester ? $semester->id : null,
                'class_id' => $class ? $class->id : null,
                'section_id' => $section ? $section->id : null,
                'subject_id' => $subject ? $subject->id : null,
                'teacher_id' => $teacher ? $teacher->id : null,
                'title' => 'Curriculum ' . $i,
                'code' => 'CUR' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'description' => 'This is a description for Curriculum ' . $i . '.',
                'status' => $i % 2 == 0 ? 'active' : 'inactive',
            ]);
        }
    }
}
