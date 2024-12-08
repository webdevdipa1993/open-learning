<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'curriculums';

    protected $fillable = ['academic_year_id', 'department_id', 'stream_id', 'semester_id', 'class_id','section_id','subject_id','teacher_id','title','code','description', 'status'];
}
