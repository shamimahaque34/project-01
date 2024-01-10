<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentParent extends Model
{
    use HasFactory;
    protected $fillable=[
        'guardian_name',
        'guardian_relation',
        'father_name',
        'mother_name',
        'father_profession',
        'mother_profession',
        'email',
        'phone',
        'user_name',
        'password',
        'photo',
        'status',
        'address',
        'slug',
    ];


}
