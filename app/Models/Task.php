<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_id',
        'school_id',
        'teacher_id',
        'name',
        'end_date',
        'description',
        'file',
    ];
}
