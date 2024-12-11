<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AcademicYear;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Grade;

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

    // department_id Department relationship
    public function department()
    {
        return $this->belongsTo(Grade::class, 'department_id');
    }

    // stream_id Grade relationship
    public function stream()
    {
        return $this->belongsTo(Grade::class, 'stream_id');
    }

    // semester_id Grade relationship
    public function semester()
    {
        return $this->belongsTo(Grade::class, 'semester_id');
    }

    // class_id Grade relationship
    public function class()
    {
        return $this->belongsTo(Grade::class, 'class_id');
    }

    // section_id Grade relationship
    public function section()
    {
        return $this->belongsTo(Grade::class, 'section_id');
    }







}
