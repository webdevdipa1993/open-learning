<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AcademicYear;
use App\Models\Grade;
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;

    // Specify the table name
    protected $table = 'students';
    
    // Primary Key
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['first_name', 'last_name', 'date_of_birth', 'gender', 'academic_year_id', 'department_id', 'stream_id', 'semester_id', 'class_id', 'section_id', 'status', 'email', 'password',];
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // make created_at & updated_at included into fillable & workable 
    public $timestamps = true;

    // // remove primary key & id 
    // protected $primaryKey = 'id'; 
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
