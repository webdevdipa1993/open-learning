<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Notifications\Notifiable;

class Teacher extends Authenticatable


class Teacher extends Model
{
    use HasFactory, Notifiable; // Add Notifiable if you plan to use notifications
    
    
    // Specify the table name
    protected $table = 'teachers';

    // Primary Key
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = ['first_name', 'last_name', 'employee_code', 'specialization', 'status','email','password'];

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
    public $timestamps = true; use HasFactory;
}
