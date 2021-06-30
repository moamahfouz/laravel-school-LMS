<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'student_id',
        'class_id',
        'fist',
        'mid',
        'final'
        ];
}
