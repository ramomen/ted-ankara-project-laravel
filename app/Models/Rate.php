<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $primary_key = 'rate_id';

    protected $fillable = [
        'rate_id',
        'student_id',
        'subject_id',
        'first_exam',
        'second_exam',
        'third_exam',
        'first_homework',
        'second_homework',
        'project_homework'
    ];
}
