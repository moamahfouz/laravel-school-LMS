<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
use App\Student;
use App\Teacher;
use App\Models\Task;

class HomeController extends Controller
{

    protected $redirectTo = '/school/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('school.auth:school');
    }

    /**
     * Show the School dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $teachers = Teacher::where('school_id', auth('school')->user()->id)->get();
        $last_teachers = Teacher::where('school_id', auth('school')->user()->id)->orderBy('id', 'desc')->take(5)->get();
        $classes = SchoolClass::where('school_id', auth('school')->user()->id)->get();
        $students = Student::where('school_id', auth('school')->user()->id)->get();
        $last_students = Student::where('school_id', auth('school')->user()->id)->orderBy('id', 'desc')->take(5)->get();
        $tasks = Task::where('school_id', auth('school')->user()->id)->get();
        return view('school.home', compact('teachers', 'classes', 'students', 'tasks', 'last_teachers', 'last_students'));
    }

}
