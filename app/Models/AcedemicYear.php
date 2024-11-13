<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcedemicYear extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'academic_years';

    protected $fillable = ['start_date', 'end_date', 'title', 'status'];
}
