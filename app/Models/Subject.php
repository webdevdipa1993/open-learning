<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'subjects';

    protected $fillable = ['title', 'code', 'description'];
}
