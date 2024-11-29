<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'students';

    protected $fillable = ['first_name', 'last_name', 'date_of_birth', 'gender', 'status'];
}
