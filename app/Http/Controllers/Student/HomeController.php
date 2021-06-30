<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Mark;
use App\Models\SchoolClass;
use App\Models\StudentClass;
use App\Models\Task;
use App\Student;

class HomeController extends Controller
{

    protected $redirectTo = '/student/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('student.auth:student');
    }

    /**
     * Show the Student dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $rows = StudentClass::with('student')->where('student_id', auth('student')->user()->id)->get();

        return view('student.home', compact('rows',));
    }

    public function showClass($id) {
        $class = SchoolClass::where('id', $id)->first();
        $tasks = Task::where('class_id',$id)->get();
        $marks = Mark::where('student_id', auth('student')->user()->id)->first();

        return view('student.classes.show', compact('class', 'tasks', 'marks'));
    }

    public function profile(){
        $user = auth('student')->user();
        $rows = StudentClass::with('student')->where('student_id', auth('student')->user()->id)->get();
        return view('student.profile', compact('user', 'rows'));
    }

}
