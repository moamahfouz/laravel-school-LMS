<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\StudentClass;
use App\Teacher;
use App\Models\Task;
use App\Models\Mark;
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
           'phone'=>'01010101010',
           'address'=>'12st Cairo Eg',
           'email'=>'teacher@teacher.com',
           'password'=>bcrypt('teacher@teacher.com'),
            'profile_picture' => 'avatar.png',
        ]);

        $student = Student::create([
            'name'=>'Student',
            'school_id'=>$school->id,
            'phone'=>'0121212154',
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

        $task = Task::create([
           'class_id'=>1,
           'school_id'=>1,
           'teacher_id'=>1,
            'name'=>'Task name',
            'description'=>'Task description',
            'file'=> 'file-1625004833.pdf',
            'end_date'=>'12-12-2021',

        ]);

        $mark = Mark::create([
            'school_id'=>1,
            'class_id' => 1,
            'student_id'=>1,
            'first'=>'80%',
            'mid'=>'85%',
            'final'=>'82%'
        ]);

    }
}
