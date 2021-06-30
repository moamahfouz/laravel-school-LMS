<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\StudentClass;
use App\Teacher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $school = School::create([
            'name'       => 'test',
            'email'      => 'school@school.com',
            'password'   => bcrypt('school@school.com'),
        ]);

        $teacher = Teacher::create([
           'name'=>'teacher',
           'school_id'=>$school->id,
           'email'=>'teacher@teacher.com',
           'password'=>bcrypt('teacher@teacher.com'),
            'profile_picture' => 'avatar.png',
        ]);

        $student = Student::create([
            'name'=>'teacher',
            'school_id'=>$school->id,
            'email'=>'student@student.com',
            'password'=>bcrypt('student@student.com'),
            'profile_picture' => 'avatar.png',
        ]);

        $class = SchoolClass::create([
           'school_id'=>$school->id,
           'teacher_id'=>1,
            'name'=>'Class A',
            'description'=>'This is description.',
        ]);

        $studentclass = StudentClass::create([
           'school_id'=>$school->id,
            'class_id'=>$class->id,
            'student_id'=>$student->id,
        ]);

    }
}
