<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AcademicYear;
use App\Models\Teacher;
use App\Models\Subject;

class Curriculum extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'curriculums';

    protected $fillable = ['academic_year_id', 'department_id', 'stream_id', 'semester_id', 'class_id','section_id','subject_id','teacher_id','title','code','description', 'status'];

    // academic_year_id AcademicYear relationship
    public function academic_year()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }

    // teacher_id Teacher relationship
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
    // subject_id Subject relationship
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
