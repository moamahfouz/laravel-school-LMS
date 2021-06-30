<?php

namespace App\Models;

use App\School;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
        'teacher_id',
        'school_id'
    ];
    protected $table = 'schoolclasses';

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }


}
