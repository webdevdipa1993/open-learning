<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    // Specify the table name (optional if it matches the model name)
    protected $table = 'grades';

    // Define the fillable fields
    protected $fillable = ['title', 'code', 'type', 'status'];
}
