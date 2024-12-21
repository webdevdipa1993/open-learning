<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AcademicYear;
use App\Models\Grade;
class Student extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'students';

    protected $fillable = ['first_name', 'last_name', 'date_of_birth', 'gender', 'academic_year_id', 'department_id', 'stream_id', 'semester_id', 'class_id', 'section_id', 'status'];
    
    // make created_at & updated_at included into fillable & workable 
    public $timestamps = true;

    // // remove primary key & id 
    // protected $primaryKey = null; // No primary key
    // public $incrementing = false; // Disable auto-increment

    // academic_year_id AcademicYear relationship
    public function academic_year()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
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
