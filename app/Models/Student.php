<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $primary_key = 'student_id';

    protected $fillable = [
        'student_id',
        'name',
        'surname',
        'departmant',
        'class',
        'birth_date'
    ];

}
