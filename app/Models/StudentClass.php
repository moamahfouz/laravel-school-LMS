<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'class_id', 'school_id'];

    public function student(){
        return$this->belongsTo(Student::class);
    }

    public function class(){
        return$this->belongsTo(SchoolClass::class);
    }
}
