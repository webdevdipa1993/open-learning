<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'teachers';

    protected $fillable = ['first_name', 'last_name', 'employee_code','specialization'];
}
